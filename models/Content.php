<?php namespace fw\Backend\Models;

use Model;
use Carbon\Carbon;

class Content extends Model
{
    use \October\Rain\Database\Traits\Validation;
    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];

    public $table = 'fw_backend_content';

    public $rules = [];

    public $belongsTo = [
        'author'    => ['Backend\Models\User'],
        'category'  => ['fw\Backend\Models\Category']
    ];

    public $morphTo = [
        'contentable' => []
    ];

    public function getStatusOptions()
    {
        $status = [
            'draft' => 'Черновик',
            'pending' => 'На модерации',
            'published' => 'Опубликован',
            'future' => 'Запланирован',
        ];

        return $status;
    }

    public function beforeSave()
    {
        if (!isset($this->author_id) || empty($this->author_id)) {
            $this->author_id = 1;
        }

        if ($this->status == 'published') {
            if ($this->published_at == null) {
                $this->published_at = Carbon::now();
            }
        } else {
            $this->published_at = null;
        }
    }
}
