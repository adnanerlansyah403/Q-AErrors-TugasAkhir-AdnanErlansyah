/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    // container: {
    //   padding: {
    //     DEFAULT: '1rem',
    //     sm: '16px',
    //     lg: '60px',
    //   },
    // },
    fontFamily: {
      'quick-sand': ['Quicksand', 'sans-serif'],
    },
    fontSize: {
      sm: '0.8rem',
      base: '24px',
      md: '26px',
      lg: '32px',
      xl: '48px'
    },
    extend: {
      colors: {
        'red-primary': '#F53333',
        'gray-primary': '#989393',
        'gray-secondary': '#5E5E5E',
        'black': "#000000",
        'bluck': '#2F2E41'
      }
    },
  },
  plugins: [],
}