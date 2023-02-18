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
                'sdarkblue': '#0C2E5E',
                'ssystemblue': '#01B0EC',
            },
        },

    },

    darkMode: 'class',

    plugins: [
        require('flowbite/plugin'),
        require('@tailwindcss/forms'),

    ],
};
