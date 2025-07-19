<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    // Eloquent will correctly assume the table name is 'lessons'.

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'course_id',
        'chapter',
        'title',
        'content_type',
        'content_url',
        'sort_order',
    ];

    /**
     * Define the inverse of the relationship: a Lesson belongs to a Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}