<?php namespace fw\Backend\Controllers;

use Backend\Classes\Controller;
use Fw\Backend\Models\Content as Model;
use BackendMenu;

class Content extends Controller
{
    public $implement = [        'Backend\Behaviors\ListController',        'Backend\Behaviors\FormController',        'Backend\Behaviors\ReorderController'    ];
    
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        Model::extend(function($model) {
            $model->bindEvent('model.afterDelete', function () use ($model) {
                \Log::info("{$model->id} was deleted");
            });
        });
    }

    public function formBeforeCreate($model)
    {
        $model->author = $this->user->id;
    }
}
