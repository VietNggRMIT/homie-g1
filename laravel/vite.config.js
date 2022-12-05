import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import webfontDownload from 'vite-plugin-webfont-dl';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        webfontDownload([
            // Google Fonts: Noto Sans, weight: 100, 400, 700
            // Google Fonts: Playfair Display, weight: 400, 700
            // Google Fonts: Montserrat, weight: 100, 400, 700
            'https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap',
            'https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,700;1,400;1,700&display=swap',
            'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&display=swap'
        ])
    ],
});
