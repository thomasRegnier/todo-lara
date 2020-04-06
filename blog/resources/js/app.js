require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)


import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

import Home from './views/Home.vue'
import Hello from './views/Hello.vue'
import Task from './views/Task.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Home',
            component: Home
        },
        {
            path: '/hello',
            name: 'Hello',
            component: Hello
        },

        {
            path:'/:id',
            name: 'Task',
            component: Task
        }
    ],
});


const app = new Vue({
    el: '#app',
    router
});
