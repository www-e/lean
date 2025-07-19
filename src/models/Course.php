<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model {
    // Eloquent correctly assumes the table is 'courses'.

    // This defines the inverse relationship: A Course belongs to one Category.
    // This will be very useful later.
    public function category() {
        return $this->belongsTo(Category::class);
    }
}