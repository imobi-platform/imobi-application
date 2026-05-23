<?php

namespace App\Models\Corretor;

use App\Models\Auth\User;
use App\Models\Pessoa\Pessoa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Corretor extends Model
{
    use HasFactory;

    protected $table = 'corretores';

    protected $fillable = [
        'pessoa_id',
        'nome_profissional',
        'pessoa_id',
        'biografia',
        'avatar_url',
        'status',
    ];

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class);
    }
}
