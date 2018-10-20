<?php

use \Fw\Backend\Models\Person;

Route::get('sitemap.xml', function()
    {
        $persons = Person::all();
        //$genres = Genre::all();
        return Response::view('fw.backend::sitemap', ['persons' => $persons,])->header('Content-Type', 'text/xml');
    }
);
?>
