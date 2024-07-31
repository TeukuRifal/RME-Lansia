/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        lightblue: '#ADD9D8'
      },
      fontFamily: {
        'sans': ['Poppins', 'sans-serif'],
        'roboto': ['roboto', 'sans-serif'],
        'teko': ['Teko', 'sans-serif'],
        'montserrat': ['Montserrat', 'sans-serif'],

      },
    },
  },
  plugins: [],
}