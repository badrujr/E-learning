<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Course;
use Omnipay\Omnipay;
use App\Models\Payment;
use App\Models\Student;
use Session;
use Auth;

class PaymentController extends Controller
{

    private $gateway;

    public function __construct() {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }

    public function createPayment($id){
        $cart = Cart::find($id);
        return view('student.payment/payment',compact('cart'));
    }


    public function pay(Request $request)
    {
        try {

            $response = $this->gateway->purchase(array(
                'amount' => $request->amount,
                'student_id'=>$request->student_id,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => url('success'),
                'cancelUrl' => url('error')
            ))->send();

            if ($response->isRedirect()) {
                $response->redirect();
            }
            else{
                return $response->getMessage();
            }

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    public function success(Request $request)
    {
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId'),
                'student_id' => $request-> input('student_id')
            ));

            $response = $transaction->send();

            if ($response->isSuccessful()) {

                $arr = $response->getData();

                $payment = new Payment();
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->student_id = $request->student_id;
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr['state'];

                $payment->save();

                return redirect('home')->with('success','Payment is Successfull'. $arr['id']);


            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return 'Payment declined!!';
        }
    }

    public function error()
    {
        return 'User declined the payment!';   
    }

    public function index(){
        $payments = Payment::latest()->get();
        $sum = Payment::all()->sum('amount');
        return view('admin.payments/index', compact('payments','sum'));
    }
}
