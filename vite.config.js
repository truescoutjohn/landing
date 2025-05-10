import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import tailwindcss from '@tailwindcss/vite';
import { fileURLToPath } from 'node:url';
import path from 'path';
import svgLoader from 'vite-svg-loader';
import { viteStaticCopy } from 'vite-plugin-static-copy';

const __dirname = fileURLToPath(new URL('.', import.meta.url));

export default defineConfig({
  plugins: [
    tailwindcss(),
    svgLoader(),
    laravel({
      input: ['resources/js/app.ts'],
      refresh: true,
    }),
    vue({
      template: {
        transformAssetUrls: {
          includeAbsolute: false, // Обработка путей в Vue шаблонах
        },
      },
    }),
    // Копирование статических ассетов
    viteStaticCopy({
      targets: [
        {
          src: 'resources/assets/imgs/**/*',
          dest: 'assets/imgs',
        },
        // {
        //   src: 'resources/assets/fonts/**/*',
        //   dest: 'assets/fonts',
        // },
      ],
    }),
  ],
  server: {
    host: '0.0.0.0',
    port: 5173,
    // hmr: {
    //   protocol: 'wss',
    //   host: '0.0.0.0', // Домен LocalTunnel
    //   clientPort: 443, // Порт HTTPS
    // },
    cors: {
      origin: 'https://bold-mildly-kite.ngrok-free.app', // Разрешить запросы с домена LocalTunnel
      methods: ['GET', 'POST', 'PUT', 'DELETE'],
      allowedHeaders: ['Content-Type'],
    },
  },
  resolve: {
    alias: {
      '@': path.resolve(__dirname, './resources/'),
      '@lang': path.resolve(__dirname, './resources/lang'),
      '@js': path.resolve(__dirname, './resources/js'),
      '@css': path.resolve(__dirname, './resources/assets/css'),
      '@assets': path.resolve(__dirname, './resources/assets'),
      // Добавляем алиас для скомпилированных ассетов
      '~assets': path.resolve(__dirname, './public/assets'),
    },
  },
  build: {
    assetsDir: 'assets',
    manifest: true,
    rollupOptions: {
      output: {
        assetFileNames: ({ name }) => {
          if (/\.(gif|jpe?g|png|svg|webp|avif)$/.test(name ?? '')) {
            return 'assets/images/[name]-[hash][extname]'; // Убрали "../"
          }
          if (/\.(woff2?|eot|ttf|otf)$/.test(name ?? '')) {
            return 'assets/fonts/[name]-[hash][extname]';
          }
          return 'assets/[name]-[hash][extname]';
        },
      },
    },
  },
});
