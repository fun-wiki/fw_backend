<?php

use \Fw\Backend\Models\Person;
use \Fw\Backend\Models\Universe;

Route::get('sitemap.xml', function()
    {
        $persons = Person::all();
        $universes = Universe::all();
        return Response::view('fw.backend::sitemap', ['persons' => $persons, 'universes' => $universes])->header('Content-Type', 'text/xml');
    }
);
?>
