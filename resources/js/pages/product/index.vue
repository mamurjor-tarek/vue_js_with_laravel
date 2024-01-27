<template lang="">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Products</h5>
                <router-link :to="{name: 'ProductCreate'}" class="btn btn-sm btn-primary">Create</router-link>
            </div>
            <div class="card-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <th style="width:100px">Sl</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th style="width:150px;" class="text-end">Action</th>
                    </thead>
                    <tbody v-if="products.length">
                        <tr v-for="(product, key) in products" :key="product.id">
                            <td style="width:100px">{{ key+1 }}</td>
                            <td>
                                <img style="width:100px;" :src="product.image" >
                            </td>
                            <td>{{ product.title }}</td>
                            <td>{{ product.price }}</td>
                            <td style="width:150px" class="text-end">
                                <router-link :to="{name: 'ProductEdit',params:{id:product.id}}" class="btn btn-sm btn-info me-2">Edit</router-link>
                                <a @click.prevent="productDelete(product.id)" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="5">
                                <h5 class="text-danger text-center">No Products Found!</h5>
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
            products: [],
        }
    },
    methods: {
        show (){
            axios.get('/api/product').then(response => {
                this.products = response.data;
            });
        },
        async productDelete(id){
            await axios.delete(`api/product/${id}`)
            .then(() => {
                toast.success('Product Deleted successfully!',{
                    autoClose:3000,
                });
                this.show();
            });
            // this.categories.find(element => element > )
        }
    },
    mounted() {
        this.show();
    },
}
</script>
<style lang="">
    
</style>