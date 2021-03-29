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
        'primary': 'green', // TODO: pick a nice color
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
