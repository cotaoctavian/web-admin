<?php

namespace App\Models;

use App\BaseModel;

class Exposition extends BaseModel
{
    //
    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'exposition_id';

    protected $fillable = ['museum_id', 'title', 'description', 'photo_id'];

    public function museum()
    {
        return $this->belongsTo(Museum::class, 'museum_id', 'museum_id');
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class,'staff_id','staff_id');
    }

    public function exhibits()
    {
        return $this->hasMany(Exhibit::class);
    }

/*    public function media()
    {
        return $this->hasOne(Media::class);
    }*/


    public function photo()
    {
        return $this->hasManyThrough(Photo::class, Media::class,'media_id', 'photo_id', 'photo_id');
    }


    /**
     * Scope a query to find last 5 expositions.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query_obj
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLastFive($query_obj)
    {
        return $query_obj->orderBy('exposition_id', 'desc')
            ->take(5);
    }

    /** Function to get photo path by photo_id */
    public function getPhotoPath()
    {
        return $this->photo[0]->path;
    }
}
