/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import routes from './router';
import axios from 'axios';
const app = createApp({});

// Import Header 
import appHeader from './components/Header.vue';
app.component('app-header', appHeader);
// End Import Header 

// vform import 
// import { Button, HasError, AlertError } from 'vform/src/components/bootstrap5';
import {
    Button,
    HasError,
    AlertError,
    AlertErrors,
    AlertSuccess
} from 'vform/src/components/bootstrap5'
// 'vform/src/components/bootstrap4'
// 'vform/src/components/tailwind'

app.component(Button.name, Button)
app.component(HasError.name, HasError)
app.component(AlertError.name, AlertError)
app.component(AlertErrors.name, AlertErrors)
app.component(AlertSuccess.name, AlertSuccess)
// end vform 

// Toastify notification
import 'vue3-toastify/dist/index.css';


// Use Route
app.use(routes);
app.mount('#app');
