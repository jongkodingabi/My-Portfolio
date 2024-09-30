<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;

    // Nama tabel jika berbeda dari pluralisasi nama model
    protected $table = 'abouts';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'images',
        'name',
        'date_of_birth',
        'addres',
        'email',
        'phone_number',
    ];
}
