<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['label' => 'HTML', 'color' => 'blue'],
            ['label' => 'CSS', 'color' => 'tomato'],
            ['label' => 'Javascript', 'color' => 'green'],
            ['label' => 'VueJs', 'color' => 'purple'],
            ['label' => 'Laravel', 'color' => 'yellow'],
        ];
    
        foreach ($categories as $category) {
            
            $newCategory = new Category();
            $newCategory->label = $category['label'];
            $newCategory->color = $category['color'];
            $newCategory->save();
            
        }
    }
}
