import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; // Importar el plugin de Vue

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.js'],
            refresh: true,
        }),
        vue(), // Agregar el plugin de Vue
    ],
    build: {
        manifest: true, 
        outDir: 'public/build', 
        emptyOutDir: true,
    }
});