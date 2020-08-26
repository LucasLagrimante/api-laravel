<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cliente;

class Telefone extends Model
{
    protected $fillable = [
        'numero', 'cliente_id'
    ];

    public function rules()
    {
        return [
            'numero' => 'required',
            'cliente_id' => 'required'
        ];
    }

    public function cliente($id)
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }
}
