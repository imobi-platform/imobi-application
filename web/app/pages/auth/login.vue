<template>
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="text-2xl font-bold">Login Imobi</h1>
        <form class="flex flex-col gap-4">
            <input type="email" placeholder="Email" class="border border-gray-300 rounded-md p-2" />
            <input type="password" placeholder="Password" class="border border-gray-300 rounded-md p-2" />
            <button type="submit" class="bg-blue-500 text-white rounded-md p-2">Login</button>
            <a href="/auth/register" class="text-blue-500">Register</a>
        </form>
    </div>
</template>