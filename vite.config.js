import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
    ],
    build: {
        manifest: true, // Asegura que se genere el manifest.json
        outDir: 'public/build', // Cambia la carpeta de salida
        emptyOutDir: true, // Limpia la carpeta antes de construir
    }
});