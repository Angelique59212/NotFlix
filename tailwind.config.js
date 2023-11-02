/** @type {import('tailwindcss').Config} */
module.exports = {
  content:
      [
      "./assets/**/*.js",
      "./templates/**/*.html.twig",
      ],
  theme: {
    extend: {
        backgroundImage: {
            'form-gradient': 'linear-gradient(180deg, #6AADBA 0%, rgba(220, 239, 242, 0.00) 60.42%, rgba(202, 235, 242, 0.28) 77.6%)',
        },
    },
  },
  plugins: [],
}

