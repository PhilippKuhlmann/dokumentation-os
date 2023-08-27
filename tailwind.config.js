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
                CoconPro: ['CoconPro-Regular', 'sans'],
                DINPro: ['DINPro-Regular', 'sans'],
                'DINPro-bold': ['DINPro-Bold', 'sans'],
                'DINPro-light': ['DINPro-Light', 'sans'],
                'DINPro-medium': ['DINPro-Medium', 'sans'],
            },

            colors: {
                'blau-900': '#194b7e',
                'blau-500': '#1D70A0',
                'blau-300': '#4EA5DD',
                'blau-100': '#01b1ec',
                'sdarkblue': '#0C2E5E',
                'ssystemblue': '#01B0EC',

                'cerulean': {
                    '50': '#effaff',
                    '100': '#def4ff',
                    '200': '#b6ebff',
                    '300': '#75deff',
                    '400': '#2dcdff',
                    '500': '#01b0ec',
                    '600': '#0094d3',
                    '700': '#0075aa',
                    '800': '#00638c',
                    '900': '#065274',
                    '950': '#04344d',
                },

            },
            width: {
                '128': '32rem',
            },
            backgroundImage: {
                'loginbackground': "url('/images/background.png')",
            }
        },

    },

    darkMode: 'class',

    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin'),
    ],
};
