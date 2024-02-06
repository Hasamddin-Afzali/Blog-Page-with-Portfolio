/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      extend:{
        borderRadius:{
          '40': '40px',
        }
      }
    },
  },
  plugins: [],
}

