import { createRouter, createWebHistory } from "vue-router";

import Home from './pages/Home.vue';
import CategoryIndex from './pages/category/index.vue';
import CategoryCreate from './pages/category/create.vue';
import CategoryEdit from './pages/category/edit.vue';
import ProductIndex from './pages/product/index.vue';
import ProductCreate from './pages/product/create.vue';
import ProductEdit from './pages/product/edit.vue';
import Dashboard from './pages/dashboard/dashboard.vue';

// Authentication File 
import Login from './pages/auth/Login.vue';

const routes = [
    {
        path:'/',
        name:'Home',
        component: Home
    },
    {
        path:'/category',
        name:'CategoryIndex',
        component: CategoryIndex
    },
    {
        path:'/category/create',
        name:'CategoryCreate',
        component: CategoryCreate
    },
    {
        path:'/category/edit/:id',
        name:'CategoryEdit',
        component: CategoryEdit
    },
    {
        path:'/product',
        name:'ProductIndex',
        component: ProductIndex
    },
    {
        path:'/product/create',
        name:'ProductCreate',
        component: ProductCreate
    },
    {
        path:'/product/edit/:id',
        name:'ProductEdit',
        component: ProductEdit
    },
    {
        path:'/auth/login',
        name:'Login',
        component: Login
    },
    {
        path:'/dashboard',
        name:'Dashboard',
        component: Dashboard
    },
];

export default createRouter({
    history:createWebHistory(),
    linkExactActiveClass:'active',
    routes,
});