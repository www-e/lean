<?php

namespace App\Core;

use App\Models\User;

class Auth
{
    /**
     * Check if a user is currently logged in.
     */
    public static function check(): bool
    {
        return isset($_SESSION['user_id']);
    }

    /**
     * Get the currently authenticated user.
     * Returns the User model instance or null if not logged in.
     */
    public static function user(): ?User
    {
        if (!static::check()) {
            return null;
        }

        // To avoid hitting the database on every page load, we could cache this.
        // For now, this is simple and effective.
        return User::find($_SESSION['user_id']);
    }

    /**
     * Log a user in by setting their session.
     */
    public static function login(User $user): void
    {
        $_SESSION['user_id'] = $user->id;
        session_regenerate_id(true); // Security: Regenerate session ID on login
    }

    /**
     * Log the user out.
     */
    public static function logout(): void
    {
        unset($_SESSION['user_id']);
        session_regenerate_id(true); // Security: Regenerate on logout too
    }
}