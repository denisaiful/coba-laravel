<?php

namespace App\Models;


class Post
{
    private static $blog_posts =  [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "Author" => "Deni",
            "body" => "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis fuga, recusandae illo adipisci iure hic cumque in veritatis rem amet officia optio ab sed consequatur natus eaque quos doloribus.</p>"

        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "Author" => "Saiful",
            "body" => "
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis fuga, recusandae illo adipisci iure hic cumque in veritatis rem amet officia optio ab sed consequatur natus eaque quos doloribus.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis fuga, recusandae illo adipisci iure hic cumque in veritatis rem amet officia optio ab sed consequatur natus eaque quos doloribus.</p>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur perspiciatis fuga, recusandae illo adipisci iure hic cumque in veritatis rem amet officia optio ab sed consequatur natus eaque quos doloribus.</p>"
        ],
    ];

    public static function all()
    {
        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];

        // foreach ($posts as $p) {
        //     if ($p["slug"] === $slug) {
        //         $post = $p;
        //     }
        // }

        return $posts->firstWhere('slug', $slug);
    }
}
