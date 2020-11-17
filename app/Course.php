<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;
use App\Category;
use App\Room;

class Course extends Model
{
    use SoftDeletes;

    public $table = 'courses';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'title',
        'teacher_id',
        'category_id',
        'room_id',
        'is_featured',
        'day',
        'time',
        'description',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function teacher ()
    {
        return $this->belongsTo('App\User', 'teacher_id', 'id');
    }

    public function students ()
    {
        return $this->belongsToMany('App\User');
    }

    public function user ()
    {
        return $this->belongsToMany('App\User');
    }

    public function category () 
    {
        return $this->belongsTo('App\Category');
    }

    public function room () 
    {
        return $this->belongsTo('App\Room');
    }
}
