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
        BackendMenu::setContext('fw.Backend', 'fw-menu', 'work');
    }
}
