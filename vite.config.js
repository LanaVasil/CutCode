import { defineConfig } from "vite";
import Inspect from "vite-plugin-inspect";
import laravel from "laravel-vite-plugin";

// import ViteSvgSpriteWrapper from 'vite-svg-sprite-wrapper';

export default defineConfig({
    plugins: [
        Inspect(),
        laravel({
            input: ["resources/sass/app.scss", "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js", "resources/js/app.js"],
            refresh: true,
        }),


        // відмовилась 30.08.2024 не змогла зробити читання зі sprate
        // ViteSvgSpriteWrapper({
        //   icons: "resources/svg/*.svg",
        //   // outputDir: "public/build/assets/spritemap.svg"
        //   outputDir: "resources/img/spritemap.svg"
        // }),
    ],

    resolve: {
        alias: {
            "@": "/resources/js/components",
        },
    },



    // build: {
    //     outDir: "public/dist",
    // },
});
