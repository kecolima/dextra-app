<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lanche extends Model
{
    use HasFactory;
    protected $fillable = ['nome','id_promocao','id_ingredientes','valor'];
}
