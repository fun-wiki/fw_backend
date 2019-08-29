<?php namespace Fw\Backend\Traits;

use Exception;
use Fw\Backend\Models\Permalink as Permalinks;
use Str;

trait Permalink
{
    /**
     * @var array List of attributes to automatically generate unique URL names (slugs) for.
     *
     * protected $permalink = [];
     */

    public static function bootPermalink()
    {
        if (!property_exists(get_called_class(), 'permalink')) {
            throw new Exception(sprintf(
                'You must define a $permalink property in %s to use the Permalink trait.', get_called_class()
            ));
        }


        static::extend(function($model) {
            // $model->morphOne['permalinked'] = ['Fw\Backend\Models\Permalink', 'name' => 'permalinks'];
            // $model->bindEvent('model.afterSave', function() use ($model) {
            //     $model->createPermalink();
            // });
        });
    }

    public static function createPermalink($model) 
    {
        // trace_log($model->permalink);
        // trace_log($model);
        $parts = explode('/', $model->permalink);

        $fulllink = '';

        foreach ($parts as $part) {
            
            if (substr($part, 0, 1) === ':')
            {
                $result = preg_split ('/[\s:.]+/', $part);
                if (isset($result[2])) {
                    // trace_log($result[1]);
                    // trace_log($result[2]);
                    $res = $result[1];
                    $res2 = $result[2];
                    $param = $model->$res[$res2];
                } else {
                     $param = $model->{$result[1]};
                }
            } else {
                $param = $part;
            }
            
            $fulllink = $fulllink.'/'.Str::slug($param);
        }
        
        // trace_log($fulllink);
        return $fulllink;

        //trace_log($model_name);

        //trace_log(new Permalinks->$this);
    }
}

?>