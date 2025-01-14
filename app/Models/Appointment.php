<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'appointment_datetime',
        'status',
        'outlet_id',
        'product_id',  // Menambahkan relasi ke produk
        'product_name', // Untuk produk manual
    ];

    // Relasi ke model Outlet
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    // Relasi ke model Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    const STATUS_PENDING = 'pending';
    const STATUS_CONFIRMED = 'confirmed';
    const STATUS_CANCELED = 'canceled';
}
