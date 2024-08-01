<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = ['Urgente', 'Importante', 'Opcional'];

        foreach ($tags as $tag) {
            Tag::create(['name' => $tag]);
        }
    }
}
