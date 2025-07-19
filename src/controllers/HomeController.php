<?php

// We must 'use' the models we need at the top of the file.
use App\Models\Course;

class HomeController {
    public function index() {
        // Business logic: get all courses from the database using our Eloquent model.
        $courses = Course::all(); // This one line replaces all our previous query builder logic!
        
        $pageTitle = "Welcome to the Academy";

        // Now we load the view and pass the $courses data to it.
        require '../src/views/pages/home.php';
    }
}