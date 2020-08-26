<?php

namespace App\Http\Controllers;

use App\Filme;
use Illuminate\Http\Request;

class FilmeController extends Controller
{
    protected $model;
    protected $path = 'filmes';
    protected $upload = 'capa';
    protected $width = 800;
    protected $height = 533;

    public function __construct(Filme $filmes, Request $request)
    {
        $this->model = $filmes;
        $this->request = $request;
    }
}
