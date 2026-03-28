import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});

/*
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
    server: {
        host: '0.0.0.0', //je vais revoir pour eviter tout acces non autoriser 
        //c'est seulement sur cette port
        port: 5173,
        strictPort: true, // évite que Vite change le port automatiquement
       
    
        hmr: {
            host: '10.133.226.27' // L'IP de ton PC pour que le téléphone sache où demander les mises à jour
        },
    },
});

php artisan serve --host=0.0.0.0 --port=8000
npm run dev
*/
