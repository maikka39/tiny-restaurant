const { reduce } = require("lodash");

module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ['Roboto', 'sans-serif'],
      serif: ['New Tegomin', 'serif'],
      handwriting: ['Indie Flower', 'cursive'],
      display: ['Staatliches', 'cursive'],
    },
    container: {
      center: true,
    },
    extend: {
      colors: {
        'primary': '#327231',
        'secondary': '#CE6727',
        'dark': '#CE6727',
        'light': '#EEEBE7',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
