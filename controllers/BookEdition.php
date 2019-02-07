<?php namespace fw\Backend\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class BookEdition extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
        'Backend\Behaviors\ReorderController',
        'Backend.Behaviors.RelationController',
    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';
    public $relationConfig = 'config_relation.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('fw.Backend', 'fw-menu', 'book-editions');
    }

    public function create()
    {
        $this->bodyClass = 'compact-container';
        //$this->addCss('/plugins/rainlab/blog/assets/css/rainlab.blog-preview.css');
        //$this->addJs('/plugins/rainlab/blog/assets/js/post-form.js');

        return $this->asExtension('FormController')->create();
    }

    public function update($recordId)
    {
        $this->bodyClass = 'compact-container';
        //$this->addCss('/plugins/rainlab/blog/assets/css/rainlab.blog-preview.css');
        //$this->addJs('/plugins/rainlab/blog/assets/js/post-form.js');

        return $this->asExtension('FormController')->update($recordId);
    }
}
