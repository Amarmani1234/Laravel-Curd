<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table ='team';
	public $timestamps = true;
	protected $fillable = ['name','phone','email','address','message'];
}
