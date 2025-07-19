<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    // ... existing category() method is here ...
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // --- ADD THIS NEW METHOD ---
    /**
     * Define the one-to-many relationship: a Course has many Lessons.
     */
    public function lessons()
    {
        return $this->hasMany(Lesson::class)->orderBy('sort_order', 'asc');
    }
}