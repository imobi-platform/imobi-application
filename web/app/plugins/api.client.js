export default defineNuxtPlugin(() => {
    const config = useRuntimeConfig();

    const api = $fetch.create({
        baseURL: config.public.apiBase,

        onRequest({ options }) {
            // incluri logica depois do token

            // const token = useCookie('token')
            // if (token.value) {
            //     options.headers = {
            //         ...options.headers,
            //         Authorization: `Bearer ${token.value}`,
            //     }
            // }
        },

        onResponseError({ response }) {
            if (response.status === 401) {
                navigateTo('/auth/login');
            }
        }
    })

    return {
        provide: {
            api,
        }
    }
})
