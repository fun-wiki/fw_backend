<?php namespace fw\Backend\Models;

use Model;

class BookEdition extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    public $table = 'fw_backend_books_edition';

    public $rules = [];

    public $permalink = 'editions/:content.title';

    protected $fillable = [
        'title'
    ];

    public $belongsToMany = [
        'book_content' => [
            'fw\Backend\Models\Book',
            'table'    => 'fw_backend_relation_books_works',
            'key'      => 'book_id',
            'otherKey' => 'work_id'
        ],
        'author'       => [
            'fw\Backend\Models\Person',
            'table'    => 'fw_backend_relation_books_authors',
            'key'      => 'book_id',
            'otherKey' => 'person_id'
        ],
        'publisher'     => [
            'fw\Backend\Models\Organisation',
            'table'    => 'fw_backend_relation_books_publishers',
            'key'      => 'book_id',
            'otherKey' => 'organisation_id'
        ]
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function getBookTypeOptions()
    {
        $status = [
            "novel" => "Художественная книга",
            "anthology" => "Антология",
            "omnibus" => "Омнибус",
            "comic" => "Комикс",
            "artbook" => "Артбук",
            "wiki" => "Энциклопедия",
            "doc" => "Документальная книга"
        ];

        return $status;
    }

    public function beforeSave() 
    {
        \fw\Backend\Classes\Content::bindContent($this);
    }

    public function afterSave()
    {
        \fw\Backend\Classes\Content::saveContent($this);
    }
}
