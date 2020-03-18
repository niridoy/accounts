require('./bootstrap');
import VueRouter from 'vue-router'
import { routes } from './routes'

//Global Component;
import ToDoList from './components/ToDoComponent.vue';
import PageHeader from './components/PageHeader.vue';


window.Vue = require('vue');
window.Fire = new Vue();
Vue.use(VueRouter)

Vue.component('todo-application', ToDoList);
Vue.component('page-header', PageHeader);

const router = new VueRouter({
    mode:'history',
    routes
});

const app = new Vue({
    el: '#app',
    router
});
