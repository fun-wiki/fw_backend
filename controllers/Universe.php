<?php

namespace fw\Backend\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use fw\Backend\Models\Content;

class Universe extends Controller
{
    public $implement = [
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.FormController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('fw.Backend', 'fw-menu', 'universes');
    }

    public function index()
    {
        $this->pageTitle = 'Вселенные';
        $this->AddCss('/plugins/fw/backend/assets/css/style.css');
        $this->makeLists();
    }

    public function create()
    {
        $this->bodyClass = 'compact-container';
        return $this->asExtension('FormController')->create();
    }

    public function update($recordId)
    {
        $this->bodyClass = 'compact-container';
        return $this->asExtension('FormController')->update($recordId);
    }

    public function formExtendFields($form)
    {
        $config = $this->makeConfig('$/fw/backend/models/content/fields.yaml');

        foreach ($config->fields as $field => $options) {
            $form->addFields([
                'content[' . $field . ']' => $options
            ]);
        }
    }

    public function formExtendModel($model)
    {
        if (!$model->content) {
            $model->content = new Content;
        }
        return $model;
    }
}
