<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'time',
        'layanan_id',
        'barberman_id',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function barberman()
    {
        return $this->belongsTo(Barberman::class);
    }
}
