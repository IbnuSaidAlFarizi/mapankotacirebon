<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPage extends Model
{
    use HasFactory;
    protected $table = 'page_teams';
    protected $fillable = ['title','description'];
}
