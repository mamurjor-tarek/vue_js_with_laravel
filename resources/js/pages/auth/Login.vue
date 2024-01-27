<template lang="">
    <div>
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card border-0 shadow">
                        <div class="card-header bg-white">
                            Login
                        </div>
                        <div class="card-body">
                            <form action="" method="post" @submit.prevent="login()">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" v-model="form.email" name="email" id="email" class="form-control" placeholder="Your Email Here" :class="{'is-invalid' : form.errors.has('email')}">
                                     <HasError :form="form" field="email" />
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" v-model="form.password" name="password" id="password" class="form-control" placeholder="Your Password Here" :class="{'is-invalid' : form.errors.has('password')}"> 
                                     <HasError :form="form" field="password" />
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </div>
                            </form>
                        </div>
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
                email: '',
                password:''
            }),
        }
    },
    methods: {
        login(){
            axios.get('/sanctum/csrf-cookie').then(response => {
                this.form.post('/login').then(function (response) {
                    this.$router.push({name:'Dashboard'});

                    toast.success('Login successfully!',{
                        autoClose:3000,
                    });
                    this.getUserData();
                })
            });
        },
        getUserData(){
            axios.get('/api/user').then(response => {
                console.log(response.data);
            });
        }
    },
    mounted() {
        this.getUserData();
    },
}
</script>
<style lang="">
    
</style>