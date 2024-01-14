import { createRouter, createWebHistory } from "vue-router";
import Home from './pages/Home.vue';
import CategoryIndex from './pages/category/index.vue';
import CategoryCreate from './pages/category/create.vue';
import CategoryEdit from './pages/category/edit.vue';

import ProductIndex from './pages/product/index.vue';
import ProductCreate from './pages/product/create.vue';
import ProductEdit from './pages/product/edit.vue';
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
];

export default createRouter({
    history:createWebHistory(),
    routes,
});