<template>
  <div>
    <p v-if="pending">Carregando...</p>
    <p v-else-if="error">Erro: {{ error.message }}</p>
    <p v-else class="text-green-500">API Health: {{ health?.message }}</p>
  </div>
</template>

<script setup>
definePageMeta({
  layout: 'painel',
})

const config = useRuntimeConfig()

const { data: health, pending, error } = await useFetch('/api/health', {
  baseURL: config.public.apiBase,
})
</script>