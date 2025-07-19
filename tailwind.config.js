/** @type {import('tailwindcss').Config} */
module.exports = {
  darkMode: 'class',
  content: [
    "./src/**/*.php",
    "./public/**/*.php",
    "./admin/**/*.php"
  ],
  theme: {
    extend: {
      // --- HERE IS OUR NEW THEME DEFINITION ---
      colors: {
        'primary': '#007BFF', // A strong blue for buttons and links
        'primary-hover': '#0056b3', // A darker blue for hover states
        'secondary': '#6c757d', // A muted gray for secondary text
        'accent': '#28a745', // A green for highlights or success states
        
        // Backgrounds and Surfaces
        'base-100': '#F8F9FA', // Light theme main background
        'base-200': '#FFFFFF', // Light theme card/surface background
        'base-300': '#E9ECEF', // Light theme borders

        'base-800': '#181a1b', // Dark theme card/surface background
        'base-900': '#111213', // Dark theme main background

        // Text colors
        'text-main': '#212529', // Main text on light theme
        'text-muted': '#6c757d',
        'text-invert': '#F8F9FA', // Main text on dark theme
      }
    },
  },
  plugins: [],
}