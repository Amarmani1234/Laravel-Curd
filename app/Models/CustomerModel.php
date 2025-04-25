<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table ='customers';
	public $timestamps = true;
	protected $fillable = ['customer','phone','mobile','email','company','gst','pin','city','state'];
}
