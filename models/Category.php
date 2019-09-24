<?php

namespace fw\Backend\Models;

use Model;

class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\NestedTree;

    public $timestamps = false;

    protected $fillable = [
        'title'
    ];

    public $table = 'fw_backend_category';

    public $rules = [];

    public $hasMany = [
        'content' => [
            'Fw\Backend\Models\Content'
        ]
    ];
}
