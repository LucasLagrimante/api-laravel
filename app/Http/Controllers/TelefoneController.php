<?php

namespace App\Http\Controllers;

use App\Telefone;
use Illuminate\Http\Request;

class TelefoneController extends Controller
{
    protected $model;

    public function __construct(Telefone $telefones, Request $request)
    {
        $this->model = $telefones;
        $this->request = $request;
    }

    public function cliente($id)
    {
        $data = $this->model->with('cliente')->find($id);
        if (!$data) {
            return response()->json(['error' => 'Nenhum cliente encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }
}
