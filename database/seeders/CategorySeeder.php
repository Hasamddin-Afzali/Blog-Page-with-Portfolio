<?php

namespace Database\Seeders;

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
        Category::create([
            'title'=>'Web Development',
            'top_category'=>0,
            'created_by'=>1,
            'created_at'=>now(),
        ]);

        Category::create([
            'title'=>'Cyber Security',
            'top_category'=>0,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'Machine Learning',
            'top_category'=>0,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'Frontend',
            'top_category'=>1,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'Backend',
            'top_category'=>1,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'HTML',
            'top_category'=>4,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'CSS',
            'top_category'=>4,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'Javascript',
            'top_category'=>4,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'PHP',
            'top_category'=>5,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
        Category::create([
            'title'=>'Database',
            'top_category'=>5,
            'created_by'=>1,
            'created_at'=>now(),
        ]);
    }
}
