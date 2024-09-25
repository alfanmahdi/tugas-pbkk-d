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

![Post sederhana](<Screenshot 2024-09-26 045119-1.png>)

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
![Slug](<Screenshot 2024-09-26 054153-1.png>)
