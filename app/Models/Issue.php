<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    use HasFactory;

    protected $table = 'issues';

    protected $fillable = [
        'author_name',
        'author_yomi',
        'author_gender',
        'author_profile',
        'author_interpretation_name',
        'author_interpretation_profile',
        'script_text',
        'script_yomi',
        'classification',
        'anthology',
        'theme',
        'meaning',
        'interpretation'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'script_text' => 'array',
        'script_yomi' => 'array',
    ];
}
