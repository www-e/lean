<?php

use App\Models\Admin;

class AuthController
{
    public function showLoginForm()
    {
        require __DIR__ . '/../../views/auth/login.php';
    }

public function login()
{
    $errors = [];
    $user = Admin::where('username', $_POST['username'])->first();

    if ($user && password_verify($_POST['password'], $user->password)) {
        $_SESSION['admin_id'] = $user->id;
        session_regenerate_id(true);
        header('Location: /dashboard'); // Redirect to dashboard after login
        exit();
    }

    $errors['credentials'] = 'Invalid username or password.';
    require __DIR__ . '/../../views/auth/login.php';
}

    public function logout()
    {
        unset($_SESSION['admin_id']);
        session_regenerate_id(true);
        header('Location: /admin/login');
        exit();
    }
}
