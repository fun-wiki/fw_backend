<?php namespace fw\Backend\Models;

use Model;

class BookType extends Model
{
    
    public $timestamps = false;

    public $table = 'fw_backend_book_types';

    public $rules = [];

    public $hasMany = [
        'book' => ['fw\Backend\Models\Book'],
        'book_edition' => BookEdition::class
    ];

    public $belongsToMany = [
    ];

}