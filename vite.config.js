import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import { globSync } from "glob";
import { chunkSplitPlugin } from "vite-plugin-chunk-split";
import terser from "@rollup/plugin-terser";

export default defineConfig({
    plugins: [
        laravel({
            input: globSync([
                "./resources/js/**/*.js",
                "resources/css/**/*.css",
            ]),
            refresh: true,
        }),
        chunkSplitPlugin({
            strategy: "all-in-one",
        }),
        terser({
            maxWorkers: 20,
            compress: true,
            safari10: true,
            toplevel: true,
        }),
    ],
    build: {
        watch: true,
        cssCodeSplit: false,
        minify: false,
        cssMinify: true,
        modulePreload: true,
        rollupOptions: {
            cache: true,
            output: {
                entryFileNames: "[name].js",
                assetFileNames: "[name].[ext]",
                chunkFileNames: "[name].js",
            },
        },
    },
});
