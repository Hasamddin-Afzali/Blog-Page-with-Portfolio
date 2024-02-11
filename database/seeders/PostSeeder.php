<?php

namespace Database\Seeders;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::create([
            'title'=>'Blog Post About Javascript',
            'category'=>8,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(10),
        ]);
        Post::create([
            'title'=>'Blog Post About HTML',
            'category'=>6,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(15),
        ]);
        Post::create([
            'title'=>'Blog Post About PHP',
            'category'=>9,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(8),
        ]);
        Post::create([
            'title'=>'Blog Post About Cyber Security',
            'category'=>2,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(13),
        ]);
        Post::create([
            'title'=>'Blog Post About Machine Learning',
            'category'=>3,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(2),
        ]);
        Post::create([
            'title'=>'Blog Post 2 About Javascript',
            'category'=>8,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(10),
        ]);
        Post::create([
            'title'=>'Blog Post 2 About HTML',
            'category'=>6,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(15),
        ]);
        Post::create([
            'title'=>'Blog Post 2 About PHP',
            'category'=>9,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(8),
        ]);
        Post::create([
            'title'=>'Blog Post 2 About Cyber Security',
            'category'=>2,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(13),
        ]);
        Post::create([
            'title'=>'Blog Post 2 About Machine Learning',
            'category'=>3,
            'img_path'=>'/storage/img/postHeaders/3UbPNp4JawqtPNHe2qo0trHljtnYCUuHerxePXnk.jpg',
            'short_description'=> 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque, quasi. Nostrum veniam laboriosam at ex ipsam maxime accusamus molestiae eaque repellat hic voluptatem dolorum quod numquam sit, possimus necessitatibus. Tempora rem recusandae assumenda cum architecto incidunt adipisci autem ab veniam!',
            'body'=>"Lorem ipsum, dolor sit amet consectetur adipisicing elit. Commodi, quae quos tempore doloremque voluptate possimus quasi quibusdam necessitatibus ipsum quam optio natus eos ea. Magni sapiente alias, quidem, ducimus architecto magnam laudantium similique culpa placeat, fugiat voluptates quo explicabo exercitationem quibusdam. Ut, aliquam veniam! Reprehenderit, quibusdam placeat commodi voluptatum necessitatibus nobis fugiat cum beatae sint dolor cupiditate neque debitis expedita nulla aut harum quia et, nostrum ipsum vel. Commodi sunt adipisci quisquam placeat dolorem ipsa recusandae necessitatibus? Quibusdam, maxime error?",
            'created_by'=>1,
            'created_at'=>Carbon::now()->subDays(2),
        ]);
    }
}
