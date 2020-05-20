<template>
    <div class="container">
     <form  v-on:submit.prevent="onSubmit">
     <div class="alert alert-danger" v-if="errors.length">
            <ul class="mb-0">
               <li v-for="(error, index) in errors" :key="index"> {{ error }}</li>
            </ul>
        </div>
        <label for="email"> Enter your Email </label><span style="color: red !important; display: inline; float: none;">*</span> 
         <input type="email" class="form-control" id="exampleInputEmail1" v-model="email">
         <br />
             <label for="password"> Enter your password </label><span style="color: red !important; display: inline; float: none;">*</span> <br />
             <input type="password" class="form-control" id="password" v-model="password">
             <br />
             <center> <button  type="submit" class="btn btn-primary">login   </button> </center>
    </form>
    </div>
</template>
<script>
import axios from 'axios'

export default {
     data() {
            return {
                email : '',
                password : '',
                errors: []
            };
        },
         methods: {
            onSubmit() {
                this.errors = [];
                if(!this.email) {
                    this.errors.push('email is required !');
                }
                if (!this.password){
                    this.errors.push('password is required !');
                }
                if (!this.errors.length) {
                    const data = {
                        email : this.email,
                        password : this.password
                    }
                     axios.post('http://127.0.0.1:8000/api/login',data).then((res) => {
                        console.log(res)
                        this.$router.push({ name: 'profile' });
                        }).catch(error => {
                            this.errors.push(error.response.data.error);
                        });
                }
            }
         }
    
}
</script>
