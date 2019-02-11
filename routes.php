<?php

use \Fw\Backend\Models\Person;
use \Fw\Backend\Models\Universe;

Route::get('sitemap.xml', function()
    {
        $persons = Person::all();
        $universes = Universe::all();
        $bookEdition = \fw\Backend\Models\BookEdition::all();
        return Response::view('fw.backend::sitemap', [
            'persons' => $persons, 
            'universes' => $universes,
            'book_edition' => $bookEdition
        ])->header('Content-Type', 'text/xml');
    }
);
?>
