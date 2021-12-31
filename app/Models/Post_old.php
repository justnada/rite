<?php

namespace App\Models;

class Post
{
   private static $blogPost = [
    [
        "title" => "Judul Post 1",
        "slug" => "judul-post-1",
        "author" => "Penulis",
        "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod minima aperiam ullam voluptatum corporis id ad 
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex."
    ],
    [
        "title" => "Judul Post 2",
        "slug" => "judul-post-2",
        "author" => "Nada",
        "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod minima aperiam ullam voluptatum corporis id ad 
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex.
        voluptates omnis dolore accusantium at repellat rerum quisquam, ipsam impedit unde maxime tempora ex."
    ]
    ];

    public static function all() {
        return collect(self::$blogPost);
    }

    public static function find($slug) {
        $posts = static::all();

        return $posts->firstWhere('slug', $slug);
    }
}
