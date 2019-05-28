<?php

// use \Fw\Backend\Models\Person;
// use \Fw\Backend\Models\Universe;
// use \Fw\Backend\Models\News;
use \Fw\Backend\Models\Content;

Route::get('sitemap.xml', function()
    {
        // $persons = Person::all();
        // $universes = Universe::all();
        // $bookEdition = \fw\Backend\Models\BookEdition::all();
        // $news = News::all();
        $content = Content::all();
        return Response::view('fw.backend::sitemap', [
            // 'persons' => $persons, 
            // 'universes' => $universes,
            // 'book_edition' => $bookEdition,
            'content' => $content
        ])->header('Content-Type', 'text/xml');
    }
);

// Route::get('seed-news', function () {
    
//     $faker = Faker\Factory::create();
//     for($i = 0; $i < 100; $i++){
//         News::create([
//             'title' => \Faker\Provider\Lorem::text(100),
//             'slug' => $faker->slug,
//             'description' => \Faker\Provider\Lorem::text(800),
//             'cover' => \Faker\Provider\Image::imageUrl(640, 480)
//         ]);
//     }
//     return "Actors created!";
// });

// Route::get('content-news', function () {
    
//     $allnews = News::all();

//     foreach ($allnews as $news) {
        
//         // if ($news->content['title'] == null) 
//         // {

//             $current = News::find($news->id);
//             //trace_log($current->content()->title);
//             //$current->content = ['title' => $news->title];
//             //$current->content()->add(['title' => $news->title]);

            
//             if (!$current->content) {
//                 $content = new fw\Backend\Models\Content;
//                 $content->title = $current->title;
//             } else {
//                 $content = $current->content;
//             }

//             $content->permalink = \Fw\Backend\Traits\Permalink::createPermalink($current);
//             $content->status = 'published';
//             $content->created_at = $current->created_at;
//             $content->updated_at = $current->updated_at;
//             $content->published_at = $current->created_at;
//             $content->contentable_id = $current->id;
//             //$content->save();

//             $current->content()->add($content);
//         // }
//     }
//     return "News  updated!";
// });
// Route::get('content-universe', function () {
    
//     $all_old_content = fw\Backend\Models\Universe::all();

//     foreach ($all_old_content as $old_content) {
//         $current = fw\Backend\Models\Universe::find($old_content->id);

//         if (!$current->content) {
//             $content = new fw\Backend\Models\Content;
//         } else {
//             $content = $current->content;
//         }

//         $content->title = $current->name;
//         $content->permalink = \Fw\Backend\Traits\Permalink::createPermalink($current);
//         $content->status = 'published';
//         if ($current->created_at == null) {
//             $current->created_at = $current->updated_at;
//         }
//         $content->created_at = $current->created_at;
//         $content->updated_at = $current->updated_at;
//         $content->contentable_id = $current->id;
//         $current->content()->add($content);
//     }
//     return "Universe updated!";
// });

// Route::get('content-person', function () {
    
//     $all_old_content = fw\Backend\Models\Person::all();

//     foreach ($all_old_content as $old_content) {
//         $current = fw\Backend\Models\Person::find($old_content->id);

//         if (!$current->content) {
//             $content = new fw\Backend\Models\Content;
//         } else {
//             $content = $current->content;
//         }

//         $content->title = $current->title;
//         $content->permalink = \Fw\Backend\Traits\Permalink::createPermalink($current);
//         $content->status = 'published';
//         if ($current->created_at == null) {
//             $current->created_at = $current->updated_at;
//         }
//         $content->created_at = $current->created_at;
//         $content->updated_at = $current->updated_at;
//         $content->published_at = $current->created_at;
//         $content->contentable_id = $current->id;
//         $current->content()->add($content);
//     }
//     return "Person updated!";
// });

// Route::get('content-organisation', function () {
    
//     $all_old_content = fw\Backend\Models\Organisation::all();

//     foreach ($all_old_content as $old_content) {
//         $current = fw\Backend\Models\Organisation::find($old_content->id);

//         if (!$current->content) {
//             $content = new fw\Backend\Models\Content;
//         } else {
//             $content = $current->content;
//         }

//         $content->title = $current->title;
//         $content->permalink = \Fw\Backend\Traits\Permalink::createPermalink($current);
//         $content->status = 'published';
//         if ($current->created_at == null) {
//             $current->created_at = $current->updated_at;
//         }
//         $content->created_at = $current->created_at;
//         $content->updated_at = $current->updated_at;
//         $content->published_at = $current->created_at;
//         $content->contentable_id = $current->id;
//         $current->content()->add($content);
//     }
//     return "Organisation updated!";
// });

// Route::get('content-publish', function () {
    
//     $contents = fw\Backend\Models\Content::all();

//     foreach ($contents as $content) {
        
//         if ($content->status == 'published') {
//             $content->published_at = $content->created_at;
//         } else {
//             $content->published_at = null;
//         };

//         $content->save();
//     }
//     return "Published updated!";
// });

?>
