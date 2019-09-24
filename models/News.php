<?php

namespace fw\Backend\Models;

use Model;

class News extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $table = 'fw_backend_news';

    public $permalink = 'news/:article.title';

    public $rules = [];

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description'
    ];

    public $belongsTo = [
        'universe' => ['fw\Backend\Models\Universe'],
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $morphOne = [
        'article' => [
            'Fw\Backend\Models\Article', 
            'name' => 'contentable', 
        ],
    ];

    public function beforeSave()
    {
        \fw\Backend\Classes\Content::bindContent($this);
    }

    public function afterSave()
    {
        // \fw\Backend\Classes\Content::saveContentWithCategory($this, 'news');
    }
}
