<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'section1_title',
        'section1_sub_title',
        'section1_photo',
        'section1_url',
        'section2_photo',
        'section2_list1',
        'section2_list1_val',
        'section2_list2',
        'section2_list2_val',
        'section2_list3',
        'section2_list3_val',
        'section3_title',
        'section3_sub_title',
        'section3_photo',
        'section3_vid1',
        'section3_vid2',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'section1_title' => 'string',
        'section1_sub_title' => 'string',
        'section1_photo' => 'string',
        'section1_url' => 'string',
        'section2_photo' => 'string',
        'section2_list1' => 'string',
        'section2_list1_val' => 'string',
        'section2_list2' => 'string',
        'section2_list2_val' => 'string',
        'section2_list3' => 'string',
        'section2_list3_val' => 'string',
        'section3_title' => 'string',
        'section3_sub_title' => 'string',
        'section3_photo' => 'string',
        'section3_vid1' => 'string',
        'section3_vid2' => 'string',
    ];
}
