<?php require '../src/views/partials/header.php'; ?>

<div class="bg-white dark:bg-gray-800 p-8 rounded-lg shadow-md">
    <h2 class="text-3xl font-bold mb-4">
        <?= htmlspecialchars($pageTitle); ?>
    </h2>
    <p class="text-lg">
        This is the homepage of our new course platform. The content is being loaded
        dynamically through our PHP controller and view system.
    </p>
    <p class="mt-4">
        The router correctly mapped the URL to the <code>HomeController</code>, which then loaded this view.
    </p>
</div>

<?php require '../src/views/partials/footer.php'; ?>