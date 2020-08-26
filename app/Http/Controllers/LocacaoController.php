<?php

namespace App\Http\Controllers;

use App\Locacao;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    protected $model;

    public function __construct(Locacao $locacoes, Request $request)
    {
        $this->model = $locacoes;
        $this->request = $request;
    }
}
