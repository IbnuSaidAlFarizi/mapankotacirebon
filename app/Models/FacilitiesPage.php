<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FacilitiesPage extends Model
{
    use HasFactory;
    protected $table = 'page_facilities';
    protected $fillable = ['title','description'];
}
