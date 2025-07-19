<!DOCTYPE html>
<html lang="en" class="">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? htmlspecialchars($pageTitle) : 'My Academy'; ?></title>
    <link rel="stylesheet" href="/assets/css/main.css">
</head>

<body class="bg-base-100 text-text-main dark:bg-base-900 dark:text-text-invert transition-colors duration-300">
    <header class="bg-base-200 dark:bg-base-800 shadow sticky top-0">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-primary dark:text-primary-hover">Your Academy</a>

            <div class="flex items-center space-x-4">
                <!-- Theme Toggle Button -->
                <button id="theme-toggle" type="button" class="text-secondary hover:bg-base-300 dark:hover:bg-gray-700 focus:outline-none rounded-lg text-sm p-2.5">
                    <svg id="theme-toggle-dark-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="w-5 h-5 hidden" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <?php

                use App\Core\Auth; ?>
                <?php if (Auth::check()): ?>
                    <span class="text-text-muted">Welcome, <?= htmlspecialchars(Auth::user()->name) ?>!</span>
                    <a href="/logout" class="bg-secondary text-white font-bold py-2 px-4 rounded-lg hover:bg-opacity-80 transition-colors">Logout</a>
                <?php else: ?>
                    <a href="/login" class="text-primary font-semibold hover:underline">Login</a>
                    <a href="/register" class="bg-primary text-white font-bold py-2 px-4 rounded-lg hover:bg-primary-hover transition-colors">Register</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
    <main class="container mx-auto px-6 py-8">