<template lang="">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Category</h5>
                <router-link :to="{name: 'CategoryIndex'}" class="btn btn-sm btn-primary">List</router-link>
            </div>
            <div class="card-body">
                <form @submit.prevent="updateCategory">
                    <!-- <AlertError :form="form" /> -->
                    <!-- <AlertSuccess :form="form" message="Create Success!" /> -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="form.name" :class="{'is-invalid' : form.errors.has('name')}" name="name" class="form-control" placeholder="Name">

                        <HasError :form="form" field="name" />

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
                name: '',
            }),
        }
    },
    methods: {
        editCategory(){
            let id = this.$route.params.id;
            axios.get(`/api/category/${id}/edit`).then(response => {
                this.form.name = response.data.name;
            });
        },
        updateCategory(){
            let id = this.$route.params.id;
            this.form.put(`/api/category/${id}`)
            .then(({data}) => {
                toast.success('Category updated successfully!',{
                    autoClose:3000,
                });
            });
        }
    },
    mounted() {
        this.editCategory();
    },
}
</script>
<style lang="">
    
</style>