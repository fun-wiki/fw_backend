<?php namespace fw\Backend\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Event;

class Category extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();
    }

    public function index() 
    {
        Event::listen('backend.list.extendQueryBefore', function($listWidget, $query) {
            $query->orderBy('title', 'asc');
        });

        $this->asExtension('ListController')->index();
    }
}
