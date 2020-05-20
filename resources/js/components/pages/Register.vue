<template>
<div class="container">
    <form autocomplete="off" @submit.prevent="onSubmit">
     <div class="alert alert-danger" v-if="errors.length">
        <ul class="mb-0">
            <li v-for="(error, index) in errors" :key="index"> {{ error }}</li>
        </ul>
        </div>
     <div class="form-group">
            <label for="first_name"> Enter your name </label><span style="color: red !important; display: inline; float: none;">*</span> 
            <input type="text" class="form-control" placeholder="first-name" v-model="name" >
                </div>
                 <br />
                 <label for="Email"> Enter your Email </label><span style="color: red !important; display: inline; float: none;">*</span> 
                <input type="Email" class="form-control" id="exampleInputEmail1" placeholder="Email" v-model="email">
                 <br />
             <label for="password"> Enter your password </label><span style="color: red !important; display: inline; float: none;">*</span> <br />
             <input type="password" class="form-control" id="password" placeholder="password" v-model="password">
             <br />
                <center> <button  type="submit" class="btn btn-primary">Register   </button></center>
                </form>
</div>
</template>

<script>
import axios from 'axios'

export default {
    data () {
        return {
            name : '',
            email : '',
            password : '',
            errors : []
        }
    },
    methods: {
        onSubmit() {
            this.errors = [];

            if(!this.name) 
            {
                this.errors.push('the name is required')
            }
            if(!this.email) 
            {
                this.errors.push('the email is required')
            }
            if(!this.password) 
            {
                this.errors.push('the password is required')
            }

             if(!this.errors.length)
            {
                const data = {
                    name : this.name,
                    email : this.email,
                    password : this.password,
                }
                 axios.post('http://127.0.0.1:8000/api/register',data).then((res) => {
                    console.log(res)
                   this.$router.push({ name: 'login' });
                   }).catch(error => {
                    this.errors.push(error.response.data.error);
                })
        }
    }
}
}
</script>