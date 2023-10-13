<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Post::truncate();
        Comment::truncate();

        User::factory(3)->create();

        Category::factory(10)->create();

        Post::factory(60)->create();

        Comment::factory(300)->create();

        // Category::create([
        //     'name' => 'Personal',
        //     'slug' => 'personal',
        // ]);

        // Category::create([
        //     'name' => 'Family',
        //     'slug' => 'family',
        // ]);

        // Category::create([
        //     'name' => 'Work',
        //     'slug' => 'work',
        // ]);

        // Post::create([
        //     'user_id' => rand(1, 5),
        //     'category_id' => rand(1, 3),
        //     'title' => 'My First Post',
        //     'slug' => 'my-first-post',
        //     'excerpt' => 'Lorem ipsum dolor sit,',
        //     'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis iusto placeat maiores dignissimos,
        //     distinctio doloremque ad quidem minima voluptatibus odit. Mollitia illo pariatur tempore officia natus ea
        //     dolore similique ad.</p>',
        // ]);

        // Post::create([
        //     'user_id' => rand(1, 5),
        //     'category_id' => rand(1, 3),
        //     'title' => 'My Second Post',
        //     'slug' => 'my-second-post',
        //     'excerpt' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
        //     'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Hic porro natus fuga placeat temporibus magnam iusto cupiditate, vel earum aliquam vero repellat, omnis esse. Libero, ipsa rem quisquam itaque doloremque natus animi temporibus laborum deleniti expedita eum. Commodi corrupti alias illo consequuntur magni voluptates maxime saepe delectus eum enim incidunt non reiciendis tempora, cum quos quisquam asperiores repellat nihil ex sapiente! Soluta pariatur provident ipsam aperiam nemo esse, aut laudantium dolorum fuga natus veniam facere maiores ullam dolore voluptatem distinctio impedit qui cum asperiores fugiat aliquam sunt dolor in. Pariatur officia accusantium cumque minima recusandae, laboriosam facere corrupti consectetur asperiores rem explicabo, consequuntur iste cum mollitia nisi dignissimos voluptas maxime a laudantium possimus, quae aperiam quibusdam. Autem obcaecati mollitia voluptatem amet repellat eaque quis, aspernatur rerum totam molestiae iste cumque voluptas minima nulla beatae? Animi id alias iste deleniti, ipsam dicta, esse, excepturi ad at exercitationem velit asperiores nam cumque rerum unde! Amet placeat, odio, soluta nemo suscipit dolore ullam, culpa dolorem laudantium temporibus dicta commodi impedit! Dignissimos consequatur et similique cumque reprehenderit reiciendis odio distinctio tempora nulla nisi eum laboriosam rem vitae autem, harum corporis nihil ullam ipsa voluptatem? Esse qui nisi magnam rem asperiores! Veniam, nobis eius excepturi deserunt aliquid consectetur ea? Expedita obcaecati repudiandae id facilis, a eum mollitia et error quis eos commodi voluptate impedit praesentium vitae ex porro deleniti in quasi numquam odit sit ad earum quos facere. Possimus voluptate voluptatem quis dolorum repellat repellendus nisi consectetur reiciendis nesciunt harum, minus, quisquam praesentium fugiat ipsum.</p>',
        // ]);

        // Post::create([
        //     'user_id' => rand(1, 5),
        //     'category_id' => rand(1, 3),
        //     'title' => 'My Third Post',
        //     'slug' => 'my-third-post',
        //     'excerpt' => 'Dolorem consequatur nulla',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem consequatur nulla amet tempore officia labore necessitatibus eveniet aperiam? Minus dolorum vel inventore similique vero unde.</p>',
        // ]);

        // Post::create([
        //     'user_id' => rand(1, 5),
        //     'category_id' => rand(1, 3),
        //     'title' => 'My Fourth Post',
        //     'slug' => 'my-fourth-post',
        //     'excerpt' => 'Culpa natus voluptatum voluptas inventore expedita',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa natus voluptatum voluptas inventore expedita sed deleniti vitae quasi ab molestias quibusdam deserunt fugit velit rerum similique, beatae a et adipisci. Excepturi illum deserunt consequatur? Excepturi saepe rem temporibus commodi sapiente ut, animi quisquam labore dolore, minus placeat debitis totam magni!</p>',
        // ]);

        // Post::create([
        //     'user_id' => rand(1, 5),
        //     'category_id' => rand(1, 3),
        //     'title' => 'My Fifth Post',
        //     'slug' => 'my-fifth-post',
        //     'excerpt' => 'Magni, assumenda esse.',
        //     'body' => '<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate reiciendis id, sit at nihil ea quod voluptatibus repellendus ducimus culpa veritatis magni dignissimos impedit voluptates hic atque rerum similique. Illum facere voluptatum, fuga ipsa ad eos eum, molestias inventore tenetur aspernatur odio! Laborum ratione sed cupiditate sequi? Nihil necessitatibus accusamus ullam autem maiores, ratione vel earum, itaque, quos eligendi voluptates vitae possimus atque quo quidem ad eveniet molestias recusandae temporibus delectus nam? Magni, assumenda esse.</p>',
        // ]);

        // Post::create([
        //     'user_id' => rand(1, 5),
        //     'category_id' => rand(1, 3),
        //     'title' => 'My Sixth Post',
        //     'slug' => 'my-sixth-post',
        //     'excerpt' => '<p>quod fugit eos hic minima dolorem? Harum beatae pariatur mollitia',
        //     'body' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ullam repellat ducimus quae maxime, minima omnis quibusdam debitis iusto laboriosam ut delectus ratione distinctio quasi dolore rerum id. Dolor veritatis veniam illo cumque cum modi commodi maxime deleniti repellat! Illo harum sed et consequatur odit laboriosam recusandae porro? Voluptas placeat officia quis voluptates tenetur sapiente amet, eaque totam iusto modi dolores voluptatem earum magni, nisi, quod fugit eos hic minima dolorem? Harum beatae pariatur mollitia rerum quibusdam aspernatur inventore. Cupiditate aliquam molestias aliquid quo nisi velit repellat iusto, pariatur doloribus maxime impedit mollitia iste aperiam harum consequuntur similique omnis sit at fugiat consectetur veritatis amet. Iusto mollitia expedita maxime veritatis odio, nulla a, dolorem eum ea maiores aspernatur est! Praesentium cupiditate consequatur veritatis eligendi obcaecati. Quae nihil ipsam beatae fugiat assumenda quas sint, autem temporibus neque, sed itaque, rerum error asperiores voluptates non reiciendis quo ducimus quibusdam. Laboriosam tempora eligendi quae.</p>',
        // ]);
    }
}
