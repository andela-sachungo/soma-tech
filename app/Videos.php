<?php

namespace Soma;

use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'user_id',
        'youtube_link',
        'youtube_id',
        'title',
        'description',
        'play',
    ];

    /**
     * A video belongs to a category.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('Soma\Categories');
    }

    /**
     * A video belongs to a user.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userDirect()
    {
        return $this->belongsTo('Soma\User', 'user_id');
    }
}
