<template>
    <div class="min-h-screen flex items-center justify-center">
        <div class="flex flex-col gap-4 min-w-md">
            <h1>Cadastro na Plataforma</h1>
            <input type="text" placeholder="Nome Completo" class="border">
            <input type="text" placeholder="Email" class="border">
            <input type="password" placeholder="Senha" class="border">
            <input type="password" placeholder="Confirmar Senha" class="border">
            <button type="submit" class="bg-orange-500 text-white" @click="handleRegister">Cadastrar</button>
        </div>
    </div>
</template>

<script setup>

import useAuth from '@/composables/auth/useAuth';

const { register } = useAuth();

const form = ref({
    name: '',
    email: '',
    password: '',
    confirmPassword: '',
});

const handleRegister = async () => {
    const response = await register(form.value);
    console.log(response);
}
</script>