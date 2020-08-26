<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $table = 'locacoes';

    protected $fillable = [
        'data_locacao', 'data_devolucao', 'cliente_id', 'filme_id'
    ];

    public function rules()
    {
        return [
            'data_locacao' => 'required|date',
            'data_devolucao' => 'date',
            'cliente_id' => 'required',
            'filme_id' => 'required',
        ];
    }
}
