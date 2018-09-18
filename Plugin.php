<?php namespace fw\Backend;

use System\Classes\PluginBase;
use Carbon\Carbon;

class Plugin extends PluginBase
{
  public function registerComponents()
  {
  }

  public function registerSettings()
  {
  }

  public function registerMarkupTags()
  {
    return [
      'filters' => [
        'ru_date' => [$this, 'ruDate'],
      ],
    ];
  }

  public function ruDate($text)
  {
    $months = [1 => 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
    $date = Carbon::createFromFormat('Y-m-d', $text);
    $key = $date->format('n');
    return $date->format('d ' . $months[$key] . ' Y');
  }

}
