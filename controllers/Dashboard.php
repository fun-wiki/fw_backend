<?php

namespace fw\Backend\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use fw\Backend\Models\Content;

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
        //dump($this);
        $this->vars['content_published'] = \fw\Backend\Models\Content::where('status', 'published')->count();
        $this->vars['content_draft'] = \fw\Backend\Models\Content::where('status', 'draft')->count();
        $this->vars['content_not_status'] = \fw\Backend\Models\Content::where('status', null)->count();
        $this->vars['content_deleted'] = \fw\Backend\Models\Content::where('status', 'deleted')->count();
    }
}
