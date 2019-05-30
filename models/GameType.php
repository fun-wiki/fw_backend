<?php namespace fw\Backend\Models;

use Model;

class GameType extends Model
{
    use \October\Rain\Database\Traits\Validation;
    
    public $timestamps = false;

    public $table = 'fw_backend_game_types';

    public $rules = [];

    protected $fillable = [
        'title'
    ];
}
