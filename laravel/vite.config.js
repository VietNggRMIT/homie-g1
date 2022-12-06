import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import webfontDownload from 'vite-plugin-webfont-dl';
import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/customScript.js',
            ],
            refresh: true,
        }),
        webfontDownload([
            // Google Fonts: Noto Sans, weight: 400, 700
            // Google Fonts: Playfair Display, weight: 400, 700
            // Google Fonts: Montserrat, weight: 400, 700
            'https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap',
            // 'https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap',
            'https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap',
        ])
    ],
    resolve: {
        alias: {
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
