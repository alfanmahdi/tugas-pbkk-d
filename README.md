<div align=center>

|    NRP     |         Name         |
| :--------: |    :------------:    |
| 5025221275 | Muhammad Alfan Mahdi |

# Laporan Laravel Project

</div>

### Daftar Perubahan

- Dasar Halaman (Home, Blog, About, Contact)

- Tailwind Style

- Blade Components


### Dasar Halaman (Home, Blog, About, Contact)

Pada dasarnya tampilan web pada project ini mengandung 4 views, antara lain Home, Blog, About, dan Contact. Hasil akhir dari project yang tampak telah diperbarui mengadopsi Blade Component, meski pada awalnya menggunakan HTML biasa.

home.blade.php
```
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Ini adalah halaman Home Page</h3>
</x-layout>
```

blog.blade.php
```
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Welcome to my Blog!</h3>
</x-layout>
```

about.blade.php
```
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Halaman About</h3>
    <p>Nama: {{ $name }}</p>
</x-layout>
```

contact.blade.php
```
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <h3 class="text-xl">Halaman Contact</h3>
</x-layout>
```

### Tailwind Style

Diterapkan styling berasal dari Tailwind yang tersedia. Terdapat beberapa file yang ditambahkan.

navbar.blade.php
```
<nav class="bg-gray-800" x-data="{ isOpen: false }">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-16 items-center justify-between">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <img class="h-8 w-8" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500"
                        alt="Your Company">
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <x-nav-link href="/" :active="request()->is('/')">Home</x-nav-link>
                        <x-nav-link href="/blog" :active="request()->is('blog')">Blog</x-nav-link>
                        <x-nav-link href="/about" :active="request()->is('about')">About</x-nav-link>
                        <x-nav-link href="/contact" :active="request()->is('contact')">Contact</x-nav-link>
                    </div>
                </div>
            </div>
            <div class="hidden md:block">
                <div class="ml-4 flex items-center md:ml-6">

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <button type="button" @click="isOpen = !isOpen"
                                class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                    alt="">
                            </button>
                        </div>

                        <div x-show="isOpen" x-transition:enter="transition ease-out duration-100 transform"
                            x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-75 transform"
                            x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">Your Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">Settings</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-2">Sign out</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="-mr-2 flex md:hidden">
                <!-- Mobile menu button -->
                <button type="button" @click="isOpen = !isOpen"
                    class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>
                    <span class="sr-only">Open main menu</span>
                    <!-- Menu open: "hidden", Menu closed: "block" -->
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <!-- Menu open: "block", Menu closed: "hidden" -->
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div x-show="isOpen" class="md:hidden" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2 sm:px-3">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href="#" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white"
                aria-current="page">Home</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Blog</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">About</a>
            <a href="#"
                class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Contact</a>
        </div>
        <div class="border-t border-gray-700 pb-3 pt-4">
            <div class="flex items-center px-5">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full"
                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="">
                </div>
                <div class="ml-3">
                    <div class="text-base font-medium leading-none text-white">Tom Cook</div>
                    <div class="text-sm font-medium leading-none text-gray-400">tom@example.com</div>
                </div>
                <button type="button"
                    class="relative ml-auto flex-shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                    <span class="absolute -inset-1.5"></span>
                    <span class="sr-only">View notifications</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                    </svg>
                </button>
            </div>
            <div class="mt-3 space-y-1 px-2">
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your
                    Profile</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
                <a href="#"
                    class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign
                    out</a>
            </div>
        </div>
    </div>
</nav>
```

app.css
```
@tailwind base;
@tailwind components;
@tailwind utilities;
```

tailwind.config.js
```
/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme')
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Inter var', ...defaultTheme.fontFamily.sans],
      },
    },
  },
  plugins: [],
}
```

### Blade Component

Penggunaan Blade Component untuk menghindari redundansi, agar lebih efisien dalam pengkodean. Blade Component digunakan dalam beberapa file, salah satunya navbar.blade.php di atas.

