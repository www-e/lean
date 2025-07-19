<?php require '../src/views/partials/header.php'; ?>

<div class="max-w-md mx-auto bg-base-200 dark:bg-base-800 rounded-lg shadow-lg p-8">
    <h1 class="text-3xl font-bold text-center mb-6">Welcome Back</h1>

    <!-- Generic error for invalid credentials -->
    <?php if (isset($errors['credentials'])): ?>
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg relative mb-4" role="alert">
            <span class="block sm:inline"><?= $errors['credentials'] ?></span>
        </div>
    <?php endif; ?>

    <form action="/login" method="POST">
        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block text-text-muted mb-2">Username</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($old_input['username'] ?? '') ?>" required class="w-full px-4 py-2 bg-base-100 dark:bg-base-900 border border-base-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-text-muted mb-2">Password</label>
            <input type="password" id="password" name="password" required class="w-full px-4 py-2 bg-base-100 dark:bg-base-900 border border-base-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
        </div>

        <button type="submit" class="w-full bg-primary text-white font-bold py-3 px-4 rounded-lg hover:bg-primary-hover transition-colors">
            Log In
        </button>
    </form>

    <p class="text-center text-secondary mt-6">
        Don't have an account? <a href="/register" class="text-primary hover:underline">Sign Up</a>
    </p>
</div>

<?php require '../src/views/partials/footer.php'; ?>