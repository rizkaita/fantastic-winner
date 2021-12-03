import { createApp } from 'vue'
import App from './App.vue'
import router from "./router";
import '@tabler/core/dist/css/tabler.min.css'
import '@tabler/core/dist/css/demo.min.css'
import '@tabler/core/dist/js/tabler.min.js'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import axios from "./http";



const app = createApp(App);
app.use(router);
app.use(VueSweetalert2)
app.mount('#app');
axios.interceptors.response.use(function (response) {

    return response;
}, function (error) {
    if (error.response.status === 401) {
        router.push({name : 'login'})
    }
    return Promise.reject(error);
});
app.config.globalProperties.axios = axios;
