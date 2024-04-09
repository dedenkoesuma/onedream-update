<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    use HasFactory;
    protected $fillable = ['bank', 'cabang', 'no_rek', 'owner_rek', 'vat','total'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    protected static function booted()
    {
        static::creating(function ($paymentDetail) {
            $invoiceId = $paymentDetail->invoice_id;

            $invoiceItems = InvoiceItem::where('invoice_id', $invoiceId)->get();
            $subtotalTotal = $invoiceItems->sum('subtotal');
            $paymentDetail->vat = $subtotalTotal * 0.1;

            $paymentDetail->total = $subtotalTotal + $paymentDetail->vat;
        });
    }
}
