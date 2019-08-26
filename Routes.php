<?php

use \Fw\Backend\Models\Content;

Route::get(
    'sitemap.xml',
    function () {
        $content = Content::where(['status' => 'published'])->get();
        return Response::view('fw.backend::sitemap', [
            'content' => $content
        ])->header('Content-Type', 'text/xml');
    }
);
