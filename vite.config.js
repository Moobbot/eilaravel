import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // "resources/assets/css/app.css",
                // "public/jquery-3.6.4.min.js",
                // "resources/js/app.js",
                "resources/assets/**",
            ],
            refresh: true,
        }),
    ],
});
