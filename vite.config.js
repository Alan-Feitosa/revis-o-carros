import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'

export default defineConfig({
  base: '/',
  build: {
    outDir: './public/build',
    emptyOutDir: true,
    sourcemap: true,
  },
  plugins: [
    vue({
      template: {
          transformAssetUrls: {
              base: null,
              includeAbsolute: false,
          },
      },
    }),
    laravel({
      input: ['resources/css/app.css', 'resources/js/app.js'],
      refresh: true,
    }),
  ],
  server: {
    https: false,
    host: true,
    strictPort: true,
    port: 3000,
    hmr: {host: 'localhost', protocol: 'ws'},
    watch: {
      usePolling: true,
    }
  },
  resolve: {
    alias: {
      '@': '/resources/js'
    }
  }
});