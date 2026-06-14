import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import fs from 'fs';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        // Remove a stale `public/hot` left behind by an unclean `npm run dev`
        // exit, so a production build doesn't keep pointing at the dev server.
        {
            name: 'remove-hot-on-build',
            apply: 'build',
            buildStart() {
                fs.rmSync('public/hot', { force: true });
            },
        },
    ],
});
