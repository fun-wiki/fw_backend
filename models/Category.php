<?php

namespace fw\Backend\Models;

use Model;

class Category extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SimpleTree;

    public $timestamps = false;

    protected $fillable = [
        'title'
    ];

    public $table = 'fw_backend_category';

    public $rules = [];
}
