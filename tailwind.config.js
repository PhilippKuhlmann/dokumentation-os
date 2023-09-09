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
                    '500': '#01b0ec', // systeme blue
                    '600': '#0094d3',
                    '700': '#0075aa',
                    '800': '#00638c',
                    '900': '#065274',
                    '950': '#04344d',
                },

                'chathams-blue': {
                    '50': '#f2f7fd',
                    '100': '#e4eefa',
                    '200': '#c3dbf4',
                    '300': '#8dbeec',
                    '400': '#519ddf',
                    '500': '#2a81cd',
                    '600': '#1b65ae',
                    '700': '#17518d',
                    '800': '#194b7e', // dark Blue
                    '900': '#193c61',
                    '950': '#102541',
                },

                'hawkes-blue': {
                    '50': '#f0faff',
                    '100': '#dff2fd', // Table Card
                    '200': '#bce7fb',
                    '300': '#81d6f8',
                    '400': '#3ec1f2',
                    '500': '#14aae3',
                    '600': '#0888c1',
                    '700': '#086d9c',
                    '800': '#0b5c81',
                    '900': '#0f4c6b',
                    '950': '#0a3147',
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
