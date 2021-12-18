<?php

use App\User;
use App\Category;
use App\Tag;
use App\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = Category::create([
            "title" => "News"
        ]);

        $category2 = Category::create([
            "title" => "Marketing"
        ]);

        $category3 = Category::create([
            "title" => "Partnership"
        ]);


        $author1 = User::create([
            'name' => 'John Doe',
            'email' => 'john@mail.com',
            'password' => Hash::make('111111')
        ]);

        $author2 = User::create([
            'name' => 'Annie Miller',
            'email' => 'annie@mail.com',
            'password' => Hash::make('111111')
        ]);

        $author3 = User::create([
            'name' => 'Michele Obama',
            'email' => 'michele@mail.com',
            'password' => Hash::make('111111')
        ]);



        $post1 = Post::create([
            "title" => "We relocated our office to a new designed garage",
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "body" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "category_id" => $category1->id,
            "image" => "posts/1.jpg",
            "user_id" => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            "title" => "Top 5 brilliant content marketing strategies",
            "description" => "the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "body" => "the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "category_id" => $category2->id,
            "image" => "posts/2.jpg"
        ]);

        $post3 = $author1->posts()->create([
            "title" => "Best practices for minimalist design with example",
            "description" => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "body" => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "category_id" => $category3->id,
            "image" => "posts/3.jpg"
        ]);

        $post4 = $author2->posts()->create([
            "title" => "This is why it's time to ditch dress codes at work",
            "description" => "when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "body" => "when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "category_id" => $category2->id,
            "image" => "posts/1.jpg"
        ]);

        $tag1 = Tag::create([
            "title" => "job"
        ]);

        $tag2 = Tag::create([
            "title" => "customers"
        ]);

        $tag3 = Tag::create([
            "title" => "records"
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
        $post4->tags()->attach([$tag3->id, $tag1->id]);
    }
}
