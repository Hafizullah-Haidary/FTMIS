import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import "@fortawesome/fontawesome-free/css/all.css";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
