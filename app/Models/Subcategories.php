<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategories extends Model
{
    use HasFactory;
    protected $table = 'subcategories';

    protected $fillable = [
        'category_id',
        'name',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function issues()
    {
        return $this->belongsToMany(Issue::class, 'issue_subcategories');
    }

    public $timestamps = false; 
}
