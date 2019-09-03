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

    public $belongsToMany = [
        'genres' => [
            'fw\Backend\Models\Genre',
            'table' => 'fw_backend_relation_universes_genres',
            'foreignKey' => 'genre_id'
        ],
        'persons' => [
            'fw\Backend\Models\Person',
            'table' => 'fw_backend_relation_universes_persons'
        ],
        'company' => [
            'fw\Backend\Models\Company',
            'table' => 'fw_backend_relation_universes_organisations',
            'key'      => 'universe_id',
            'otherKey' => 'organisation_id'
        ],
        'metasettings' => [
            'fw\Backend\Models\Universe',
            'table' => 'fw_backend_relation_universes_universes',
            'key' => 'universe_id',
            'otherKey' => 'metasetting_id'
        ],
        'metasetting' => [
            'fw\Backend\Models\Universe',
            'table' => 'fw_backend_relation_universes_universes',
            'key' => 'metasetting_id',
            'otherKey' => 'universe_id'
        ]
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable', 'delete' => true],
    ];

    public function beforeSave()
    {
        if ($this->setting_type == 'setting') {
            $this->metasettings = [];
        }
    }

    public function afterSave()
    {
        \fw\Backend\Classes\Content::bindContent($this);
        \fw\Backend\Classes\Content::asCategory($this);
        \fw\Backend\Classes\Content::saveContent($this);
    }
}
