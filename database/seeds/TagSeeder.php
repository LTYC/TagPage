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

        $tagPages = TagPage::all();
        foreach ($tagPages as $tagPage)
        {
            $tagPage->tags()->attach($t1);
        }

        for($i = 1; $i < 10; $i++) {
            $this->getRandomTagPage()->tags()->save(Tag::create([
                'name' => 'Tag #' . ($i + 1)
            ]));
        }
    }

    protected function getRandomTagPage() {
        return TagPage::where('depth', '>', 0)->orderByRaw('RAND()')->first();
    }
} 