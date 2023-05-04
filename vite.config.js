import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // "resources/css/alter.css",
                // "resources/css/template.css",
                // "resources/css/app.css",
                // "resources/css/responsive.css",
                "public/jquery-3.6.4.min.js",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
