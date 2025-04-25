<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class AuthModel extends Model
{
    use HasFactory;
    protected $table ='users';
	public $timestamps = true;
	protected $fillable = ['name','user_type','phone','email','password'];
}
