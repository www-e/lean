<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body { font-family: sans-serif; display: flex; justify-content: center; align-items: center; height: 100vh; background: #f4f4f4; }
        form { background: white; padding: 2rem; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        input { display: block; width: 100%; padding: 0.5rem; margin-bottom: 1rem; border: 1px solid #ccc; }
        button { width: 100%; padding: 0.75rem; background: #333; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 1rem; }
    </style>
</head>
<body>
    <form action="/login" method="POST">
        <h2>Admin Login</h2>
        <?php if (isset($errors['credentials'])): ?>
            <p class="error"><?= $errors['credentials'] ?></p>
        <?php endif; ?>
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</body>
</html>