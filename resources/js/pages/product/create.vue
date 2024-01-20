<template lang="">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Create Product</h5>
                        <router-link :to="{name: 'ProductIndex'}" class="btn btn-sm btn-primary">Product List</router-link>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="createProduct" enctype="multipart/form-data">
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
                                <HasError :form="form" field="image" />
                            </div>
                            
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="description" v-model="form.description" :class="{'is-invalid' : form.errors.has('description')}" name="description" class="form-control" placeholder="Description">
                                </textarea>
                                <HasError :form="form" field="description" />
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-success">Add Product</button>
                            </div>
                        </form>
                    </div>
                </div>
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
            }),
        }
    },
    methods: {
        handleFile (event) {
            const file = event.target.files[0];
            this.form.image = file;
        },
        createProduct(){
            // axios.post('/api/Product',{name: this.name}).then(response => {
            //     console.log(response);
            //     this.name = '';
            // });

            this.form.post('/api/product').then(({ data }) => {
                this.form.title = '';
                this.form.price = '';
                this.form.image = null;
                this.form.description = '';
                toast.success('Product created successfully!',{
                    autoClose:3000,
                });
            });
        }
    }
}
</script>
<style lang="">
    
</style>