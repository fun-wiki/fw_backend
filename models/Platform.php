<?php namespace fw\Backend\Models;

use Model;

class Platform extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = false;

    public $table = 'fw_backend_platforms';

    public $rules = [];

    protected $fillable = [
        'title'
    ];

    public $belongsToMany = [
        'videogames' => [
            'fw\Backend\Models\Videogames',
            'table'    => 'fw_backend_relation_videogames_platforms',
            'key'      => 'videogame_id',
            'otherKey' => 'platform_id'
        ]
    ];
}
