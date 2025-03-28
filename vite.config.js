import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', // Incluye tu archivo CSS
                'resources/js/app.js',   // Tu archivo JS principal
            ],
            refresh: true,
        }),
        vue({
            template: {
                transformAssetUrls: {
                    base: null,
                    includeAbsolute: false,
                },
            },
        }),
    ],
    build: {
        manifest: true,  // Asegura que se genere el archivo manifest.json
        outDir: 'public/build', // Directorio de salida para los archivos compilados
        rollupOptions: {
            input: {
                app: 'resources/js/app.js',
            },
        },
    },
});
