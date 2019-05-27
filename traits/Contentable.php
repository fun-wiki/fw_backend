<?php namespace Fw\Backend\Traits;

use Exception;
use Fw\Backend\Models\Permalink as Permalink;
use fw\Backend\Models\Content;

trait Contentable
{
    /**
     * @var array List of attributes to automatically generate unique URL names (slugs) for.
     *
     * protected $contentable = [];
     */

    public static function bootContentable()
    {
        if (!property_exists(get_called_class(), 'contentable')) {
            throw new Exception(sprintf(
                'You must define a $contentable property in %s to use the Contentable trait.', get_called_class()
            ));
        }


        static::extend(function($model) {
            trace_log('model contentable!');
            $model->morphOne['content'] = ['Fw\Backend\Models\Content', 'name' => 'contentable'];
            $model->bindEvent('model.beforeSave', function() use ($model) {
                if (!$model->content) {
                    $content = new Content;
                } else {
                    $content = $model->content;
                }
                $content->permalink = Permalink::createPermalink($model);
                $content->contentable_id = $model->id;
                $model->content()->add($content);
            });
            $model->bindEvent('page.init', function() use ($controller){
                $model->user_id = $controller->user->id;
            })
        });

        static::extend(function($controller) {
            trace_log('controller contentable!');
            $controller->morphOne['content'] = ['Fw\Backend\Models\Content', 'name' => 'contentable'];
            // dump($controller);
            //$controller->formBeforeCreate($model);
            //$controller->formExtendFields($form);
            //$controller->formExtendModel($model);
        });
    }

    private function formBeforeCreate($model)
    {
        $model->user_id = $this->user->id;
    }

    private function formExtendFields($form)
    {
        $config = $this->makeConfig('$/fw/backend/models/content/fields.yaml');

        foreach ($config->fields as $field => $options) {
            $form->addFields([
                'content['.$field.']' => $options
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

?>