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

        $tagBuilder = $this->tags();

        $tagBuilder->withPivot('sort');

        foreach ($this->tagsSorting() as $column => $direction) {
            $tagBuilder->orderBy($column, $direction);
        }

        foreach ($tagBuilder->get() as $tag) {
            $postBuilder = $tag->posts();

            foreach ($this->postsSorting() as $column => $direction) {
                $postBuilder->orderBy($column, $direction);
            }

            foreach ($postBuilder->get() as $post) {
                $posts[] = $post;
            }
        }

        return $posts;
    }

    public function getSortingAttribute()
    {
        return json_decode($this->attributes['sorting']);
    }

    public function setSortingAttribute($value)
    {
        $this->attributes['sorting'] = json_encode($value);
    }

    protected function tagsSorting()
    {
        if (isset($this->sorting->tags)) {
            return $this->sorting->tags;
        }

        return [];
    }

    protected function postsSorting()
    {
        if (isset($this->sorting->posts)) {
            return $this->sorting->posts;
        }

        return [];
    }
}
