<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Work extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;


    /**
     * @var string The database table used by the model.
     */
    public $table = 'fw_backend_works';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public function getWorkTypeOptions($value, $formData)
    {
        $status = [
            'story' => "Рассказ",
            'novel' => "Роман"
        ];

        return $status;
    }

    public $belongsToMany = [
        'author' => [
            'fw\Backend\Models\Person',
            'table'    => 'fw_backend_relation_works_persons',
            'key'      => 'work_id',
            'otherKey' => 'person_id'
        ],
        'genres' => [
            'fw\Backend\Models\Genre', 
            'table' => 'fw_backend_relation_works_genres', 
            'key'      => 'work_id',
            'otherKey' => 'genre_id'
        ],
    ];

    public function afterSave()
    {
        foreach ($this->author as $author) {
            if ($author->personroles->firstWhere('id', 1) == null) {
                $person = Person::find($author->id);
                $person->personroles()->add(PersonRole::find(1));
            };
        }
    }

}
