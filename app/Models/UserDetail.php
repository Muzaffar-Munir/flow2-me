<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    use HasFactory;
    protected $table = 'userdetails';
    protected $fillable = [
        'username',
        'address_1',
        'address_2',
        'postal_code',
        'state',
        'city',
        'country',
        'phone_number',
        'user_id',
        'client_seed',
        'server_seed',
        'user_document',
    ];
}
