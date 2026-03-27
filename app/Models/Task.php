<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // pour pouvoir generer les donner fictif
    use HasFactory;

    protected $fillable = [
        'title',
        'status',
        'id_user'
    ];

   //index select la liste des taches
    
}



