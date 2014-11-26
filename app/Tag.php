<?php

namespace TagPage;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $table = 'tags';

    public function pages()
    {
        return $this->belongsToMany(TagPage::class);
    }
} 