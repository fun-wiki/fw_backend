<?php namespace fw\Backend\Models;

use Model;

/**
 * Model
 */
class Literature extends Model
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
    public $table = 'fw_backend_literature';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $jsonable = [
        'content'
    ];

    public $belongsToMany = [
        'authors' => ['fw\Backend\Models\Person', 'table' => 'fw_backend_persons_literature'],
        'book' => ['fw\Backend\Model\Book', 'table' => 'fw_backend_relation_book_literature']
    ];

    public $belongsTo = [
        'universe' => 'fw\Backend\Models\Universe',
        'book_series' => 'fw\Backend\Models\BookSeries'
    ];

    public $hasOne = [
        'literature_type' => ['fw\Backend\Models\LiteratureType'],
    ];


    public function getLiteratureTypeOptions()
    {
        return \fw\Backend\Models\LiteratureType::all()->lists('title', 'id');
    }

    public function listSeries($fieldName, $value, $formData)
    {
        $bookseries = [];
        
        $collection = Universe::where('id', $formData->universe)->get();

        if (isset($collection)) {
            foreach ($collection[0]->bookseries as $bookserie) {
                $bookseries[$bookserie->id] = $bookserie->title; 
            }
        }
        // dump($bookseries);
        return $bookseries;
    }

    public function filterFields($fields, $context = null)
    {
        // dump($fields);
        if (isset($fields->slug)) {
            $fields->slug->value = str_slug($fields->content->value['title_original']);
        }

        if (isset($fields->title)) {
            $fields->title->value = $fields->content->value['title_original'];
        }
    }
}
