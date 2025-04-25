<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class InsertModel extends Model
{
    use HasFactory;
    protected $table ='services';
	public $timestamps = true;
	protected $fillable = ['service'];

}





