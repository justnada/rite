<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nada Yumna',
            'username' => 'nadayumna',
            'email' => 'naddyyum@gmail.com',
            'password' => bcrypt('password')
        ]);

        User::factory(4)->create();
                        
        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'UI/UX Design',
            'slug' => 'ui-ux-design'
        ]);

        Category::create([
            'name' => 'Graphic Design',
            'slug' => 'graphic-design'
        ]);

        Post::factory(30)->create();
    }
}
