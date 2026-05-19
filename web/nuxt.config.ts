  // https://nuxt.com/docs/api/configuration/nuxt-config
import tailwindcss from '@tailwindcss/vite';

export default defineNuxtConfig({

  routeRules: {
    '/app/**': { ssr: false },
  },

  css: [ '~/assets/css/main.css' ],

  vite: {
    plugins: [
      tailwindcss(),
    ],
  },

  runtimeConfig: {
    public: {
      apiBase: process.env.NUXT_PUBLIC_API_BASE,
    },
  },

  compatibilityDate: '2025-07-15',
  devtools: { enabled: true }
})
