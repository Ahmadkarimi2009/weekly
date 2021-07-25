<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function index() {
        $response = Http::get('https://ipsocontainer.org/wp-json/wp/v2/posts');
        dd($response->json());
    }
}
