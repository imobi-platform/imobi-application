export default function useAuth() {

    const { $api } = useNuxtApp();

    async function register(data) {
        try {
            const response = await $api('/api/auth/register', {
                method: 'POST',
                body: data,
            })
        } catch (error) {
            console.error(error);
        }
    }

    return {
        register,
    }
}