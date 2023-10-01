const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                body: [
                    'MS PGothic'
                ]
            },
            boxShadow: {
                myShadow: '0px 4px 4px rgba(0, 0, 0, 0.25)'
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
