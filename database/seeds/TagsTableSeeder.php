<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Str;

use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = ['Easy', 'Medium', 'Complicated', 'Hard', 'SupeHard'];


        foreach($tags as $tag){
            Tag::create([
                "name"=> $tag,
                "slug"=> Str::slug($tag)
            ]);
        }
    }
}
