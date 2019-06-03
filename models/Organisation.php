<?php namespace fw\Backend\Models;

use Model;
use Fw\Backend\Traits\Permalink;

class Organisation extends Model
{
    use \October\Rain\Database\Traits\Validation;
    

    public $table = 'fw_backend_organisations';

    public $rules = [];

    public $timestamps = false;

    public $permalink='company/:content.title';

    protected $fillable = [
        'title',
        'complete'
    ];

    public $belongsToMany = [
        'universe' => ['fw\Backend\Models\Universe', 'table' => 'fw_backend_universes_organisations']
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public $hasMany = [
        'videogames' => 'Fw\Backend\Models\Videogames'
    ];

    public function beforeSave() 
    {
        \fw\Backend\Classes\Content::bindContent($this);
    }

    public function afterSave()
    {
        \fw\Backend\Classes\Content::saveContent($this);
    }
}
