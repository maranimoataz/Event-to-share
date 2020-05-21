<template>
    <div >
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Image and text -->
    <div v-for="user in users" :key="user.id">
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
    <div class="avatar">
      <img src="'image/profile/mabrouk.jpeg" width="30" height="30" class="d-inline-block align-top" >
    </div>
      Bootstrap
    </a>
  </nav>
    <div class="frame">
    <div class="card">
      <img :src="'image/profile/mabrouk.jpeg'"  style="width:100%"/>
      <h1> {{user.user_name}} {{user.name}}</h1>
        <p class="title">Enseignant à l'Université Chouaib Eldoukkali</p>
  <p>Université Chouaib ElDoukkali</p>
   <div style="margin: 24px 0;">
    <a href="#"><i class="fa fa-dribbble"></i></a> 
    <a href="#"><i class="fa fa-twitter"></i></a>  
    <a href="#"><i class="fa fa-linkedin"></i></a>  
    <a href="#"><i class="fa fa-facebook"></i></a> 
  </div>
    <p><button>post events</button></p>
      </div>
    </div>
    </div>
    </div>
</template>
<script>
export default {
    data() {
        return {
            users : [],
        }
    },
    created() {
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios.get('http://127.0.0.1:8000/api/index')
            .then(response => {
               this.users = response.data;
            })
              .catch(error => {
                console.log('error')
              })
        }
    }
}
</script>
<style >
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}
button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

a {
  text-decoration: none;
  font-size: 22px;
  color: black;
}
.avatar {
  vertical-align: middle;
  width: 50px;
  height: 50px;
  border-radius: 50%;
}

.frame{
      width: 450px;
      height: 350px;
      margin: left;
      padding: 15px 25px;
      }
</style>