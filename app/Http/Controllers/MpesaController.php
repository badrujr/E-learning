<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpesa;

class MpesaController extends Controller
{
    public function stkSimulation(Request $request){
        $mpesa= new \Safaricom\Mpesa\Mpesa();
        $BusinessShortCode='174379';
        $LipaNaMpesaPasskey='bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919';
        $TransactionType="CustomerPayBillOnline"; 
        $Amount= $request->amount;
        $PartyA= $request->phonenumber;
        $PartyB='174379'; 
        $PhoneNumber= $request->phonenumber; 
        $CallBackURL="https://minatbakery.com"; 
        $AccountReference="Minat cake zone academy - E-learning system"; 
        $TransactionDesc="Lipa na M-pesa";
        $Remarks="Thank you for using our platform";

     
        if(!$mpesa){
            return back()->with('message','Error in your phone number input'); 
        }
        try{
            
            $stkPushSimulation=$mpesa->STKPushSimulation(
                $BusinessShortCode, 
                $LipaNaMpesaPasskey, 
                $TransactionType, 
                $Amount, 
                $PartyA,
                $PartyB, 
                $PhoneNumber, 
                $CallBackURL, 
                $AccountReference, 
                $TransactionDesc, 
                $Remarks
            );
          return back()->with('message','congratulation your trasactions are succesfully'); 


        }catch(\Exception $e){
            return back()->with('message','Error occured'); 

        }
        dd($stkPushSimulation);
    }
}
