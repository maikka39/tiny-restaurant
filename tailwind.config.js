module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    colors: {
      'trgreen-light': '#88bb90',
      'trgreen': '#6baa75',
      'trgreen-dark': '#55885d',
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