nav-link.blade.php
```
<a {{ $attributes }} class="{{ $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }} rounded-md px-3 py-2 text-sm font-medium"
    aria-current="{{ $active ? 'page' : false }}">{{ $slot }}</a>
```

layout.blade.php
```
<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Halaman Home</title>
</head>

<body class="h-full">
    <div class="min-h-full">
        <x-navbar></x-navbar>

        <x-header>{{ $title }}</x-header>

        <main>
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
</body>

</html>
```

header.blade.php
```
<header class="bg-white shadow">
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
    </div>
</header>
```

### Hasil Akhir

Halaman Home:
![Screenshot 2024-09-12 132322](https://github.com/user-attachments/assets/23baa040-1206-4543-bff9-97f4233b1f30)

Halaman Blog:
![Screenshot 2024-09-12 132329](https://github.com/user-attachments/assets/a458bd5e-a6f6-4535-a792-46c851c7d3fc)

Halaman About:
![Screenshot 2024-09-12 132339](https://github.com/user-attachments/assets/47b85931-2870-457f-a6d0-19cc67ae1265)

Halaman Contact:
![Screenshot 2024-09-12 132346](https://github.com/user-attachments/assets/33472fe7-0f5f-4187-b00a-1058ab278ab9)

## Update View Data

Pertama, saya menambahkan data post pertama secara manual di `blog.blade.php` dengan tampilan berikut.

![Post sederhana](<Screenshot 2024-09-26 045119.png>)

Kemudian saya styling untuk mempercantik.

![Styling post](<Screenshot 2024-09-26 045719.png>)

Namun, penerapan di atas masih menggunakan data static yang berada di html, sehingga kemudian saya coba implementasikan supaya data diambil dari array yang dikirim dari Route. Di dalam `web.php`, saya mengubah nama Route yang awalnya blog menjadi posts, dan semua hal yang berkaitan dengannya. Lalu saya tambahkan data berupa array ke dalamnya.

```
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
```

Tidak lupa untuk menggunakan component yang sama untuk Navbar pada versi mobile.
![Component Navbar untuk mobile](<Screenshot 2024-09-26 051137.png>)

Selanjutnya, di `posts.blade.php`, saya coba memanggil data yang telah ditambahkan ke dalam array tadi.

```
@foreach ($posts as $post)
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
            <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        </a>
        <div class="text-base text-gray-500">
            <a href="#">{{ $post['author'] }}</a> | 1 January 2024
        </div>
        <p class="my-4 font-light">{{ Str::limit($post['body'], 150) }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="font-medium text-blue-500 hover:underline">Read more &raquo;</a>
    </article>
@endforeach
```
Berikut tampilan implementasi loop untuk mengambil data dari array.
![Loop post](<Screenshot 2024-09-26 051859.png>)

Sekarang, saya akan menampilkan isi dari suatu post apabila ditekan judul atau Read more. Saya membuat Route baru sebagai wildcard.

```
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
```
Sebelumnya saya menggunakan id untuk mencocokkan id dari suatu post yang ditekan. Namun yang paling terbaru, saya gunakan slug. Tidak lupa untuk membuat view baru yaitu `post.blade.php`.
```
<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <article class="py-8 max-w-screen-md">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-500">
            <a href="#">{{ $post['author'] }}</a> | 1 January 2024
        </div>
        <p class="my-4 font-light">{{ $post['body'] }}</p>
        <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts</a>
    </article>

</x-layout>
```
Berikut tampilan terbaru.
![Slug](<Screenshot 2024-09-26 054153.png>)

## Update Model

### Membuat Class Post

```
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
}
```

Dengan membuat Class Post di web.php, halaman Post maupun Posts dapat mengambil data dari Class, alih-alih membuat array satu persatu di setiap Route. Implementasi di Route berubah menjadi berikut.

```
Route::get('/posts', function () {
    return view('posts', ['title' => 'Blog', 'posts' => Post::all()]);
});

Route::get('/posts/{slug}', function($slug) {

    $post = Arr::first(Post::all(), function($post) use ($slug) {
        return $post['slug'] == $slug;
    });

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
```
**Note: Post::all()**

Lalu saya pindahkan class Post ke dalam file Post.php di folder Models seperti berikut.

```
<?php

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
}
```

Namun class Post ini masih belum bisa diakses oleh Route. Sehingga perlu dibuat namespace agar Laravel tahu bahwa Post berada di folder App\Models.

```
namespace App\Models;
```

dan di Route (web.php) namespace tadi perlu dipanggil.

```
use App\Models\Post;
```

Lalu fungsi untuk mencari post mana yang dicari juga dipindahkan ke dalam Post.php dari web.php. Karena tugas pencarian atau perubahan data adalah tugas dari Model, bukan Route (Controller).

```
public static function find($slug) {
    return Arr::first(static::all(), function($post) use ($slug) {
       return $post['slug'] == $slug;
    });
}
```

dan di web.php dilakukan perubahan berikut.

```
Route::get('/posts/{slug}', function($slug) {

    $post = Post::find($slug);

    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
```

Apabila tidak ingin menggunakan use di function find, bisa menggunakan arrow function.

```
public static function find($slug) {
    return Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
}
```

Sekarang menampilkan page 404 apabila user mencoba membuka post yang tidak ada.

```
public static function find($slug) {
    $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

    if(! $post) {
        abort(404);
    }

    return $post;
}
```

![Post tidak ada](<Screenshot 2024-09-30 141431.png>)

## Update Database & Migration

Di file `.env` terdapat beberapa line yang perlu diperhatikan.

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:y+et4Wf8YcdJPBQtife+kLU3lnjmT0WPjkddb7Mi5yU=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost
```

Pada bagian ini environment dapat diubah menjadi local/development atau production.

```
DB_CONNECTION=sqlite
```

Default dari database yang digunakan adalah sqlite. Dapat digunakan TablePlus untuk dapat menampilkan database yang digunakan. Pertama perlu menambahkan koneksi ke TablePlus, memilih jenis db SQLite, lalu pilih file database.sqlite di dalam folder project laravel11. Untuk memindahkan tabel yang ada di dalam project Laravel ke TablePlus, perlu dilakukan migrasi. Berikut command-nya.

```
php artisan migrate
```

Sekarang mencoba membuat file migrasi baru berupa posts dengan command berikut.

```
php artisan make:migration create_posts_table
```

Lalu isikan di dalamnya atribut untuk tabel posts.

```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('author');
            $table->string('slug')->unique();
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
```

Lalu jalankan command berikut untuk me-migrasi ulang semua table.

```
php artisan migrate:fresh
```

## Update Eloquent ORM & Post Model

Untuk menggunakan model dari laravel, dapat langsung `extends Model` di file `Post.php`. Di dalam model, sudah terdapat method `all` dan `find`, sehingga dari versi sebelumnya, dapat dihapus. Apabila nama tabel di database bukan posts, maka dapat ditambahkan `protected $table = 'blog_posts';` untuk memberitahu bahwa tabel yang digunakan bernama blog_posts. Begitu pula apabila primary key bukan kolom id, dapat ditambahkan `protected $primaryKey = 'post_id'` untuk diidentifikasi sebagai primary key dari tabel tersebut.

```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
}
```

### Route Model Binding

Pada `web.php`, coba mengambil satu buah post, dengan menggunakan instance dari post dengan tipe data Post, sehingga tidak diperlukan melakukan pencarian secara manual. Jika ingin menggunakan slug, tinggal menambahkan ketika mencar dengan `:slug`.

```
Route::get('/posts/{post:slug}', function(Post $post) {
    return view('post', ['title' => 'Single Post', 'post' => $post]);
});
```

### Menambahkan data menggunakan Tinker

```
php artisan tinker
```

Karena menggunakan Eloquent ORM, insert data ke Model, lalu dari Model diinsert ke dalam tabel. Sehingga panggil Model terlebih dahulu.

```
App\Models\Post::create([
    'title' => 'Judul Artikel 1',
    'author' => 'Sandhika Galih',
    'slug' => 'judul-artikel-1',
    'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde commodi consectetur iure. Consequatur quam, exercitationem, possimus sunt nam corrupti laboriosam in dolore inventore, commodi magnam totam amet reprehenderit! Qui, impedit.'
]);
```

Dipastikan ketika menjalankan command di atas akan error. Perlu menambahkan line `protected $fillable = ['title', 'author', 'slug', 'body'];` ke dalam model.

![insert data to model](<Screenshot 2024-10-11 141630.png>)

Agar tampilan tanggal pada blog dapat lebih fleksibel, dapat mengubah line di dalam `post.blade.php` dan `posts.blade.php` menjadi berikut.

```
<a href="#">{{ $post['author'] }}</a> | {{ $post->created_at->diffForHumans() }}
```

![update tanggal](<Screenshot 2024-10-11 142312.png>)

Dengan Eloquent dapat menggunakan beberapa command dengan fungsinya.
`App\Models\Post::all()` menampilkan semua data.
`$posts = App\Models\Post::all()` memasukkan ke dalam variabel.
`$posts->first()` menampilkan data pertama.
`$posts->last()` menampilkan data pertama.
`$posts->find(4)` menampilkan data dengan id 4.
`$post = $posts->find(4)` dan `$post->delete()` menampilkan data dengan id 4.

### Membuat file model dengan Laravel

```
php artisan make:model Post -m
```

Command di atas membuat model dengan nama Post dan migrasi dengan nama menyesuaikan nama model.

## Update Model Factories

Factories adalah fitur eloquent yang dapat membuat data dummy secara otomatis dan dengan jumlah yang banyak. Pertama saya membuat file factory agar dapat generate data untuk tabel post.

```
php artisan make:factory PostFactory
```

Lalu mengedit pada file PostFactory yang telah dibuat, dengan menambahkan field apa saja yang perlu dirandom.

```
<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(),
            'author' => fake()->name(),
            'slug' => Str::slug(fake()->sentence()),
            'body' => fake()->text()
        ];
    }
}
```

Agar nama yang digenerate berupa nama orang indonesia, pada file `.env` dapat mengubah `APP_FAKER_LOCALE=en_US` menjadi `APP_FAKER_LOCALE=id_ID`. Apabila sudah, dapat dicoba untuk digenerate dengan command `php artisan tinker` lalu

```
App\Models\Post::factory(200)->create()
```

![run factory 200 data dummy](<Screenshot 2024-10-11 163133.png>)

## Update Eloquent Relationship

Menghubungkan antar dua tabel memiliki hubungan seperti one to many atau many to many melalui eloquent.

Pada file migrasi create_post_table.php, cukup mengubah line terkait author, karena akan diambil dari tabel author.

```
$table->string('author');
```

menjadi

```
$table->foreignId('author_id')->constrained(
        table: 'users',
        indexName: 'posts_author_id'
);
```

Tidak lupa pada `PostFactory.php`, line `'author' => fake()->name()` diubah menjadi `'author_id' => User::Factory()` serta import class-nya.

Lalu untuk menjalankan php artisan tinker, agar bisa generate 100 post namun hanya dengan 5 user/author, dijalankan command berikut.

```
App\Models\Post::factory(100)->recycle(Use::factory(5)->create())->create();
```

Kemudian mengatur hubungan antar tabel. Di `Post.php` ditambahkan

```
public function author(): BelongsTo
{
    return $this->belongsTo(User::class);
}
```

dan di `User.php` ditambahkan

```
public function posts(): HasMany
{
    return $this->hasMany(Post::class, 'author_id');
}
```

tidak lupa untuk import class masing-masing HasMany dan BelongsTo. Kemudian saya perbaiki UI di blade post dan posts.

post
```
<a href="/authors/{{ $post->author->id }}">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }}
```

posts
```
<a href="/authors/{{ $post->author->id }}" class="hover:underline">{{ $post->author->name }}</a> | {{ $post->created_at->diffForHumans() }}
```

dan menambahkan Route baru di `web.php` untuk halaman articles by author.

```
Route::get('/authors/{user}', function(User $user) {
    return view('posts', ['title' => 'Articles by ' . $user->name, 'posts' => $user->posts]);
});
```

![100 post 5 author](<Screenshot 2024-10-14 110720.png>)
![articles by author](<Screenshot 2024-10-14 110732.png>)

## Update Post Category

Membuat model Category beserta migrasi dan factory.

```
php artisan make:model Category -mf
```

Mengisi migrasi category
```
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
```

Menambahkan category_id sebagai foreign key di migrasi post
```
$table->foreignId('category_id')->constrained(
        table: 'categories',
        indexName: 'posts_category_id'
);
```

Mengisi model category
```
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
}
```

Di model post menambahkan relasi antar model post dan category
```
public function category(): BelongsTo
{
    return $this->belongsTo(Category::class);
}
```

Mengisi factory category
```
<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence(rand(1, 2), false),
            'slug' => Str::slug(fake()->sentence(rand(1, 2), false))
        ];
    }
}
```

Menambahkan category_id di factory post
```
'category_id' => Category::factory(),
```

Sekarang menjalankan migrasi dan menjalankan factory.

Migrasi
```
php artisan migrate:fresh
```

Apabila tidak bisa menjalankan factory
```
composer dumpautoload
```

Lalu
```
php artisan optimize:clear
```

Saat `php artisan tinker`, dijalankan 3 factory sekaligus
```
App\Models\Post::factory(100)->recycle([Category::factory(3)->create(), User::factory(5)->create()])->create();
```

Agar dapat ditampilkan pada web, perlu mengedit post dan posts pada blade di bagian div mulai dari mengarahkan ke route baru.

```
<div">
    By
    <a href="/authors/{{ $post->author->username }}"
        class="hover:underline text-base text-gray-500">{{ $post->author->name }}</a>
    in
    <a href="/categories/{{ $post->category->slug }}" class="hover:underline text-base text-gray-500">{{ $post->category->name }}</a> |
    {{ $post->created_at->diffForHumans() }}
