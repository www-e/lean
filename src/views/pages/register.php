<?php require '../src/views/partials/header.php'; ?>

<div class="max-w-md mx-auto bg-base-200 dark:bg-base-800 rounded-lg shadow-lg p-8">
    <h1 class="text-3xl font-bold text-center mb-6">Create Your Account</h1>
    
    <form action="/register" method="POST">
        <!-- Name -->
        <div class="mb-4">
            <label for="name" class="block text-text-muted mb-2">Full Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($old_input['name'] ?? '') ?>" class="w-full px-4 py-2 bg-base-100 dark:bg-base-900 border border-base-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            <?php if (isset($errors['name'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['name'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Username -->
        <div class="mb-4">
            <label for="username" class="block text-text-muted mb-2">Username</label>
            <input type="text" id="username" name="username" value="<?= htmlspecialchars($old_input['username'] ?? '') ?>" class="w-full px-4 py-2 bg-base-100 dark:bg-base-900 border border-base-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            <?php if (isset($errors['username'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['username'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="block text-text-muted mb-2">Email Address</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($old_input['email'] ?? '') ?>" class="w-full px-4 py-2 bg-base-100 dark:bg-base-900 border border-base-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            <?php if (isset($errors['email'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['email'] ?></p>
            <?php endif; ?>
        </div>

        <!-- Phone Number (Optional) -->
        <div class="mb-4">
            <label for="phone_number" class="block text-text-muted mb-2">Phone Number (Optional)</label>
            <input type="tel" id="phone_number" name="phone_number" value="<?= htmlspecialchars($old_input['phone_number'] ?? '') ?>" class="w-full px-4 py-2 bg-base-100 dark:bg-base-900 border border-base-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
        </div>

        <!-- Password -->
        <div class="mb-6">
            <label for="password" class="block text-text-muted mb-2">Password</label>
            <input type="password" id="password" name="password" class="w-full px-4 py-2 bg-base-100 dark:bg-base-900 border border-base-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
            <?php if (isset($errors['password'])): ?>
                <p class="text-red-500 text-sm mt-1"><?= $errors['password'] ?></p>
            <?php endif; ?>
        </div>

        <button type="submit" class="w-full bg-primary text-white font-bold py-3 px-4 rounded-lg hover:bg-primary-hover transition-colors">
            Sign Up
        </button>
    </form>
    
    <p class="text-center text-secondary mt-6">
        Already have an account? <a href="/login" class="text-primary hover:underline">Log In</a>
    </p>
</div>

<?php require '../src/views/partials/footer.php'; ?>