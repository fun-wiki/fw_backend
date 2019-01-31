<?php namespace fw\Backend\Models;

use Model;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Model
 */
class Person extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    public $rules = [
    ];

    protected $fillable = [
        'title'
    ];

    public $table = 'fw_backend_person';

    public $belongsToMany = [
        'persons' => ['fw\Backend\Models\Person'],
        'pseudos' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_relation_persons_pseudos', 'key' => 'person_id', 'otherKey' => 'pseudo_id',],
        'genres' => ['fw\Backend\Models\Genre', 'table' => 'fw_backend_persons_genres'],
        'universes' => ['fw\Backend\Models\Universe', 'table' => 'fw_backend_universes_persons'],
        'personroles' => ['fw\Backend\Models\PersonRole', 'table' => 'fw_backend_persons_persons_roles']
    ];

    public function scopeAuthors($query)
    {
        $personRole = \fw\Backend\Models\PersonRole::where('slug', '=', 'author')->get();
        $personId = [];
        foreach ($personRole[0]->persons as $person) {
            array_push($personId, $person->id);
        }
        return $query->whereIn('id', $personId)->get();
    }

    public function scopeNoPseudo($query)
    {
        return $query->where('is_pseudo', '=', '0')->get();
    }

}
