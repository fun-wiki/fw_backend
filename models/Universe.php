<?php namespace fw\Backend\Models;

use Model;
use Event;

/**
 * Model
 */
class Universe extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = true;

    public $rules = [];

    public $table = 'fw_backend_universes';

    public $hasMany = [
        'literature' => ['fw\Backend\Models\Literature'],
        'bookseries' => ['fw\Backend\Models\BookSeries']
    ];
    
    public $belongsToMany = [
        'genres' => ['fw\Backend\Models\Genre', 'table' => 'fw_backend_universes_genres', 'foreignKey' => 'genre_id'],
        'persons' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_universes_persons'],
        'organisations' => ['fw\Backend\Models\Organisation', 'table' => 'fw_backend_universes_organisations']
    ];
}
