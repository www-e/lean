<?php

// (c) 2024 Your Academy Name
// Home Page Controller

class HomeController {
    public function index() {
        // Business logic goes here. For now, we're just setting a title.
        $pageTitle = "Welcome to the Academy";

        // This is how we load a view. We'll create a helper function for this later.
        // For now, we just require the file directly.
        require '../src/views/pages/home.php';
    }
}