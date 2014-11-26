<?php

use Illuminate\Database\Seeder;
use TagPage\TagPage;

class TagPageSeeder extends Seeder {

    public function run()
    {
        $root = TagPage::create([
            'perma_link' => 'en'
        ]);

        $root->children()->create([
            'perma_link' => 'home'
        ]);
        $root->children()->create([
            'perma_link' => 'about_us'
        ]);
        $root->children()->create([
            'perma_link' => 'impressum'
        ]);
    }

} 