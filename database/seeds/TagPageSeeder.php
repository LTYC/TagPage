<?php

use Illuminate\Database\Seeder;
use TagPage\TagPage;

class TagPageSeeder extends Seeder {

    public function run()
    {
        $this->createRoot();

        for($i = 0; $i < 25; $i++) {
            $page = $this->getRandomPage();
            $page->children()->create([
                'name' => 'page-' . ($i + 1),
                'perma_link' => ltrim($page->perma_link . '/page-' . ($i + 1), '/'),
                'sorting' => ''
            ]);
        }
    }

    protected function createRoot() {
        TagPage::create([
            'name' => 'root',
            'perma_link' => '',
            'sorting' => ''
        ]);
    }

    protected function getRandomPage() {
        return TagPage::where('depth', '<=', 3)->orderByRaw('RAND()')->first();
    }
} 