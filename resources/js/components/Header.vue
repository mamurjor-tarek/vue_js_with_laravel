<template lang="">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5">
        <div class="container">
            <router-link :to="{name: 'Home'}" class="navbar-brand">Site Logo</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link class="nav-link" aria-current="page" :to="{name: 'Home'}">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'ProductIndex'}">Products</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'CategoryIndex'}">Category</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link class="nav-link" :to="{name:'Login'}">Login</router-link>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link" @click.prevent="logout()">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
import { toast } from 'vue3-toastify';
export default {
    methods: {
        logout(){
            axios.post('/logout')
            .then(function (response) {
                toast.success('Logout successfully!',{
                    autoClose:3000,
                });
            })
        }
    },
}
</script>
<style lang="">
    
</style>