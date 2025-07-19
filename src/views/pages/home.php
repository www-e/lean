<?php require '../src/views/partials/header.php'; ?>

<div class="mb-12">
    <h1 class="text-4xl font-bold text-center text-text-main dark:text-text-invert mb-2">Our Courses</h1>
    <p class="text-lg text-center text-secondary">
        Find the perfect course to advance your skills.
    </p>
</div>

<!-- This is our responsive grid for the courses -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    <!-- We now loop through the $courses variable from our controller -->
    <?php foreach ($courses as $course): ?>
    
    <div class="bg-base-200 dark:bg-base-800 rounded-lg shadow-lg overflow-hidden flex flex-col">
        <!-- Course Image (We'll use a placeholder for now) -->
        <img src="https://via.placeholder.com/400x250/E9ECEF/6c757d?text=Course+Image" alt="<?= htmlspecialchars($course->title) ?>" class="w-full h-48 object-cover">
        
        <div class="p-6 flex flex-col flex-grow">
            <h3 class="text-xl font-bold mb-2 text-text-main dark:text-text-invert">
                <?= htmlspecialchars($course->title) ?>
            </h3>
            
            <p class="text-secondary text-sm mb-4 flex-grow">
                <?= htmlspecialchars($course->description) ?>
            </p>
            
            <div class="flex justify-between items-center mt-4">
                <span class="text-2xl font-bold text-accent">
                    $<?= number_format($course->price, 2) ?>
                </span>
                <a href="/courses/<?= htmlspecialchars($course->slug) ?>" class="bg-primary text-white font-bold py-2 px-4 rounded hover:bg-primary-hover transition-colors">
                    View Details
                </a>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

</div>

<?php require '../src/views/partials/footer.php'; ?>