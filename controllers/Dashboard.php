<?php

namespace fw\Backend\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use fw\Backend\Models\Article;

class Dashboard extends Controller
{
    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('fw.Backend', 'fw-menu', 'dashboard');
    }

    public function index() 
    {
        $this->pageTitle = 'Панель управления';
        $this->AddCss('/plugins/fw/backend/assets/css/style.css');

        $this->vars['content_published'] = Article::where('status', 'published')->count();
        $this->vars['content_draft'] = Article::where('status', 'draft')->count();
        $this->vars['content_not_status'] = Article::where('status', null)->count();
        $this->vars['content_deleted'] = Article::where('status', 'deleted')->count();
    }
}
