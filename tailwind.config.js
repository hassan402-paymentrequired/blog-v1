/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Archivo Black', 'sans-serif'],
      },
    },
  },
  plugins: [
    // ...
    require('@tailwindcss/forms'),
    require('tailwind-scrollbar-hide')


  ],}

