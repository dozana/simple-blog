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
            "title" => "Politics"
        ]);

        $category2 = Category::create([
            "title" => "Economics"
        ]);

        $category3 = Category::create([
            "title" => "Region"
        ]);

        $category4 = Category::create([
            "title" => "Military matters"
        ]);

        $category5 = Category::create([
            "title" => "Culture"
        ]);

        $category6 = Category::create([
            "title" => "Society"
        ]);

        $category7 = Category::create([
            "title" => "Conflicts"
        ]);

        $category8 = Category::create([
            "title" => "Justice"
        ]);

        $category9 = Category::create([
            "title" => "World"
        ]);

        $category10 = Category::create([
            "title" => "Sport"
        ]);

        $category11 = Category::create([
            "title" => "Announcements"
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
            "title" => "Anzor Melia: Several people, who were on a hunger strike near the National Movement office, were taken to clinic",
            "description" => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "body" => "<p>According to Dr. Anzor Melia, several people, who were on a hunger strike near the National Movement office, were taken to his clinic.</p><p>As Anzor Melia explained, after heart attack was ruled out, the hunger strikers again joined the mass hunger strike.</p><p>The hunger strikers are away from their families and children. They bravely endure everything, so I am obliged to stand by them and take care of their health</p><p>The party leaders and supporters of Mikheil Saakashvili are on a hunger strike outside the central office of the United National Movement and demand the release of former Georgian President Mikheil Saakashvili from prison.</p>",
            "category_id" => $category1->id,
            "image" => "posts/1.jpg",
            "user_id" => $author1->id
        ]);

        $post2 = $author2->posts()->create([
            "title" => "Lawyer: Mikheil Saakashvili still cannot get food and his weight is now less than it was at the end of the hunger strike",
            "description" => "the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "body" => "<p>We will not be able to visit Mikheil Saakashvili on weekends. He still cannot get food and his weight is now less than it was at the end of the hunger strike – but no one should have the illusion of imagining Saakashvili as weak, - said Shota Tutberidze, lawyer of former President Mikheil Saakashvili.</p><p>According to him, Mikheil Saakashvili's health condition will not improve in Rustavi prison because he has not completed the post-hunger rehabilitation course.</p><p>As he noted, the former president has limited communication and lawyers are not allowed to exchange letters, which is a restriction of the convict's rights.</p>",
            "category_id" => $category1->id,
            "image" => "posts/2.jpg"
        ]);

        $post3 = $author1->posts()->create([
            "title" => "Securities amounting to 50 000 000 GEL were sold at Treasury Bill Auction",
            "description" => "National Bank of Georgia releases the results of Treasury Bill Auction as a result of which 50 000 000 GEL worth securities were sold.",
            "body" => "<p>National Bank of Georgia releases the results of Treasury Bill Auction as a result of which 50 000 000 GEL worth securities were sold.</p><p>Seven commercial banks participated in the auction. The total demand amounted to GEL 94 000 000. Minimum yield was 8.100%, maximum yield was 8.350% and the weighted average yield was 8.295%, - reads the statement.</p>",
            "category_id" => $category2->id,
            "image" => "posts/3.jpg"
        ]);

        $post4 = $author2->posts()->create([
            "title" => "Former Poti mayor Irakli Kakulia sentenced to 8 years in prison",
            "description" => "when an unknown printer took a galley of type and scrambled it to make a type specimen book",
            "body" => "<p>Former Poti Mayor Irakli Kakulia was sentenced to 8 years in prison by the Zugdidi City Court. The case concerns the rehabilitation works of the coastline in Poti.The investigation accuses public officials of embezzling several thousand GEL and abusing their position. Several people arrested together with Irakli Kakulia were sentenced to imprisonment, in particular, Zuri Kurua and Levan Chochia were sentenced to 7 years in prison, respectively, and Nikoloz Grigolia - to 2 years.</p><p>As Edisher Karchava, the lawyer of the former mayor of Poti, Irakli Kakulia, told Interpressnews, after a two-year trial, Zugdidi City Court Judge Shota Bichia made an unprecedented decision for court practice</p>",
            "category_id" => $category3->id,
            "image" => "posts/1.jpg"
        ]);

        $tag1 = Tag::create([
            "title" => "politics"
        ]);

        $tag2 = Tag::create([
            "title" => "economics"
        ]);

        $tag3 = Tag::create([
            "title" => "region"
        ]);

        $post1->tags()->attach([$tag1->id, $tag2->id]);
        $post2->tags()->attach([$tag2->id, $tag3->id]);
        $post3->tags()->attach([$tag1->id, $tag3->id]);
        $post4->tags()->attach([$tag3->id, $tag1->id]);
    }
}
