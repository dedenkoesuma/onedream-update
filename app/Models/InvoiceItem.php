<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceItem extends Model
{
    use HasFactory;
    protected $fillable = ['item', 'qty', 'price', 'subtotal','invoice_id'];

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }

    protected static function booted()
    {
        static::creating(function ($item) {
            $item->price = self::convertToNumber($item->price);
            $price = static::convertToNumber($item->price);
            
            if (!isset($item->subtotal)) {
                $item->subtotal = $item->qty * $price;
            }
        });

     }

    protected static function convertToNumber($value)
    {
        $value = str_replace(',', '', $value);
        $value = str_replace('.', '', $value);
        return (float) $value;
    }

}
