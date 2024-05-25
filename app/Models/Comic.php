<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    // colonne autorizzate per il mass assignment
    protected $fillable = ['title', 'description', 'thumb', 'price', 'series', 'sale_date', 'type']; 

}
