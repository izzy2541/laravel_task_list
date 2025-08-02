<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Task extends Model
{
    use HasFactory;

    //fillable is more secure.
    protected $fillable = ['title', 'description', 'long_description'];
    // protected $guarded = ['secret'];
}
