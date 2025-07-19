/** @type {import('tailwindcss').Config} */
module.exports = {
    // We enable dark mode using a 'class' strategy
    darkMode: 'class',
    
    // These are the paths Tailwind will scan for CSS classes
    content: [
      "./src/**/*.php",
      "./public/**/*.php",
      "./admin/**/*.php"
    ],
    
    theme: {
      extend: {},
    },
    plugins: [],
  }