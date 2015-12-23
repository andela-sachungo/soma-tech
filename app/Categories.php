<?php

namespace Soma;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
    ];

    /**
     * A category belongs to a user.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('Soma\User');
    }

    /**
     * A category has many videos.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function videos()
    {
        return $this->hasMany('Soma\Videos', 'category_id');
    }
}
