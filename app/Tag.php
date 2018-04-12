<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;
    protected $fillable =['title'];

    public function announcements()
    {
        return $this->belongsToMany(
        Announcement::class,
        'announcement_tags',
        'tag_id',
        'announcement_id'
        );

    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
