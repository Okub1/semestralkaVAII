<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = [
        'name',
        'description',
        'genre_id',
        'developer_id',
        'price',
    ];

    public function genre()
    {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }

    public function developer()
    {
        return $this->hasOne(Developer::class, 'id', 'developer_id');
    }
}
