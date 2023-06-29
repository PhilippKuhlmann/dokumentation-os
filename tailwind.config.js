const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './node_modules/flowbite/**/*.js'
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'blau-900': '#194b7e',
                'blau-500': '#1D70A0',
                'blau-300': '#4EA5DD',
                'blau-100': '#01b1ec',
                'sdarkblue': '#0C2E5E',
                'ssystemblue': '#01B0EC',
            },
            width: {
                '128': '32rem',
              }
        },

    },

    darkMode: 'class',

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
    ],
};
