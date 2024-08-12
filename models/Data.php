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
        'format' => 'Pensoft\Resources\Models\Format',
    ];

    public function scopeSearchTerms($query, $searchTerms)
    {
        if (!empty($searchTerms) && is_array($searchTerms)) {
            foreach ($searchTerms as $term) {
                $query->orWhere('title', 'ILIKE', "%{$term}%");
                $query->orWhere('authors', 'ILIKE', "%{$term}%");
                $query->orWhere('volume', 'ILIKE', "%{$term}%");
                $query->orWhere('journal', 'ILIKE', "%{$term}%");
                $query->orWhere('doi', 'ILIKE', "%{$term}%");
                $query->orWhere('status', 'ILIKE', "%{$term}%");
                $query->orWhere('place', 'ILIKE', "%{$term}%");
                $query->orWhere('source', 'ILIKE', "%{$term}%");
                $query->orWhere('web_page', 'ILIKE', "%{$term}%");
            }
        }
        return $query;
    }
}
