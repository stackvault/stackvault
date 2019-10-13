module.exports = {
  theme: {
    fontFamily: {
      display: ['Comfortaa', 'sans-serif'],
      body: ['Graphik', 'sans-serif'],
    },
    gradients: theme => ({
      // Array definition (defaults to linear gradients).
      'blue-gradient':      ['to top', theme('colors.blue.500'), theme('colors.blue.300')],
      // Object definition.
      'mono-circle': {
        type: 'radial',
        colors: ['circle', '#CCC', '#000']
      },
    }),
    extend: {
    }
  },
  variants: {
    gradients: ['responsive', 'hover'],
  },
  plugins: [
      require('tailwindcss-plugins/gradients'),
  ]
}
