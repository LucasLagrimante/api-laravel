<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $data = $this->model->all();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        if (isset($this->upload) && $request->hasFile($this->upload) && $request->file($this->upload)->isValid()) {
            $extension = $request->file($this->upload)->extension();

            $name = uniqid(date('His'));
            $nameFile = "{$name}.{$extension}";

            $upload = Image::make($dataForm[$this->upload])
                ->resize($this->width, $this->height)
                ->save(storage_path("app/public/$this->path/$nameFile", 70));

            if (!$upload) {
                return response()->json(['error' => 'Falha ao fazer upload!'], 500);
            } else {
                $dataForm[$this->upload] = $nameFile;
            }
        }

        $data = $this->model->create($dataForm);

        return response()->json($data, 201);
    }

    public function show($id)
    {
        if (!$data = $this->model->find($id)) {
            return response()->json(['error' => 'Nenhum cliente encontrado!'], 404);
        } else {
            return response()->json($data);
        }
    }

    public function update(Request $request, $id)
    {

        $data = $this->model->find($id);

        if (!$data)
            return response()->json(['error' => 'Nenhum cliente encontrado!'], 404);

        $this->validate($request, $this->model->rules());

        $dataForm = $request->all();

        if (isset($this->upload) && $request->hasFile($this->upload) && $request->file($this->upload)->isValid()) {
            $arquivo = $this->model->arquivo($id);

            if ($data->image) {
                Storage::disk('public')->delete("$this->path/$arquivo");
            }

            $extension = $request->file($this->upload)->extension();

            $name = uniqid(date('His'));
            $nameFile = "{$name}.{$extension}";

            $upload = Image::make($dataForm[$this->upload])
                ->resize($this->width, $this->height)
                ->save(storage_path("app/public/$this->path/$nameFile", 70));

            if (!$upload) {
                return response()->json(['error' => 'Falha ao fazer upload!'], 500);
            } else {
                $dataForm[$this->upload] = $nameFile;
            }
        }

        $data->update($dataForm);

        return response()->json($data, 201);
    }

    public function destroy($id)
    {
        $data = $this->model->find($id);
        if ($data) {
            if (method_exists($this->model, 'arquivo')) {
                $arquivo = $this->model->arquivo($id);
                Storage::disk('public')->delete("$this->path/$arquivo");
            }

            $data->delete();
            return response()->json(['success' => 'Deletado com sucesso!']);
        } else {
            return response()->json(['error' => 'Não encontrado!'], 404);
        }
    }
}
