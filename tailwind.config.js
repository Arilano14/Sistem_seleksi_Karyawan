import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    darkMode: 'class',

    theme: {
        themeVariants: ['dark'],
        extend: {
            fontFamily: {
                lato: ["Lato", ...defaultTheme.fontFamily.sans],
                workSans: ["Work Sans", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#00007f',
                warning: '#ffd900',
            },
        },
    },

    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: '#00007f',
                    warning: '#ffd900',
                    // DaisyUI membutuhkan ini jika Anda ingin override penuh
                    secondary: '#f000b8',
                    accent: '#37cdbe',
                    neutral: '#3d4451',
                    'base-100': '#ffffff',
                    info: '#3abff8',
                    success: '#36d399',
                    error: '#f87272',
                },
            },
            'dark',
        ],
    },

    plugins: [
        forms,
        require("daisyui"),
        require('tailwind-scrollbar')({ nocompatible: true }),
    ],
};
