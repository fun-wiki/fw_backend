<?php

namespace fw\Backend;

use System\Classes\PluginBase;
use Carbon\Carbon;
use Event;
use Illuminate\Database\Eloquent\Relations\Relation;
use buzzingpixel\twigswitch\SwitchTwigExtension;
use Response;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            '\fw\backend\components\views'   => 'views',
        ];
    }

    public function registerSettings()
    { }

    public function registerFormWidgets()
    {
        return
            [
                'Fw\Backend\FormWidgets\Multiselect' => [
                    'label' => 'Multiselect field',
                    'code'  => 'multiselect'
                ],
                'Fw\Backend\FormWidgets\Selectize' => [
                    'label' => 'Dropdown Input field',
                    'code'  => 'selectize'
                ]
            ];
    }

    public function registerMarkupTags()
    {
        return [
            'filters' => [
                'ru_date' => [$this, 'ruDate'],
                'person' => [$this, 'person']
            ],
        ];
    }

    public function ruDate($text)
    {
        $months = [1 => 'января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря'];
        if (strlen($text) < 5) return $text;
        if (strlen($text) > 10) {
            $text = substr($text, 0, 10);
        }
        $date = Carbon::createFromFormat('Y-m-d', $text);
        $key = $date->format('n');
        return $date->format('d ' . $months[$key] . ' Y');
    }

    public function person($text)
    {
        $parts = explode(" ", $text);
        $first = array_shift($parts);
        array_push($parts, $first);
        $text = implode(" ", $parts);
        return $text;
    }

    public function boot()
    {
        Event::listen('backend.form.extendFields', function ($controlLibrary) {
            $controlLibrary->AddCss([
                '$/fw/backend/assets/css/style.css',
            ]);
        });

        Event::listen('cms.page.beforeRenderPage', function ($controller, $page) {
            $twig = $controller->getTwig();
            $twig->addExtension(new SwitchTwigExtension());
        });

        Relation::morphMap([
            'news' => 'fw\Backend\Models\News',
            'person' => 'fw\Backend\Models\Person',
            'company' => 'fw\Backend\Models\Company',
            'universe' => 'fw\Backend\Models\Universe',
            'videogame' => 'fw\Backend\Models\Videogame',
            'book' => 'fw\Backend\Models\Book',
            'book_edition' => 'fw\Backend\Models\BookEdition'
        ]);
    }
}
