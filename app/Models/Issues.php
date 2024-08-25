<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'uuid', 'slug'];

    public function comments()
    {
        return $this->hasMany(Comments::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Categories::class, 'issue_categories');
    }

    public function subcategories()
    {
        return $this->belongsToMany(Subcategories::class, 'issue_subcategories');
    }

}
