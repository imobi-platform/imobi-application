<template>
    <div class="painel">
        <aside class="painel__sidebar">
            <PainelSidebar />
        </aside>

        <div class="painel__main">
            <header class="painel__header">
                Header
            </header>

            <main class="painel__content">
                <slot />
            </main>

            <footer class="painel__footer">
                Footer pequeno
            </footer>
        </div>
    </div>
</template>

<style scoped>
.painel {
    display: flex;
    height: 100vh;
    height: 100dvh;
    /* melhor em mobile */
    overflow: hidden;
    /* impede scroll da página inteira */
}

/* esquerda */
.painel__sidebar {
    width: 240px;
    flex-shrink: 0;
    overflow-y: auto;
    border-right: 1px solid #e5e7eb;
    background: #f8fafc;
}

/* direita */
.painel__main {
    flex: 1;
    display: flex;
    flex-direction: column;
    min-width: 0;
    min-height: 0;
    overflow: hidden;
}

/* fixos */
.painel__header {
    height: 56px;
    flex-shrink: 0;
    border-bottom: 1px solid #e5e7eb;
    background: #fff;
    display: flex;
    align-items: center;
    padding: 0 1rem;
}

.painel__footer {
    height: 36px;
    /* pequeno */
    flex-shrink: 0;
    border-top: 1px solid #e5e7eb;
    background: #fff;
    display: flex;
    align-items: center;
    padding: 0 1rem;
}

/* única área com scroll */
.painel__content {
    flex: 1;
    min-height: 0;
    overflow-y: auto;
    overflow-x: hidden;
    padding: 2rem;
    background: #f1f5f9;
}
</style>