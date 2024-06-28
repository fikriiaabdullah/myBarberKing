<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'name',
        'time',
        'layanan_id',
        'barberman_id',
        'outlet_id',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function barberman()
    {
        return $this->belongsTo(Barberman::class);
    }
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
