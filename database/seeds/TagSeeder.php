<?php

use Illuminate\Database\Seeder;
use TagPage\Tag;
use TagPage\TagPage;

class TagSeeder extends Seeder {

    public function run()
    {
        $t1 = Tag::create([
            'name' => 'Tag #1'
        ]);

        $t2 = Tag::create([
            'name' => 'Tag #2'
        ]);

        $tagPages = TagPage::all();
        foreach ($tagPages as $tagPage)
        {
            $tagPage->tags()->attach($t1);
        }

        $randomTagPage = TagPage::orderByRaw('RAND()')->first();
        $randomTagPage->tags()->attach($t2);
    }

} 