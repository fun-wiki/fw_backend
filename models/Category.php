<?php

namespace fw\Backend\Models;

use Model;
use October\Rain\Support\Collection;

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

    public $hasMany = [
        'content' => [
            'Fw\Backend\Models\Content'
        ]
    ];

    public function scopeUniverse($query, $filter)
    {
        $select = [];
        $category = [];

        $cat = \Fw\Backend\Models\Universe::find($filter);

        foreach ($cat as $value) {
            foreach ($select as $cat) {
                $series = Category::find($cat)->getAllChildren();
                foreach ($series as $value) {
                    array_push($category, $value->id);
                }
            }
        }
        
        array_push($select, $category);
        
        $query->whereHas('content', function($group) use ($select) {
            $group->whereIn('category_id', $select);
        });
    }
}
