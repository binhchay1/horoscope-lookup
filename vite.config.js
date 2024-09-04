import { defineConfig } from 'vite';
import laravel, { refreshPaths } from 'laravel-vite-plugin';

import fs from 'fs-extra';
import path from 'path';

const folder = {
    src: "resources/", // source files
    src_assets: "resources/", // source assets files
    dist: "public/", // build files
    dist_assets: "public/build/" //build assets files
};

export default defineConfig({
    build: {
        manifest: true,
        rtl: true,
        outDir: folder.dist_assets,
        cssCodeSplit: true,
        rollupOptions: {
            output: {
                assetFileNames: (css) => {
                    if (css.name.split('.').pop() == 'css') {
                        return 'css/' + `[name]` + '.min.' + 'css';
                    } else {
                        return 'icons/' + css.name;
                    }
                },
                entryFileNames: 'js/' + `[name]` + `.js`,
            },
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/scss/tailwind.scss',
                'resources/scss/icons.scss'
            ],
            refresh: [
                ...refreshPaths,
                'app/Http/Livewire/**',
            ],
        }),
        {
            name: 'copy-assets',
            async writeBundle() {
                try {
                    // Copy images, json, fonts, and js
                    await Promise.all([
                        fs.copy(folder.src_assets + 'images', folder.dist_assets + 'images'),
                        fs.copy(folder.src_assets + 'json', folder.dist_assets + 'json'),
                        fs.copy(folder.src_assets + 'fonts', folder.dist_assets + 'fonts'),
                        fs.copy(folder.src_assets + 'js', folder.dist_assets + 'js'),
                    ]);

                    // Read the package-copy-config.json file
                    const configPath = path.resolve(__dirname, 'package-copy-config.json');
                    const configContent = await fs.readFile(configPath, 'utf-8');
                    const { packagesToCopy } = JSON.parse(configContent);

                    // Copy specific packages
                    await Promise.all(packagesToCopy.map(async packageName => {
                        const destPackagePath = path.join(folder.dist_assets, 'libs', packageName);

                        const sourcePath = fs.existsSync(path.join(__dirname, 'node_modules', packageName + "/dist"))
                            ? path.join(__dirname, 'node_modules', packageName + "/dist")
                            : path.join(__dirname, 'node_modules', packageName);

                        try {
                            await fs.access(sourcePath, fs.constants.F_OK);
                            await fs.copy(sourcePath, destPackagePath);
                        } catch (error) {
                            console.error(`Package ${packageName} does not exist.`);
                        }
                    }));
                } catch (error) {
                    console.error('Error copying assets:', error);
                }
            },
        },
    ],
});
