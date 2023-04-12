<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'image_url',
        'gradebook_id',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function gradebook() {
        return $this->belongsTo(Gradebook::class);
    }
    
}
