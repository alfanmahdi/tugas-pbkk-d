<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post {
    public static function all() {
        return [
            [
                'id' => 1,
                'slug' => 'judul-artikel-1',
                'title' => 'Judul Artikel 1',
                'author' => 'Muhammad Alfan Mahdi',
                'body' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim sunt in adipisci velitcum, nam repudiandae. Quas amet expedita nisi voluptates soluta quo blanditiis maiores? Dignissimos aut ipsa eveniet! Fuga!'
            ],
            [
                'id' => 2,
                'slug' => 'judul-artikel-2',
                'title' => 'Judul Artikel 2',
                'author' => 'Muhammad Alfan Mahdi',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, rem eius? Saepe hic voluptatibus asperiores voluptate libero tenetur. Laborum error dignissimos nostrum nobis porro itaque non rem fugiat? Quasi, neque!'
            ]
        ];
    }

    public static function find($slug) {
        $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if(! $post) {
            abort(404);
        }

        return $post;
    }
}
