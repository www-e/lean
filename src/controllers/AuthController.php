<?php

use App\Core\Auth;
use App\Models\User;

class AuthController
{
    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        $pageTitle = 'Register';
        require '../src/views/pages/register.php';
    }

    /**
     * Handle the registration form submission.
     */
    public function register()
    {
        // --- VALIDATION ---
        // We'll collect all errors in an array.
        $errors = [];
        if (empty($_POST['name'])) {
            $errors['name'] = 'Name is required.';
        }
        if (empty($_POST['username'])) {
            $errors['username'] = 'Username is required.';
        } elseif (User::where('username', $_POST['username'])->exists()) {
            $errors['username'] = 'This username is already taken.';
        }
        if (empty($_POST['email'])) {
            $errors['email'] = 'Email is required.';
        } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address.';
        } elseif (User::where('email', $_POST['email'])->exists()) {
            $errors['email'] = 'This email is already registered.';
        }
        if (empty($_POST['password'])) {
            $errors['password'] = 'Password is required.';
        } elseif (strlen($_POST['password']) < 8) {
            $errors['password'] = 'Password must be at least 8 characters long.';
        }

        // If there are validation errors, re-render the form with errors
        if (!empty($errors)) {
            $pageTitle = 'Register';
            // These variables will be available in the view
            $old_input = $_POST;
            require '../src/views/pages/register.php';
            return; // Stop execution
        }
        
        // --- CREATION ---
        // If validation passes, create the user.
        $user = User::create([
            'name' => trim($_POST['name']),
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'phone_number' => trim($_POST['phone_number']),
            // IMPORTANT: We hash the password for security!
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        ]);

        // --- LOGIN & REDIRECT ---
        // Log the new user in automatically.
        Auth::login($user);

        // Redirect to the homepage.
        header('Location: /');
        exit();
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        $pageTitle = 'Login';
        require '../src/views/pages/login.php';
    }

    /**
     * Handle the login form submission.
     */
    public function login()
    {
        $errors = [];

        // Find the user by their username
        $user = User::where('username', $_POST['username'])->first();

        // Check if user exists and if the password is correct
        if ($user && password_verify($_POST['password'], $user->password)) {
            // Password is correct! Log them in.
            Auth::login($user);
            header('Location: /');
            exit();
        }

        // If we're here, login failed.
        $errors['credentials'] = 'Invalid username or password.';
        $pageTitle = 'Login';
        $old_input = $_POST;
        require '../src/views/pages/login.php';
    }

    /**
     * Log the user out and redirect.
     */
    public function logout()
    {
        Auth::logout();
        header('Location: /');
        exit();
    }
}