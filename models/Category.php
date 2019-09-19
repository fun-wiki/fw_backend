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

    function aliasToChildren ($category, $alias) 
    {
        foreach ($category as $record) {
            $category->alias = $alias.'/'.$record->title;
            $category->save();
            if ($record->children) {
                aliasToChildren ($record->children, $category->alias);
            }
        }
    }

    public function beforeSave()
    {
        if ($this->parent_id == null) {
            $this->alias = $this->title;
        } else {
            $parent = Category::find($this->parent_id);
            $this->alias = $parent->alias.'/'.$this->title;

            if ($this->children) {
                $this->aliasToChildren ($this->children, $this->alias);
            }
        }
    }

    public function scopeUniverse($query, $filter)
    {
        $select = [];

        $cat = \Fw\Backend\Models\Universe::find($filter);

        foreach ($cat as $value) {
             array_push($select, $value->content->category->id);
        }
        
        $query->whereIn('id', $select);
    }
}
