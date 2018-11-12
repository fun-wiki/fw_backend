<?php namespace Fw\Backend\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Config;

use Fw\Backend\Models\PersonRole;

class Multiselect extends FormWidgetBase
{
    public function widgetDetails()
    {
        return [
            'name' => 'Multiselect',
            'description' => 'Field for Multiselect'
        ];
    }

    public function loadAssets()
    {
        $this->addCss('css/picker.css');
        $this->addJs('js/picker.min.js');
    }

    public function render(){
        $this->prepareVars();
        //dump($this->vars['selectedValues']);
        return $this->makePartial('widget');
    }

    public function prepareVars(){
        $this->vars['id'] = $this->model->id;
        $this->vars['actors'] = PersonRole::all()->lists('title', 'id');
        $this->vars['name'] = $this->formField->getName().'[]';
        if(!empty($this->getLoadValue())){
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }
    }
}