</div>
```

Membuat route baru
```
Route::get('/categories/{category:slug}', function(Category $category) {
    return view('posts', ['title' => 'Articles in: ' . $category->name, 'posts' => $category->posts]);
});
```

![route blog](<Screenshot 2024-10-14 210319.png>) 
![route authors](<Screenshot 2024-10-14 210331.png>)
![route categories](<Screenshot 2024-10-14 210343.png>)
![route single post](<Screenshot 2024-10-14 210401.png>)

## Update Database Seeder

Fitur database seeder di Laravel 11, memudahkan pengisian data dummy secara otomatis ke dalam database. Dengan seeder, dapat dilakukan migrasi dan pengisian data dalam satu langkah, serta menggabungkannya dengan factory untuk efisiensi yang lebih baik.

DatabaseSeeder.php
```
$this->call([CategorySeeder::class, UserSeeder::class]);
Post::factory(100)->recycle([
    Category::all(),
    User::all()
])->create();
```

CategorySeeder.php
```
Category::create([
    'name' => 'Web Design',
    'slug' => 'web-design'
]);
...
```

UserSeeder.php
```
User::create([
    'name' => 'Sandhika Galih',
    'username' => 'sandhikagalih',
    'email' => 'sandhikagalih@gmail.com',
    'email_verified_at' => now(),
    'password' => Hash::make('password'),
    'remember_token' => Str::random(10)
]);

User::factory(5)->create();
```