<?php

namespace fw\Backend\Models;

use Model;
use \fw\Backend\Classes\Content as Content;

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

    public function afterSave()
    {
        Content::bindArticle($this);
        // \fw\Backend\Classes\Content::saveContentWithCategory($this, 'news');
    }
}
