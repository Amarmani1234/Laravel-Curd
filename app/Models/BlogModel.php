<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class BlogModel extends Model
{
    use SoftDeletes;
    protected $table ='posts';
	public $timestamps = true;
    protected $fillable = ['title','slug','body','user_id','status',];
    protected $dates = ['deleted_at'];

    protected $casts = [
        'status' => 'string',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}




