<?php namespace fw\Backend\Models;

use Model;

class Book extends Model
{
    use \October\Rain\Database\Traits\Validation;

    public $timestamps = false;

    public $table = 'fw_backend_books';

    public $rules = [];

    public $permalink = ':universe.title/book/:content.title';

    protected $fillable = [
        'title'
    ];

    public $belongsTo = [
        'universe'  => ['fw\Backend\Models\Universe']
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];


    public function listSeries($fieldName, $value, $formData)
    {
        $bookseries = [];
        if (isset($formData->universe->id)) {
            $collection = Universe::where('id', $formData->universe->id)->get();
        }


        if (isset($collection)) {
            foreach ($collection[0]->bookseries as $bookserie) {
                $bookseries[$bookserie->id] = $bookserie->title;
            }
        }
        return $bookseries;
    }

    public function getLiteratureTypeOptions()
    {
        return \fw\Backend\Models\LiteratureType::all()->lists('title', 'id');
    }


    public function filterFields($fields, $context = null)
    {
        if (isset($fields->title_ru)) {
            if ($fields->title_ru->value != null) {
                $fields->title->value = $fields->title_ru->value;
            } else {
                $fields->title->value = $fields->title_original->value;
            }
            $fields->slug->value = str_slug($fields->title->value);
        }
    }

    public function scopeUniverse($query, $form)
    {
        if (isset($_POST['BookEdition']['universes'])) { 
            $get_universe = $_POST['BookEdition']['universes']; 
        } else { 
            return;
        }
        $universes = \fw\Backend\Models\Universe::whereIn('name', $get_universe)->get();
        $universeId = [];
        foreach ($universes as $universe) {
            array_push($universeId, $universe->id);
        }
        return $query->whereIn('universe_id', $universeId)->get();
    }

    public function afterSave()
    {
        
        $authors = $this->authors;

        $roles = \fw\Backend\Models\PersonRole::where('title', 'Автор')->first();

        $authorsId = [];

        foreach ($authors as $author) {
            $pivotData = ["person_id"=>$author->id,"person_role_id"=>$roles->id];
            
            if (isset($author->personroles[0])) {
                foreach ($author->personroles as $role) {
                    if ($role->id === $roles->id) {
                        continue;
                    } else {
                        $person = \fw\Backend\Models\Person::find($author->id)->personroles()->add($roles, $pivotData);
                    }
                }
            } else {
                $person = \fw\Backend\Models\Person::find($author->id)->personroles()->add($roles, $pivotData); 
            }
        }
    }
}
