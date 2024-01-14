<template lang="">
    <div class="container">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Create Category</h5>
                <router-link :to="{name: 'CategoryIndex'}" class="btn btn-sm btn-primary">Category List</router-link>
            </div>
            <div class="card-body">
                <form @submit.prevent="createCategory">
                    <!-- <AlertError :form="form" /> -->
                    <!-- <AlertSuccess :form="form" message="Create Success!" /> -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input id="name" type="text" v-model="form.name" :class="{'is-invalid' : form.errors.has('name')}" name="name" class="form-control" placeholder="Name">

                        <HasError :form="form" field="name" />

                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Add</button>
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
        createCategory(){
            // axios.post('/api/category',{name: this.name}).then(response => {
            //     console.log(response);
            //     this.name = '';
            // });

            this.form.post('/api/category')
            .then(({ data }) => {
                this.form.name = '';
                toast.success('Category created successfully!',{
                    autoClose:3000,
                });
            });
        }
    }
}
</script>
<style lang="">
    
</style>