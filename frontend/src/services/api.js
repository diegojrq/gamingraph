import axios from 'axios';
import { useRouter } from 'vue-router';

const router = useRouter;
//import store from '../store';

const api = axios.create({
    baseURL: import.meta.env.VITE_API_PATH,
    timeout: 300000, // indicates, 1000ms ie. 1 second
    headers: {
        "Content-Type": "application/json",
    },
    showLoader: true
});

const getAuthToken = () => {
    return JSON.parse(localStorage.getItem('access_token'));
}

const authInterceptor = (config) => {
    if (config.showLoader) {
        //store.dispatch('loader/pending');
    }
    config.headers['Authorization'] = 'Bearer ' + getAuthToken();
    return config;
}

const errorInterceptor = error => {
    if (error.response.config.showLoader) {
        //store.dispatch('loader/done');
    }

    // check if it's a server error
    if (!error.response) {
        // notify.warn('Network/Server error');
        return Promise.reject(error);
    }

    switch(error.response.status) {
        case 401:
            store.dispatch('auth/logout').then(
                router.push({ name: 'home'},
                    () => store.dispatch('alertas/show', {
                        tipo: 'Erro',
                        titulo: error.response.data.title,
                        mensagem: error.response.data.msg
                    })
                )
            );

            break;

        case 403:
            router.push({ name: 'erro403'});
            break;
        case 404:
            // router.push({ name: 'erro404'});
            break;
        case 500:
            break;
        case 502:
            break;
        case 504:
            break;

        default:
            console.error(error.response.status, error.message);

    }
    return Promise.reject(error);
}

// Interceptor for responses
const responseInterceptor = response => {
    if (response.config.showLoader) {
        //store.dispatch('loader/done');
    }
    switch(response.status) {
        case 200:
            // yay!
            break;
        // any other cases
        default:
        // default case
    }

    return response;
}

api.interceptors.request.use(authInterceptor);
api.interceptors.response.use(responseInterceptor, errorInterceptor);

export default api;

