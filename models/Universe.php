<?php

namespace fw\Backend\Models;

use Model;

class Universe extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    public $rules = [];

    public $permalink = ':content.title';

    public $table = 'fw_backend_universes';

    public $hasMany = [
        'literature' => ['fw\Backend\Models\Literature'],
        'bookseries' => ['fw\Backend\Models\BookSeries']
    ];

    public $belongsToMany = [
        'genres' => ['fw\Backend\Models\Genre', 'table' => 'fw_backend_universes_genres', 'foreignKey' => 'genre_id'],
        'persons' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_universes_persons'],
        'company' => [
            'fw\Backend\Models\Company',
            'table' => 'fw_backend_universes_organisations',
            'key'      => 'universe_id',
            'otherKey' => 'organisation_id'
        ]
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function afterSave()
    {
        \fw\Backend\Classes\Content::asCategory($this);
        \fw\Backend\Classes\Content::bindContent($this);
        \fw\Backend\Classes\Content::saveContent($this);
    }
}
