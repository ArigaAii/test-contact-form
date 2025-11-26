<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_sei',
        'name_mei',
        'gender',
        'email',
        'tel1',
        'tel2',
        'tel3',
        'address',
        'building_name',
        'category_id',
        'content',
    ];

    public function category()
    {
        return $this->belongsTo(category::class);
    }
}
