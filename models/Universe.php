<?php namespace fw\Backend\Models;

use Model;
use Event;

/**
 * Model
 */
class Universe extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = ['creators'];
    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_universes';

    public $belongsToMany = [
        'genres' => ['fw\Backend\Models\Genre', 'table' => 'fw_backend_universes_genres', 'foreignKey' => 'genre_id'],
        'persons' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_universes_persons'],
        'organisations' => ['fw\Backend\Models\Organisation', 'table' => 'fw_backend_universes_organisations']
    ];

    public $hasMany = [
        'literature' => ['fw\Backend\Models\Literature'],
        'bookseries' => ['fw\Backend\Models\BookSeries']
    ];

    public function beforeSave()
    {
        //$this->persons = $this->creators['persons'];
        function(\Backend\Widgets\Form $formWidget)
        { 
            \Log::info($formWidgets);
        };
    }

}
