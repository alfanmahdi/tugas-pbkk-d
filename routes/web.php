<?php

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/about', function () {
    return view('about', ['name' => 'Sandhika Galih', 'title' => 'About']);
});

Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => [
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
    ]]);
});

Route::get('/posts/{slug}', function($slug) {
    $posts = [
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

    $post = Arr::first($posts, function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact']);
});
