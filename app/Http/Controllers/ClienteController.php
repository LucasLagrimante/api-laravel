<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Telefone;

class ClienteController extends Controller
{
    protected $model;
    protected $path = 'clientes';
    protected $upload = 'image';
    protected $width = 177;
    protected $height = 236;

    public function __construct(Cliente $clientes, Request $request)
    {
        $this->model = $clientes;
        $this->request = $request;
    }

    // public function index()
    // {
    //     $data = $this->model->paginate(20);
    //     return response()->json($data);
    // }

    public function telefones($id)
    {
        $data = $this->model->with('telefones')->find($id);
        if (!$data) {
            return response()->json(['error' => 'Nenhum telefone encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }
    public function alugados($id)
    {
        $data = $this->model->with('alugados')->find($id);
        if (!$data) {
            return response()->json(['error' => 'Nenhum telefone encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }
}
