<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mywallet extends Model
{
    use HasFactory;
    protected $fillable = [
		'user_id',
		'type',
		'desc',
		'price',
		'remaining',
		'status'
		];
}
