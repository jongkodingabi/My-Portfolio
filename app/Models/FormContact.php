<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormContact extends Model
{
    use HasFactory;

    protected $tables = 'form_contacts';

    protected $fillable = [
        'name',
        'email',
        'messages'
    ];
}
