<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use App\Models\Review;
use App\Models\Role;
use App\Models\Todolist;
use App\Models\User;
use Illuminate\Support\Str;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Seeder Akun User & Role

        $roles = [
            [
                'name' => 'User',
                'slug' => 'user',
            ],
            [
                'name' => 'Admin',
                'slug' => 'admin',
            ],
            [
                'name' => 'Super Admin',
                'slug' => 'superadmin',
            ],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }

        $users = [
            [
                'name' => 'Admin 1',
                'email' => 'admin1@example.com',
                'username' => 'admin1',
                'password' => '12345',
                'role_id' => 2,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 09'
            ],
            [
                'name' => 'Admin 2',
                'email' => 'admin2@example.com',
                'username' => 'admin2',
                'password' => '12345',
                'role_id' => 2,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 08'
            ],
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@example.com',
                'username' => 'superadmin',
                'password' => '12345',
                'role_id' => 3,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 7'
            ],
            [
                'name' => 'User',
                'email' => 'user@example.com',
                'username' => 'user',
                'password' => '12345',
                'role_id' => 1,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 10'
            ],
            [
                'name' => 'User 2',
                'email' => 'user2@example.com',
                'username' => 'user2',
                'password' => '12345',
                'role_id' => 1,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 11'
            ],
            [
                'name' => 'Fulan Akhi',
                'email' => 'fulan@example.com',
                'username' => 'fulan',
                'password' => '12345',
                'role_id' => 1,
                'gender' => 'l',
                'address' => 'Kp.Harapan Baru RT 01/ RW 12'
            ],
            [
                'name' => 'Fulanah Ukhti',
                'email' => 'fulanah@example.com',
                'username' => 'fulanah',
                'password' => '12345',
                'role_id' => 1,
                'gender' => 'p',
                'address' => 'Kp.Harapan Baru RT 01/ RW 13'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

        // $reviews = [
        //     [
        //         'message' => 'Wow, Amazing sekali website ini. sangat membantu kami yg profesi nya sebagai developer',
        //         'rating' => 5,
        //         'user_id' => 5,
        //     ],
        //     [
        //         'message' => 'Aduh... udh gak ada obat lagi dah nih website, gak abis pikir sama ide2nya',
        //         'rating' => 4,
        //         'user_id' => 6,
        //     ],
        //     [
        //         'message' => 'Pokoke lancar lah project an ku, karena errors semuanya menjadi mudah. Terimakasih Errors 😭',
        //         'rating' => 5,
        //         'user_id' => 7,
        //     ],
        // ];

        // foreach ($reviews as $r) {
        //     Review::query()->create($r);
        // }

        // $categories = [
        //     [
        //         'name' => 'PHP',
        //         'slug' => 'php'
        //     ],
        //     [
        //         'name' => 'JavaScript',
        //         'slug' => 'javascript'
        //     ],
        //     [
        //         'name' => 'CSS',
        //         'slug' => 'css'
        //     ],
        //     [
        //         'name' => 'HTML',
        //         'slug' => 'html'
        //     ],
        //     [
        //         'name' => 'SQL',
        //         'slug' => 'sql'
        //     ],
        //     [
        //         'name' => 'Database',
        //         'slug' => 'database'
        //     ],
        //     [
        //         'name' => 'JQuery',
        //         'slug' => 'jquery'
        //     ],
        //     [
        //         'name' => 'Laravel',
        //         'slug' => 'laravel'
        //     ],
        //     [
        //         'name' => 'ReactJS',
        //         'slug' => 'reactjs'
        //     ],
        //     [
        //         'name' => 'VueJS',
        //         'slug' => 'vuejs'
        //     ],
        //     [
        //         'name' => 'NextJS',
        //         'slug' => 'nextjs'
        //     ]
        // ];

        // foreach ($categories as $c) {
        //     Category::query()->create($c);
        // }

        // $questions = [
        //     [
        //         'title' => 'What is Laravel?',
        //         'slug' => Str::slug('What is Laravel?'),
        //         'description_editor' => "I'm still confused about what's the best way to get started with Laravel.",
        //         'description_original' => "I'm still confused about what's the best way to get started with Laravel.",
        //         'user_id' => 4,
        //         'category_id' => 8,
        //     ],
        //     [
        //         'title' => 'What is ReactJS?',
        //         'slug' => Str::slug('What is ReactJS?'),
        //         'description_editor' => "I'm still confused about what's the best way to get started with ReactJS.",
        //         'description_original' => "I'm still confused about what's the best way to get started with ReactJS.",
        //         'user_id' => 4,
        //         'category_id' => 9,
        //         'status' => 1
        //     ],
        //     [
        //         'title' => 'What is VueJS?',
        //         'slug' => Str::slug('What is VueJS?'),
        //         'description_editor' => "I'm still confused about what's the best way to get started with VueJS.",
        //         'description_original' => "I'm still confused about what's the best way to get started with VueJS.",
        //         'user_id' => 5,
        //         'category_id' => 10,
        //         'status' => 1
        //     ],
        //     [
        //         'title' => 'What is NextJS?',
        //         'slug' => Str::slug('What is NextJS?'),
        //         'description_editor' => "I'm still confused about what's the best way to get started with NextJS.",
        //         'description_original' => "I'm still confused about what's the best way to get started with NextJS.",
        //         'user_id' => 5,
        //         'category_id' => 11,
        //     ]
        // ];

        // foreach ($questions as $q) {
        //     Question::query()->create($q);
        // }

        // $answers = [
        //     [
        //         'title' => 'The explanation of laravel',
        //         'slug' => Str::slug('The explanation of laravel'),
        //         'description_editor' => "Laravel is a free, open-source PHP web framework used for web application development. It follows the model-view-controller (MVC) architectural pattern and provides a range of features such as routing, authentication, and database management tools. Laravel is designed to make it easier for developers to write and maintain PHP code, and to build robust, scalable applications.",
        //         'description_original' => "Laravel is a free, open-source PHP web framework used for web application development. It follows the model-view-controller (MVC) architectural pattern and provides a range of features such as routing, authentication, and database management tools. Laravel is designed to make it easier for developers to write and maintain PHP code, and to build robust, scalable applications.",
        //         'user_id' => 6,
        //         'category_id' => 8,
        //     ],
        //     [
        //         'title' => 'The explanation of reactjs',
        //         'slug' => Str::slug('The explanation of reactjs'),
        //         'description_editor' => "React is a JavaScript library for building user interfaces. It was developed by Facebook, and is often used for building single-page applications and mobile applications.",
        //         'description_original' => "React is a JavaScript library for building user interfaces. It was developed by Facebook, and is often used for building single-page applications and mobile applications.",
        //         'user_id' => 6,
        //         'category_id' => 9,
        //     ],
        //     [
        //         'title' => 'Explore more about VueJS',
        //         'slug' => Str::slug('Explore more about VueJS'),
        //         'description_editor' => "Vue.js is a JavaScript framework for building web applications. It was developed by Evan You, and is designed to be lightweight and easy to learn.",
        //         'description_original' => "Vue.js is a JavaScript framework for building web applications. It was developed by Evan You, and is designed to be lightweight and easy to learn.",
        //         'user_id' => 7,
        //         'category_id' => 10,
        //     ],
        //     [
        //         'title' => 'Explore more about NextJS',
        //         'slug' => Str::slug('Explore more about NextJS'),
        //         'description_editor' => "Next.js is a JavaScript framework for building server-rendered or statically exported React applications. It was developed by Vercel (formerly known as Zeit) and is designed to make it easy for developers to create fast, server-rendered React applications.",
        //         'description_original' => "Next.js is a JavaScript framework for building server-rendered or statically exported React applications. It was developed by Vercel (formerly known as Zeit) and is designed to make it easy for developers to create fast, server-rendered React applications.",
        //         'user_id' => 7,
        //         'category_id' => 11,
        //     ]
        // ];

        // foreach ($answers as $a) {
        //     Answer::query()->create($a);
        // }

        // $todolists = [
        //     [
        //         'task' => 'Membuat Pertanyaan',
        //         'type' => 'user',
        //         'role_id' => 1,
        //     ],
        //     [
        //         'task' => 'Membalas Pertanyaan',
        //         'type' => 'user',
        //         'role_id' => 1,
        //     ],
        //     [
        //         'task' => 'Melihat Pertanyaan',
        //         'type' => 'user',
        //         'role_id' => 1,
        //     ],
        //     [
        //         'task' => 'Share Pemecahan Masalah',
        //         'type' => 'user',
        //         'role_id' => 1,
        //     ],
        //     [
        //         'task' => 'Menghapus Pertanyaan',
        //         'type' => 'user',
        //         'role_id' => 1,
        //     ],
        //     [
        //         'task' => 'CRUD Kategori',
        //         'type' => 'admin',
        //         'role_id' => 2,
        //     ],
        //     [
        //         'task' => 'Korek / Melihat Share Jawaban Masalah',
        //         'type' => 'admin',
        //         'role_id' => 2,
        //     ],
        //     [
        //         'task' => 'Memberikan Persetujuan untuk Share Jawaban Masalah',
        //         'type' => 'admin',
        //         'role_id' => 2,
        //     ],
        //     [
        //         'task' => 'Memberikan Persetujuan untuk Review dari User',
        //         'type' => 'admin',
        //         'role_id' => 2,
        //     ],
        //     [
        //         'task' => 'Membuat Akun Admin',
        //         'type' => 'superadmin',
        //         'role_id' => 3,
        //     ],
        //     [
        //         'task' => 'Melihat Details Admin',
        //         'type' => 'superadmin',
        //         'role_id' => 3,
        //     ],
        //     [
        //         'task' => 'Menghapus Admin',
        //         'type' => 'superadmin',
        //         'role_id' => 3,
        //     ]
        // ];

        // foreach ($todolists as $todolist) {
        //     Todolist::query()->create($todolist);
        // }
    }
}
