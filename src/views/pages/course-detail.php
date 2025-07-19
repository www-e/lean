<?php require '../src/views/partials/header.php'; ?>

<div class="container mx-auto">
    <!-- Main two-column layout -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

        <!-- Left Column: Course Image & Meta -->
        <div class="lg:col-span-1">
            <div class="bg-base-200 dark:bg-base-800 rounded-lg shadow-lg p-4 sticky top-24">
                <!-- Image will come from Bunny.net via the database -->
                <img src="https://via.placeholder.com/600x400/007BFF/FFFFFF?text=<?= urlencode($course->title) ?>" alt="<?= htmlspecialchars($course->title) ?>" class="w-full h-auto object-cover rounded-lg mb-4">

                <button class="w-full bg-accent text-white font-bold text-xl py-3 px-4 rounded-lg hover:opacity-90 transition-opacity mb-4">
                    اشترك الآن (Enroll Now)
                </button>

                <ul class="space-y-3 text-text-muted dark:text-gray-400">
                    <li class="flex items-center"><span class="font-bold mr-2">المدة:</span> 0 دقيقة (Static)</li>
                    <li class="flex items-center"><span class="font-bold mr-2">مدة الامتحان:</span> (Static)</li>
                    <li class="flex items-center"><span class="font-bold mr-2">اجمالي الاسئلة:</span> (Static)</li>
                </ul>

                <div class="text-center mt-4 border-t border-base-300 pt-4">
                    <span class="text-4xl font-bold text-primary">$<?= number_format($course->price, 2) ?></span>
                </div>
            </div>
        </div>

        <!-- Right Column: Course Content & Tabs -->
        <div class="lg:col-span-2">
            <div class="bg-base-200 dark:bg-base-800 rounded-lg shadow-lg p-8">
                <h1 class="text-4xl font-bold text-text-main dark:text-text-invert mb-4"><?= htmlspecialchars($course->title) ?></h1>
                <p class="text-lg text-text-muted leading-relaxed">
                    <?= nl2br(htmlspecialchars($course->description)) ?>
                </p>
            </div>

            <!-- Tabs for Content -->
            <div class="mt-8">
                <div class="flex border-b border-base-300">
                    <button class="py-2 px-4 text-primary border-b-2 border-primary font-semibold">47 فيديوهات (Videos)</button>
                    <button class="py-2 px-4 text-secondary hover:text-primary">0 امتحانات (Exams)</button>
                    <button class="py-2 px-4 text-secondary hover:text-primary">0 ملفات (Files)</button>
                </div>

                <!-- Accordion for lessons -->
                <div class="mt-6 space-y-2" id="lesson-accordion">

                    <!-- PHP loops through the grouped $chapters data from the controller -->
                    <?php foreach ($chapters as $chapterTitle => $lessons): ?>

                        <div class="bg-base-200 dark:bg-base-800 rounded-lg overflow-hidden border border-base-300">
                            <!-- Accordion Header -->
                            <button class="accordion-header w-full flex justify-between items-center text-left p-4">
                                <h3 class="text-xl font-bold text-text-main dark:text-text-invert"><?= htmlspecialchars($chapterTitle) ?></h3>
                                <svg class="w-6 h-6 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </button>

                            <!-- Accordion Panel (hidden by default) -->
                            <div class="accordion-panel hidden">
                                <ul class="divide-y divide-base-300">
                                    <?php foreach ($lessons as $lesson): ?>
                                        <li class="flex items-center justify-between p-4 hover:bg-base-100 dark:hover:bg-gray-700">
                                            <div class="flex items-center">
                                                <!-- Lock Icon -->
                                                <svg class="w-5 h-5 text-secondary mr-3" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M10 2a3 3 0 00-3 3v2H5a2 2 0 00-2 2v6a2 2 0 002 2h10a2 2 0 002-2V9a2 2 0 00-2-2h-2V5a3 3 0 00-3-3zm-1 3a1 1 0 012 0v2H9V5z" clip-rule="evenodd"></path>
                                                </svg>
                                                <span class="text-text-muted"><?= htmlspecialchars($lesson->title) ?></span>
                                            </div>
                                            <!-- We can add lesson duration or a preview button here later -->
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>

    </div>
</div>

<?php require '../src/views/partials/footer.php'; ?>