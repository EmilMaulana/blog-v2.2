<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

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
            'name' => 'Emil Maulana',
            'email' => 'emilmaulana@gmail.com',
            'password' => bcrypt('password')
        ]);

        // User::create([
        //     'name' => 'Maulana Emil',
        //     'email' => 'maulana@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Programming',
            'slug' => 'web-programming'
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);

        Category::create([
            'name' => 'Mobile Programming',
            'slug' => 'mobile-programming'
        ]);


        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus fugit doloribus dolorum rerum, tempore modi repudiandae aperiam repellat dicta esse, explicabo suscipit corrupti quod temporibus eveniet iste exercitationem obcaecati tempora mollitia eligendi. Porro dignissimos a eius iure qui rerum repellendus eum aut fugit laborum placeat odio, ducimus necessitatibus ea culpa accusamus! Temporibus saepe est reiciendis numquam enim assumenda aliquid, maiores perferendis id veniam',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus fugit doloribus dolorum rerum, tempore modi repudiandae aperiam repellat dicta esse, explicabo suscipit corrupti quod temporibus eveniet iste exercitationem obcaecati tempora mollitia eligendi. Porro dignissimos a eius iure qui rerum repellendus eum aut fugit laborum placeat odio, ducimus necessitatibus ea culpa accusamus! Temporibus saepe est reiciendis numquam enim assumenda aliquid, maiores perferendis id veniam voluptatibus, sint fugit quaerat deleniti beatae facilis! Facere harum architecto, ut consectetur voluptatibus sequi earum veniam hic eveniet beatae ab dignissimos tenetur non nisi doloribus fugiat molestiae explicabo quidem! Voluptas animi explicabo dolorum quo, rem atque consequuntur labore facere corrupti officia illo quisquam ab obcaecati optio necessitatibus id voluptates, quasi perspiciatis! Velit amet beatae qui iusto. Odit tempore, esse itaque et necessitatibus dolore obcaecati vero? Pariatur error sapiente quo, dolorem eveniet ducimus laboriosam, deserunt soluta odit earum tempore assumenda! Quos consequuntur quam voluptas adipisci quaerat iusto aspernatur! Iste excepturi totam doloremque necessitatibus blanditiis expedita consequuntur sed magnam autem. Vel incidunt porro, quidem voluptatem assumenda magnam ab. Sit suscipit eligendi cum officiis necessitatibus quod id quia. Corrupti, repellat! Modi possimus architecto veritatis quisquam numquam minus praesentium explicabo magni quo ut, repellat aliquam quasi quibusdam, dolore incidunt temporibus voluptatum!',
        //     'category_id' => 1,
        //     'user_id' => 1

        // ]);

        // Post::create([
        //     'title' => 'Judul Kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus fugit doloribus dolorum rerum, tempore modi repudiandae aperiam repellat dicta esse, explicabo suscipit corrupti quod temporibus eveniet iste exercitationem obcaecati tempora mollitia eligendi. Porro dignissimos a eius iure qui rerum repellendus eum aut fugit laborum placeat odio, ducimus necessitatibus ea culpa accusamus! Temporibus saepe est reiciendis numquam enim assumenda aliquid, maiores perferendis id veniam',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus fugit doloribus dolorum rerum, tempore modi repudiandae aperiam repellat dicta esse, explicabo suscipit corrupti quod temporibus eveniet iste exercitationem obcaecati tempora mollitia eligendi. Porro dignissimos a eius iure qui rerum repellendus eum aut fugit laborum placeat odio, ducimus necessitatibus ea culpa accusamus! Temporibus saepe est reiciendis numquam enim assumenda aliquid, maiores perferendis id veniam voluptatibus, sint fugit quaerat deleniti beatae facilis! Facere harum architecto, ut consectetur voluptatibus sequi earum veniam hic eveniet beatae ab dignissimos tenetur non nisi doloribus fugiat molestiae explicabo quidem! Voluptas animi explicabo dolorum quo, rem atque consequuntur labore facere corrupti officia illo quisquam ab obcaecati optio necessitatibus id voluptates, quasi perspiciatis! Velit amet beatae qui iusto. Odit tempore, esse itaque et necessitatibus dolore obcaecati vero? Pariatur error sapiente quo, dolorem eveniet ducimus laboriosam, deserunt soluta odit earum tempore assumenda! Quos consequuntur quam voluptas adipisci quaerat iusto aspernatur! Iste excepturi totam doloremque necessitatibus blanditiis expedita consequuntur sed magnam autem. Vel incidunt porro, quidem voluptatem assumenda magnam ab. Sit suscipit eligendi cum officiis necessitatibus quod id quia. Corrupti, repellat! Modi possimus architecto veritatis quisquam numquam minus praesentium explicabo magni quo ut, repellat aliquam quasi quibusdam, dolore incidunt temporibus voluptatum!',
        //     'category_id' => 2,
        //     'user_id' => 2

        // ]);
        // Post::create([
        //     'title' => 'Judul Ketiga',
        //     'slug' => 'judul-ketiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus fugit doloribus dolorum rerum, tempore modi repudiandae aperiam repellat dicta esse, explicabo suscipit corrupti quod temporibus eveniet iste exercitationem obcaecati tempora mollitia eligendi. Porro dignissimos a eius iure qui rerum repellendus eum aut fugit laborum placeat odio, ducimus necessitatibus ea culpa accusamus! Temporibus saepe est reiciendis numquam enim assumenda aliquid, maiores perferendis id veniam',
        //     'body' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus fugit doloribus dolorum rerum, tempore modi repudiandae aperiam repellat dicta esse, explicabo suscipit corrupti quod temporibus eveniet iste exercitationem obcaecati tempora mollitia eligendi. Porro dignissimos a eius iure qui rerum repellendus eum aut fugit laborum placeat odio, ducimus necessitatibus ea culpa accusamus! Temporibus saepe est reiciendis numquam enim assumenda aliquid, maiores perferendis id veniam voluptatibus, sint fugit quaerat deleniti beatae facilis! Facere harum architecto, ut consectetur voluptatibus sequi earum veniam hic eveniet beatae ab dignissimos tenetur non nisi doloribus fugiat molestiae explicabo quidem! Voluptas animi explicabo dolorum quo, rem atque consequuntur labore facere corrupti officia illo quisquam ab obcaecati optio necessitatibus id voluptates, quasi perspiciatis! Velit amet beatae qui iusto. Odit tempore, esse itaque et necessitatibus dolore obcaecati vero? Pariatur error sapiente quo, dolorem eveniet ducimus laboriosam, deserunt soluta odit earum tempore assumenda! Quos consequuntur quam voluptas adipisci quaerat iusto aspernatur! Iste excepturi totam doloremque necessitatibus blanditiis expedita consequuntur sed magnam autem. Vel incidunt porro, quidem voluptatem assumenda magnam ab. Sit suscipit eligendi cum officiis necessitatibus quod id quia. Corrupti, repellat! Modi possimus architecto veritatis quisquam numquam minus praesentium explicabo magni quo ut, repellat aliquam quasi quibusdam, dolore incidunt temporibus voluptatum!',
        //     'category_id' => 2,
        //     'user_id' => 2

        // ]);
    }
}
