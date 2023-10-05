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
            backgroundColor: ['active'],
            transform: ['active'],
            scale: ['active'],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        function({ addUtilities }) {
            const newUtilities = {
                ".text-shadow": {
                    textShadow: "0px 2px 3px darkgray"
                },
                ".text-shadow-md": {
                    textShadow: "0px 3px 3px darkgray"
                },
                ".text-shadow-lg": {
                    textShadow: "0px 5px 3px darkgray"
                },
                ".text-shadow-xl": {
                    textShadow: "0px 7px 3px darkgray"
                },
                ".text-shadow-2xl": {
                    textShadow: "0px 10px 3px darkgray"
                },
                ".text-shadow-none": {
                    textShadow: "none"
                }
            };

            addUtilities(newUtilities);
        }
    ]
};