<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use PDF;


class InvoiceController extends Controller
{
    public function downloadPDF($id)
    {
        $invoice = Invoice::findOrFail($id);
        $pdf = PDF::loadView('invoices.invoice', compact('invoice'));
        $pdf->setPaper('A4', 'portrait'); 
        return $pdf->download('invoice_'.$invoice->invoice_number.'.pdf');
    }
}
