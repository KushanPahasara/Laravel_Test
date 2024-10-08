<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'issue_id',
        'body',
    ];

    public function issue()
    {
        return $this->belongsTo(Issues::class);
    }
    
    public $timestamps = false; 
}
