<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Telefone;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'image', 'cpf_cnpj',
    ];

    public function rules()
    {
        return [
            'nome' => 'required',
            'imagem' => 'image',
            'cpf_cnpj' => 'required'
        ];
    }

    public function arquivo($id)
    {
        $data = $this->find($id);
        return $data->image;
    }

    public function telefones()
    {
        return $this->hasMany(Telefone::class, 'cliente_id', 'id');
    }

    public function alugados()
    {
        return $this->belongsToMany(Filme::class, 'locacoes');
    }
}
