<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gradebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }


    public function scopeSearchByName($query, $name = '')
    {
        if ($name) {
            $query->where('name', 'like', "%$name%");
        }
        return $query;
    }


    public function updateUserOnStudents()
    {
    $this->students()->update(['user_id' => $this->user_id]);
    }
}
