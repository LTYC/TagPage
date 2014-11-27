<?php

namespace TagPage;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

    protected $table = 'posts';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
