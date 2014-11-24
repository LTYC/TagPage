<?php

namespace TagPage;

use Baum\Node;

class TagPage extends Node {

    protected $table = 'tag_pages';

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

} 