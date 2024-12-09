import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/welcome.css',
                'resources/css/day-theme.css',
                'resources/css/night-theme.css',
                'resources/css/day-preloader.css',
                'resources/css/night-preloader.css',
                'resources/js/app.js',
                'resources/js/welcome.js',
            ],
            refresh: true,
        }),
    ],
});
