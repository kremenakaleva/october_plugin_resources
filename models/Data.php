<?php namespace Pensoft\Resources\Models;

use Model;

/**
 * Model
 */
class Data extends Model
{
    use \October\Rain\Database\Traits\Validation;

    use \October\Rain\Database\Traits\SoftDelete;

    protected $dates = ['deleted_at'];


    /**
     * @var string The database table used by the model.
     */
    public $table = 'pensoft_resources_data';

    /**
     * @var array Validation rules
     */
    public $rules = [
    ];

    public $attachOne = [
        'cover' => 'System\Models\File',
        'file' => 'System\Models\File',
    ];

    public $attachMany = [
        'file_langs' => 'System\Models\File',
    ];

    public $belongsTo = [
        'format' => 'Pensoft\Knowledgelibrary\Models\Format',
    ];
}
