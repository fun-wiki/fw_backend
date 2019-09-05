<?php

namespace Fw\Backend\Traits;

use Exception;
use Str;

trait Permalink
{
    public static function bootPermalink()
    {
        if (!property_exists(get_called_class(), 'permalink')) {
            throw new Exception(sprintf(
                'You must define a $permalink property in %s to use the Permalink trait.',
                get_called_class()
            ));
        }
    }

    public static function createPermalink($model)
    {
        $parts = explode('/', $model->permalink);
        $fulllink = '';
        foreach ($parts as $part) {
            if (substr($part, 0, 1) === ':') {
                $result = preg_split('/[\s:.]+/', $part);
                if (isset($result[2])) {
                    $res = $result[1];
                    $res2 = $result[2];
                    $param = $model->$res[$res2];
                } else {
                    $param = $model->{$result[1]};
                }
            } else {
                $param = $part;
            }

            $fulllink = $fulllink . '/' . Str::slug($param);
        }
        return $fulllink;
    }
}
