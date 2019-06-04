<?php namespace Fw\Backend\FormWidgets;

use Backend\Classes\FormWidgetBase;
//use Config;

//use Fw\Backend\Models\PersonRole;

class DropdownInput extends FormWidgetBase
{
    
    protected $defaultAlias = 'dropinput';

    public $options = '';

    public function widgetDetails()
    {
        return [
            'name' => 'Dropinput',
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
        // $this->addCss('css/picker.css');
        // $this->addJs('js/picker.min.js');
    }

    public function render(){
        $this->prepareVars();
        //dump($this->vars['selectedValues']);
        return $this->makePartial('widget');
    }

    public function prepareVars(){
        $this->vars['id'] = $this->model->id;
        $this->vars['name'] = $this->formField->getName().'[]';
        $this->vars['options'] = $this->options;
        $this->vars['value'] = $this->getLoadValue();

        $method = 'get'.$this->options;
        $model = get_class($this->model);
        $this->vars['method'] = $method;
        $this->vars['options']  = $model::$method($this);
        dump($this);
        if(!empty($this->getLoadValue())){
            $this->vars['selectedValues'] = $this->getLoadValue();
        } else {
            $this->vars['selectedValues'] = [];
        }
    }

    public function getSaveValue($value)
    {
        //trace_log($value);
        return; //$value;
    }
}