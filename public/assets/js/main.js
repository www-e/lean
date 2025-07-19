// (c) 2024 Your Academy Name
// Theme Switcher Logic

const themeToggleBtn = document.getElementById('theme-toggle');
const themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
const themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

// Change the icons inside the button based on previous settings
if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    themeToggleLightIcon.classList.remove('hidden');
    document.documentElement.classList.add('dark');
} else {
    themeToggleDarkIcon.classList.remove('hidden');
    document.documentElement.classList.remove('dark');
}

themeToggleBtn.addEventListener('click', function () {
    // toggle icons inside button
    themeToggleDarkIcon.classList.toggle('hidden');
    themeToggleLightIcon.classList.toggle('hidden');

    // if set via local storage previously
    if (localStorage.getItem('color-theme')) {
        if (localStorage.getItem('color-theme') === 'light') {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        } else {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        }
        // if NOT set via local storage previously
    } else {
        if (document.documentElement.classList.contains('dark')) {
            document.documentElement.classList.remove('dark');
            localStorage.setItem('color-theme', 'light');
        } else {
            document.documentElement.classList.add('dark');
            localStorage.setItem('color-theme', 'dark');
        }
    }
});

document.addEventListener('DOMContentLoaded', function () {
    console.log("DOM fully loaded. Firing accordion script.");

    const accordionHeaders = document.querySelectorAll('.accordion-header');
    console.log(`Found ${accordionHeaders.length} accordion headers.`);

    accordionHeaders.forEach((header, index) => {
        console.log(`Attaching listener to header ${index + 1}.`);
        header.addEventListener('click', () => {
            console.log(`Click detected on header ${index + 1}.`);

            const accordionPanel = header.nextElementSibling;
            const arrowIcon = header.querySelector('svg');

            accordionPanel.classList.toggle('hidden');
            arrowIcon.classList.toggle('rotate-180');
        });
    });
});