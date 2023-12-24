<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminAccount extends Model
{
    use HasFactory;
    protected $table = 'admin_accounts';
    protected $fillable=['user_id','balance','wallet_address'];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
