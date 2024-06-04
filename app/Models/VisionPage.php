<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisionPage extends Model
{
    use HasFactory;
    protected $table = 'vision_pages';
    protected  $fillable=['title','description'];
}
