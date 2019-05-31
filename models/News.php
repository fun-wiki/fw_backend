<?php namespace fw\Backend\Models;

use Model;
use Fw\Backend\Traits\Permalink;

class News extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $table = 'fw_backend_news';

    public $permalink = 'news/:content.title';

    public $rules = [
    ];

    public $timestamps = false;

    protected $fillable = [
        'title',
        'description'
    ];

    public $belongsTo = [
        'universe' => ['fw\Backend\Models\Universe'],
    ];

    public $attachOne = [
        'cover' => 'System\Models\File'
    ];

    public $morphOne = [
        'content' => ['Fw\Backend\Models\Content', 'name' => 'contentable'],
    ];

    public function afterSave()
    {
        if (!$this->content) {
            $content = new Content;
        } else {
            $content = $this->content;
        }

        if (!$this->universe) {

        }

        // trace_log($this->universe->content->category->id);

        $category_isset = \fw\Backend\Models\Category::where([['parent_id', $this->universe->content->category->id], ['title', 'news']])->get();

        // trace_log($category_isset[0]->id);

        $category = $this->content->category;

        if (!$category)  {
            if (!isset($category_isset[0]->id)) {
                $category = new \fw\Backend\Models\Category;
                $category->title = 'news';
                $category->parent_id = $this->universe->content->category->id;
                $category->save();
            } else {
                $category = $category_isset[0];
            }
        } else {
            $category = $category_isset[0];
        }

        // trace_log($category);

        $content->category_id = $category->id;
        $content->permalink = Permalink::createPermalink($this);
        $content->contentable_id = $this->id;
        $this->title = $content->title;
        $this->content()->add($content);
    }
}
