/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
window.Vue = require('vue');

// js modules
import VueRouter from 'vue-router'
import VueFormWizard from 'vue-form-wizard'
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

// views
import App from './views/App'
import Home from './views/Home'
import FormClients from './views/FormClients'
import NotFound from './views/NotFound'

// js
// require('../../public/js/perfect-scrollbar.jquery.min.js');
// require('../../public/js/waves');
// require('../../public/js/custom.min.js');
// require('../../public/js/pages/validation');

// css
import 'vue-form-wizard/dist/vue-form-wizard.min.css'

Vue.use(VueRouter);
Vue.use(ElementUI);
Vue.use(VueFormWizard);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/client',
            name: 'client.logbook',
            component: FormClients
        },
        {
            path: '/client/admin',
            name: 'client.admin',
            component: FormClients
        },
        {   
            path: '/404', 
            name: '404', 
            component: NotFound 
        },
    ],
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: { App },
});
