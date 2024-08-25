<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'description',
    ];

    public function subcategories()
    {
        return $this->hasMany(Subcategories::class);
    }

    public function issues()
    {
        return $this->belongsToMany(Issues::class, 'issue_categories');
    }

    public $timestamps = false; 
}
