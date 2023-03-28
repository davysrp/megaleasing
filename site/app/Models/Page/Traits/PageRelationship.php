<?php

namespace App\Models\Page\Traits;

use App\Models\Access\User\User;

trait PageRelationship
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by');
    }



    public function parent() {
        return $this->belongsToOne(static::class, 'parent_id');
    }

    //each category might have multiple children
    public function children() {
        return $this->hasMany(static::class, 'parent_id')->orderBy('title', 'asc');
    }

}
