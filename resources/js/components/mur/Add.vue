<template>
    <div >
    <form @submit="onUpload" enctype="multipart/form-data">
    <div class="alert alert-danger" v-if="errors.length">
        <ul class="mb-0">
            <li v-for="(error, index) in errors" :key="index"> {{ error }}</li>
        </ul>
        </div>
    <input type="title" for="title" placeholder="title" v-model="title">
    <br />
    <br />
    <input type="type" for="type" placeholder="type" v-model="type">
    <br />
    <input type="file" placeholder="choose image" v-on:change="onImageChange">
    <br />
    <input type="location" for="location" placeholder="location" v-model="location">
    <br />
    <br />
    <textarea type="description" placeholder="description" v-model="description"></textarea>
    <br />
    <input type="date" placeholder="date" v-model="date">
    <br />
    <input type="time" placeholder="start time" v-model="start_time">
    <br />
    <input type="time" placeholder="end time" v-model="end_time">
    <br />
    <input type="email" placeholder="email" v-model="email">
    <br />
    <input type="first_name" placeholder="first name" v-model="first_name">
    <br />
    <input type="last_name" placeholder="last name" v-model="last_name">
    <br />
              <center> <button  type="submit" class="btn btn-primary" value="Upload">Enregister </button></center>
    </form>
    </div>
</template>

<script>
import { Form, HasError, AlertError } from 'vform'
import axios from 'axios'
export default {
    data () {
        return  {
            title : '',
            type : '',
            image: '',
            location :'',
            description : '',
            date:'',
            start_time:'',
            end_time :'',
            email:'',
            first_name: '',
            last_name:'',
            errors : []
        }
    },
    methods : {
       onImageChange(e) {
                 console.log(e.target.files[0]);
                 this.filename = "Selected File: " + e.target.files[0].name;
                 this.image = e.target.files[0];
            },
      onUpload(e){
               e.preventDefault();
                let currentObj = this;
                const data = {
                   title : this.title,
                   type : this.type,
                   location : this.location,
                    description : this.description,
                    date : this.date,
                    start_time : this.start_time,
                    end_time : this.end_time,
                    email : this.email,
                    first_name: this.first_name,
                    last_name : this.last_name,
                }
                let formData = new FormData();
                formData.append('image',this.image);

            axios.post('http://127.0.0.1:8000/api/event', formData, data).then((res) => {
                 console.log(res)
                this.$router.push({ name: 'listing' });
                console.log('réussi')
                 }).catch(error => {
                    console.log(error.response.data.error);
                })
            }
        }
    }

</script>


<style >
.wrapper{
	height:100vh;
	width:100x;
	display:flex;
	flex-direction: column;
	justify-content:center;
	align-items:center;
	background: #ffffff;
	text-align: center;
}
.form-wrapper {
	width :900px;
	height: 100%;
	display :flex;
	flex-direction:column;
	padding:20px 40px;
	border-radius:10px;
	box-shadow:0px 10px 50px #555;
	background-color :#ffffff;
}
.format{
	width:100%;
	height: 100%;
}
.form-control{
    width:100%;
    height:100%;
}
.img1{
    width: 50%;
    height :50%;
}
.loc{
    text-align: left;
}
.textarea{

    width:100%;
    height:300%;
}
</style>