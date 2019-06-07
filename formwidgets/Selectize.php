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
        $this->addCss('css/selectize.default.css');
        $this->addJs('js/standalone/selectize.min.js');
    }

    public function render(){
        $this->prepareVars();
        trace_log('updated');
        return $this->makePartial('widget');
    }

    public function prepareVars(){
        $this->vars['id'] = $this->model->id;
        $this->vars['name'] = $this->formField->getName().'[]';
        $this->vars['options'] = $this->options;
        $this->vars['value'] = $this->getLoadValue();

        $method = 'get'.$this->options;
        $model = get_class($this->model);

        //trace_log ('op'.$method);
        //trace_log ('model'.$model);

        $this->vars['method'] = $method;
        //dump($this->config->parentForm->getField('universe')->value);
        $this->vars['options']  = $model::$method($this);
        
        if(!empty($this->getLoadValue())){
            $this->vars['selectedValues'] = [$this->getLoadValue()];
        } else {
            $this->vars['selectedValues'] = [];
        }
        // trace_log ($this->vars['options']);
        // dd($this->vars['selectedValues']);
    }

    public function getSaveValue($value)
    {
        $method = 'set'.$this->options;
        $model = get_class($this->model);

        $value = $model::$method($this, $value);
        
        return $value;
    }
}