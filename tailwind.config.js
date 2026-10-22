import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Poppins', ...defaultTheme.fontFamily.sans],
                poppins: ['Poppins', 'sans-serif'],
            },
            colors: {
                'rumahmade-black': '#010101',
                'rumahmade-grey': '#595959',
                'rumahmade-light-grey': '#A1A1A1',
                'rumahmade-darker-grey': '#181818',
                'rumahmade-dark-grey': '#1E1E1E',
                // Compatibility for PascalCase legacy classes
                'Rumahmade-black': '#010101',
                'Rumahmade-grey': '#595959',
                'Rumahmade-light-grey': '#A1A1A1',
                'Rumahmade-darker-grey': '#181818',
                'Rumahmade-dark-grey': '#1E1E1E',
            },
            keyframes: {
                slide: {
                    '0%': { transform: 'translateX(0)' },
                    '100%': { transform: 'translateX(-100%)' }
                }
            },
            animation: {
                slide: 'slide 50s linear infinite',
            }
        },
    },

    plugins: [forms],
};
