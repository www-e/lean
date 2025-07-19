<?php

use App\Models\Course;

class CourseController
{
    /**
     * Display a specific course by its slug.
     */
    public function show($slug)
    {
        try {
            // Eager load the lessons relationship to prevent N+1 query problems.
            // Find the course by its slug. If not found, it will throw an exception.
            $course = Course::with('lessons')->where('slug', $slug)->firstOrFail();

            // Now that we have the lessons, we can group them by the 'chapter' attribute.
            // The result will be a Collection of Collections, e.g., ['Chapter 1' => [lesson1, lesson2], ... ]
            $chapters = $course->lessons->groupBy('chapter');

            $pageTitle = $course->title;

            // Load the view and pass both the course and the grouped chapters data to it.
            require '../src/views/pages/course-detail.php';

        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // If firstOrFail() fails, it throws this specific exception.
            http_response_code(404);
            require '../src/views/pages/404.php';
        }
    }
}