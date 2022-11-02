<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
class PDFController extends Controller
{
    //
    public function generatePDF()
    {
        $dataaa = [
            'title' => 'Welcome to ItSolutionStuff.com',
            'date' => date('m/d/Y')
        ];
          
        $pdf = PDF::loadView('admin.individual_student', $dataaa);
    
        return $pdf->download('itsolutionstuff.pdf');
    }
}
