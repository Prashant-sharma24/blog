// vite.config.js

import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            '@ckeditor/ckeditor5-build-classic': '/node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor.js'
            , // Replace with the actual path to ckeditor.js
        },
    },
});
