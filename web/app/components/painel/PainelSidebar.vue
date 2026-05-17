<!--
  PROVISÓRIO: sidebar simples para navegação básica.
  Substituir por versão definitiva (permissões, ícones, collapse, etc.).
-->
<template>
  <nav class="sidebar">
    <section
      v-for="modulo in navegacao"
      :key="modulo.label"
      class="sidebar__modulo"
    >
      <p class="sidebar__modulo-label">
        {{ modulo.label }}
      </p>

      <div
        v-for="item in modulo.itens"
        :key="item.label"
        class="sidebar__item"
      >
        <NuxtLink
          :to="item.to"
          class="sidebar__link"
          :class="{ 'sidebar__link--ativo': itemAtivo(item) }"
          @click="expandirItem(modulo.label, item)"
        >
          {{ item.label }}
        </NuxtLink>

        <div
          v-if="item.subitens?.length && itemExpandido(modulo.label, item)"
          class="sidebar__subitens"
        >
          <NuxtLink
            v-for="sub in item.subitens"
            :key="sub.to"
            :to="sub.to"
            class="sidebar__link sidebar__link--sub"
          >
            {{ sub.label }}
          </NuxtLink>
        </div>
      </div>
    </section>
  </nav>
</template>

<script setup>
const route = useRoute()
const expandidos = ref(new Set())

const navegacao = [
  {
    label: 'Principal',
    itens: [
      { label: 'Dashboard', to: '/app' },
    ],
  },
  {
    label: 'Cadastros',
    itens: [
      {
        label: 'Imóveis',
        to: '/app/imoveis',
        subitens: [
          { label: 'Listar', to: '/app/imoveis' },
          { label: 'Novo', to: '/app/imoveis/novo' },
        ],
      },
      {
        label: 'Clientes',
        to: '/app/clientes',
        subitens: [
          { label: 'Listar', to: '/app/clientes' },
          { label: 'Novo', to: '/app/clientes/novo' },
        ],
      },
    ],
  },
]

function chaveItem(moduloLabel, item) {
  return `${moduloLabel}/${item.label}`
}

function expandirItem(moduloLabel, item) {
  if (!item.subitens?.length) return
  const key = chaveItem(moduloLabel, item)
  if (!expandidos.value.has(key)) {
    expandidos.value = new Set([...expandidos.value, key])
  }
}

function itemExpandido(moduloLabel, item) {
  return expandidos.value.has(chaveItem(moduloLabel, item))
}

function rotaDoItem(item) {
  const rotas = [item.to, ...(item.subitens?.map((s) => s.to) ?? [])]
  return rotas.some(
    (r) => route.path === r || route.path.startsWith(`${r}/`),
  )
}

function itemAtivo(item) {
  if (!item.subitens?.length) {
    return route.path === item.to
  }
  return rotaDoItem(item)
}

function sincronizarExpandidos() {
  const next = new Set(expandidos.value)
  for (const modulo of navegacao) {
    for (const item of modulo.itens) {
      if (item.subitens?.length && rotaDoItem(item)) {
        next.add(chaveItem(modulo.label, item))
      }
    }
  }
  expandidos.value = next
}

onMounted(sincronizarExpandidos)
watch(() => route.path, sincronizarExpandidos)
</script>

<style scoped>
.sidebar {
  padding: 1rem;
}

.sidebar__modulo + .sidebar__modulo {
  margin-top: 1.25rem;
}

.sidebar__modulo-label {
  margin: 0 0 0.5rem;
  font-size: 0.75rem;
  font-weight: 600;
  color: #64748b;
}

.sidebar__item + .sidebar__item {
  margin-top: 0.125rem;
}

.sidebar__link {
  display: block;
  padding: 0.375rem 0.5rem;
  border-radius: 0.25rem;
  font-size: 0.875rem;
  color: #334155;
  text-decoration: none;
}

.sidebar__link--sub {
  padding-left: 1.25rem;
  font-size: 0.8125rem;
  color: #475569;
}

.sidebar__link.router-link-active,
.sidebar__link--ativo {
  background: #e2e8f0;
  color: #0f172a;
  font-weight: 500;
}
</style>
