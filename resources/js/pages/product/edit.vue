<template lang="">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Product</h5>
                <router-link :to="{name: 'ProductIndex'}" class="btn btn-sm btn-primary">List</router-link>
            </div>
            <div class="card-body">
                <form @submit.prevent="updateProduct" enctype="multipart/form-data">
                    <!-- <AlertError :form="form" /> -->
                    <!-- <AlertSuccess :form="form" message="Create Success!" /> -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input id="title" type="text" v-model="form.title" :class="{'is-invalid' : form.errors.has('title')}" name="title" class="form-control" placeholder="Title">
                        <HasError :form="form" field="title" />
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input id="price" type="text" v-model="form.price" :class="{'is-invalid' : form.errors.has('price')}" name="price" class="form-control" placeholder="Price">
                        <HasError :form="form" field="price" />
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input id="image" type="file" :class="{'is-invalid' : form.errors.has('image')}" name="image" class="form-control" placeholder="Image" @change="handleFile">
                        <div class="mt-3">
                            <img style="width:100px;" :src="image" >
                        </div>
                        <HasError :form="form" field="image" />
                    </div>
                    
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" v-model="form.description" :class="{'is-invalid' : form.errors.has('description')}" name="description" class="form-control" placeholder="Description">
                        </textarea>
                        <HasError :form="form" field="description" />
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import Form from 'vform';
import { toast } from 'vue3-toastify';

export default {
    data() {
        return {
            form: new Form({
                title: '',
                price: '',
                image: null,
                description: '',
                _method: 'put',
            }),
            image: null
        }
    },
    methods: {
        handleFile (event) {
            const file = event.target.files[0];
            this.form.image = file;
        },
        editProduct(){
            let id = this.$route.params.id;
            axios.get(`/api/product/${id}/edit`).then(response => {
                this.form.title = response.data.title;
                this.form.price = response.data.price;
                this.form.description = response.data.description;
                this.image = `/${response.data.image}`;
            });
        },
        updateProduct(){
            let id = this.$route.params.id;
            this.form.post(`/api/product/${id}`)
            .then(({data}) => {
                toast.success('Product updated successfully!',{
                    autoClose:3000,
                });
                location.reload();
            });
        }
    },
    mounted() {
        this.editProduct();
    },
}
</script>
<style lang="">
    
</style>