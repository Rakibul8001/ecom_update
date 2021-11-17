<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ImageBanner
 *
 * @property int $id
 * @property string|null $photo
 * @property string|null $url
 * @property int $position
 * @property int $published
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner wherePhoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\ImageBanner whereUrl($value)
 * @mixin \Eloquent
 */

class ImageBanner extends Model
{
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('published', function (Builder $builder) {
            $builder->where('published', 1);
        });
    }
}
