<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;
use Faker\Generator as Faker;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $tag_names = [
            'FrontEnd',
            'BackEnd',
            'FullStack',
            'Ui',
            'Sistemista',
            'DevOps',
            'Designer',
            'MarketingWeb',
            'Contabilità',
            'SocialMediaManager'
        ];

        foreach ($tag_names as $tag) {
            
            $newTag = new Tag();
            $newTag->label = $tag;
            $newTag->color = $faker->hexColor();
            $newTag->save();
            
        }
    }
}
