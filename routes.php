<?php

use \Fw\Backend\Models\Content;
use Carbon\Carbon;

// add Sitemap.xml

Route::get(
    'sitemap.xml',
    function () {
        $content = Content::where(['status' => 'published'])->get();
        return Response::view('fw.backend::sitemap', [
            'content' => $content
        ])->header('Content-Type', 'text/xml');
    }
);

// add Rss Feed

Route::get(
    'rss.xml',
    function () {
        $content = Content::where(['status' => 'published'])->orderBy('published_at' , 'desc')->get();
        $lastBuildDate = Carbon::now();
        return Response::view('fw.backend::rss', [
            'content' => $content,
            'lastBuildDate' => $lastBuildDate
        ])->header('Content-Type', 'text/xml');
    }
);