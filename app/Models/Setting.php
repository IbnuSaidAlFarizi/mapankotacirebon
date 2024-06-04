<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    // Menentukan tabel yang digunakan oleh model ini
    protected $table = 'settings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'app_name',
        'app_name2',
        'app_name3',
        'open_weekday',
        'open_weekend',
        'logo',
        'email',
        'phone',
        'color',
        'youtube',
        'facebook',
        'instagram',
        'copyright',
        'address',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'app_name' => 'string',
        'app_name2' => 'string',
        'app_name3' => 'string',
        'open_weekday' => 'string',
        'open_weekend' => 'string',
        'logo' => 'string',
        'email' => 'string',
        'phone' => 'string', 
        'youtube' => 'string',
        'facebook' => 'string',
        'instagram' => 'string',
        'copyright' => 'string',
        'address' => 'string',
    ];
}
