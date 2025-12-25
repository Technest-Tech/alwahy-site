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
        'gold': {
          '50': '#FDF8E8',
          '100': '#FBF0D1',
          '200': '#F4E4BC',
          '300': '#E8D19A',
          '400': '#D4AF37',
          '500': '#B8941F',
          '600': '#9A7A1A',
          '700': '#7C6015',
          '800': '#5E4610',
          '900': '#402C0B',
        },
      },
      fontFamily: {
        'sans': ['Inter', 'Cairo', 'sans-serif'],
        'arabic': ['Cairo', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

