<?php

namespace App\Models; // We should start using namespaces for good organization

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    // By default, Eloquent assumes the table name is the plural of the class name ('categories').
    // This is perfect for us, so we don't need to specify anything else.
    
    // This defines the one-to-many relationship: One Category can have many Courses.
    public function courses() {
        return $this->hasMany(Course::class);
    }
}