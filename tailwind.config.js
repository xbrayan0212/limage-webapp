import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
			extend: {
					fontFamily: {
							sans: ['Figtree', ...defaultTheme.fontFamily.sans],
					},
					colors: {
						'limage-btn': '#D9C6FF',
						'limage-btnhover': '#6d28d9',
						'limage-btnfocus': '#4c1d95'
					},
			},
	},

    plugins: [forms],
};
