<?php namespace Fw\Backend\FormWidgets;

use Backend\Classes\FormWidgetBase;
//use Config;

//use Fw\Backend\Models\PersonRole;

class Selectize extends FormWidgetBase
{
    
    protected $defaultAlias = 'selectize';

    public $options = '';

    public function widgetDetails()
    {
        return [
            'name' => 'Selectize',
            'description' => 'Field for Input with Dropdown'
        ];
    }

    
    public function init()
    {
        $this->fillFromConfig([
            'options'
        ]);
    }

    public function loadAssets()
    {
        $this->addCss('css/selectize.css');
        $this->addJs('js/standalone/selectize.min.js');
    }

    public function render(){
        $this->prepareVars();
        return $this->makePartial('widget');
    }

    public function prepareVars(){
        $method = 'get'.$this->options;
        $model = get_class($this->model);

        $this->vars['id'] = isset($this->model->id) ? $this->model->id : md5($this->formField->getName());
        $this->vars['name'] = $this->formField->getName();
        $this->vars['options']  = $model::$method($this);
        $this->vars['value'] = $this->getLoadValue();
        

        if(!empty($this->getLoadValue())){
            $this->vars['selectedValues'] = [$this->getLoadValue()];
        } else {
            $this->vars['selectedValues'] = [];
        }

        // dump($this->config->parentForm->getField('universe'));
    }

    public function getSaveValue($value)
    {
        
        // $method = 'set'.$this->options;
        // $model = get_class($this->model);
        // $value = $model::$method($this, $value);
        return $value;
    }
}