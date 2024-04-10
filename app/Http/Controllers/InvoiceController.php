<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use PDF;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function downloadPDF($id)
    {
        Carbon::setLocale('id');
        $invoice = Invoice::findOrFail($id);
        $pdf = PDF::loadView('invoices.invoice', compact('invoice'));
        $pdf->setPaper('A4', 'portrait'); // Atur ukuran kertas dan orientasi
        return $pdf->download('invoice_'.$invoice->invoice_number.'.pdf');
    }
}
