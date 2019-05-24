<?php

use \Fw\Backend\Models\Person;
use \Fw\Backend\Models\Universe;
use \Fw\Backend\Models\News;

Route::get('sitemap.xml', function()
    {
        $persons = Person::all();
        $universes = Universe::all();
        $bookEdition = \fw\Backend\Models\BookEdition::all();
        $news = News::all();
        return Response::view('fw.backend::sitemap', [
            'persons' => $persons, 
            'universes' => $universes,
            'book_edition' => $bookEdition,
            'news' => $news
        ])->header('Content-Type', 'text/xml');
    }
);

Route::get('seed-news', function () {
    
    $faker = Faker\Factory::create();
    for($i = 0; $i < 100; $i++){
        News::create([
            'title' => \Faker\Provider\Lorem::text(100),
            'slug' => $faker->slug,
            'description' => \Faker\Provider\Lorem::text(800),
            'cover' => \Faker\Provider\Image::imageUrl(640, 480)
        ]);
    }
    return "Actors created!";
});

Route::get('content-news', function () {
    
    $allnews = News::all();

    foreach ($allnews as $news) {
        
        // if ($news->content['title'] == null) 
        // {

            $current = News::find($news->id);
            //trace_log($current->content()->title);
            //$current->content = ['title' => $news->title];
            //$current->content()->add(['title' => $news->title]);

            
            if (!$current->content) {
                $content = new fw\Backend\Models\Content;
            } else {
                $content = $current->content;
            }

            $content->title = $current->title;
            $content->permalink = \Fw\Backend\Traits\Permalink::createPermalink($current);
            $content->contentable_id = $current->id;
            //$content->save();

            $current->content()->add($content);
        // }
    }
    return "News  updated!";
});

?>
