<?php

namespace TagPage;

use Baum\Node;

class TagPage extends Node {

    protected $table = 'tag_pages';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * @return array
     */
    public function posts()
    {
        // TODO: sorting magic here...

        $posts = [];

        foreach ($this->tags()->with('posts')->get() as $tag) {
            foreach ($tag->posts()->get() as $post) {
                $posts[] = $post;
            }
        }

        return $posts;
    }
}
