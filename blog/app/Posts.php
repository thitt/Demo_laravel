<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Pivot
{
    use SoftDeletes;
    protected $table = 'posts';

//    public function newCollection(array $models = [])
//    {
//        dd('newCollection');
//    }

    public function category()
    {
        return $this->belongsTo('App\Category')->wherePivot('id', 1);
    }

    public function getRouteKeyName()
    {
        return 'id';
    }
}
