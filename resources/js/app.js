require('./bootstrap');

window.$ = require('jquery');
window.JQuery = require('jquery');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import IndexComponent from './components/IndexComponent.vue';
import CreateComponent from './components/CreateComponent.vue';
import EditComponent from './components/EditComponent.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: IndexComponent
    },
    {
        name: 'create',
        path: '/create',
        component: CreateComponent
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditComponent
    }
];

const router = new VueRouter({mode: 'history', routes: routes});
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
