<template lang="">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Categories</h5>
                <router-link :to="{name: 'ProductCreate'}" class="btn btn-sm btn-primary">Create</router-link>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <th style="width:100px">Sl</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th style="width:150px;" class="text-end">Action</th>
                    </thead>
                    <tbody>
                        <tr v-for="(category, key) in categories" ::key="category.id">
                            <td style="width:100px">{{ key+1 }}</td>
                            <td>{{ category.name }}</td>
                            <td>{{ category.slug }}</td>
                            <td style="width:150px" class="text-end">
                                <router-link :to="{name: 'CategoryEdit',params:{id:category.id}}" class="btn btn-sm btn-info me-2">Edit</router-link>
                                <a @click.prevent="deleteCategory(category.id)" href="" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import { toast } from 'vue3-toastify';
export default {
    data() {
        return {
            categories: [],
        }
    },
    methods: {
        showCategories (){
            axios.get('/api/category').then(response => {
                this.categories = response.data;
            });
        },
        deleteCategory(id){
            axios.delete(`api/category/${id}`)
            .then(() => {
                toast.success('Category Deleted successfully!',{
                    autoClose:3000,
                });
                this.showCategories();
            });
            // this.categories.find(element => element > )
        }
    },
    mounted() {
        this.showCategories();
    },
}
</script>
<style lang="">
    
</style>