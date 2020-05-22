<template>
    <div >
    <div class="format">
    <div class="wrapper">
    <br />
    <br />
    <div class="form-wrapper">
    <form @submit="onUpload" enctype="multipart/form-data">
    <div class="alert alert-danger" v-if="errors.length">
        <ul class="mb-0">
            <li v-for="(error, index) in errors" :key="index"> {{ error }}</li>
        </ul>
        </div>
    <input type="text" for="title" placeholder="title" v-model="title" style="width:50%">
    <br />
    <br />
    <input type="text" for="type" placeholder="type" v-model="type" style="width:50%">
    <br />
    <br />
    <input type="text" for="location" placeholder="location" v-model="location" style="width:50%">
    <br />
    <br />
    <textarea type="text" placeholder="description" v-model="description" style="width:50%; border-bottom: 4px solid grey; " 
 ></textarea>
    <br />
    <br />
    <input type="date" placeholder="date" v-model="date" >
    <br />
    <br />
    <input type="time" placeholder="start time" v-model="start_time" >
    <br />
    <br />
    <input type="time" placeholder="end time" v-model="end_time" >
    <br />
    <br />
    <input type="text" placeholder="animateur" v-model="animateur" style="width:50%">
    <br />
    <br />
    <input type="email" placeholder="email_animateur" v-model="email_animateur" style="width:50%">
    <br />
    <br />
    <div >
              <center> <button  type="submit" class="btn btn-primary" value="Upload" style="width : 15%">Publier </button></center>
    <br />
    <br />
    </div>
    </form>
    </div>
    </div>
    </div>
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
            location :'',
            description : '',
            date:'',
            start_time:'',
            end_time :'',
            animateur:'',
            email_animateur: '',
            errors : []
        }
    },
    methods : {
      onUpload(e){
               e.preventDefault();
                let currentObj = this;
                    const data  = {
                    title : this.title,
                    type : this.type,
                    location : this.location,
                    description : this.description,
                    date : this.date,
                    start_time : this.start_time,
                    end_time : this.end_time,
                    animateur : this.animateur,
                    email_animateur : this.email_animateur,
                }

             axios.post('http://127.0.0.1:8000/api/event', data).then((res) => {
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

input {
    border: none;
    border-bottom: 4px solid grey;  
}
</style>