import Vue from 'vue';
import axios from 'axios';

import App from './views/Main';

Vue.prototype.$axios = axios;
axios.defaults.baseURL = '/api';

const app = new Vue({
    el: '#app',
    components: {
        App
    }
});
