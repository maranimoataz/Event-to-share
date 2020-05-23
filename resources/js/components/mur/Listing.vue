<template>
<div>
  <navbar />
<br />
  <div class="container">
    <div class="format">
    <div class="row justify-content-center">
    <div  class="col-md-8">
      <div class="container">
      <div v-for="event in events" v-bind:key="event.id">
        <div class="wrapper">
        <div class="form-wrapper">
        <navbarhd />
        <label><b> The title of the event</b></label>
        <span >{{event.title}}</span>
        <div class="image">
        <Slider />
        </div>  
        <br />
        <hr width="75%">
        <br />
        <br />
        <br />
      </div>
      </div>
      <br />
      <br />
      </div>
      </div>
    </div>
    </div>
  </div>
</div>
</div>
</template>
<script>
import Slider from './Slider'
import navbar from './navbar-li'
import navbarhd from './navbar-header'
export default {
  components : {Slider, navbar, navbarhd},
  data() {
        return {
           events : [],

        }
      },
      mounted() {
        this.getEvents();
      },
      methods : {
        getEvents(){
          axios.get('http://127.0.0.1:8000/api/event')
            .then(response => {
              this.events = response.data;
            })
              .catch(error => {
                console.log('error')
              })
          }
        }
      }
</script>

<style >
.image{
  width:20%;
  height:20%;
}
.avatar {
  vertical-align: middle;
  width: 10px;
  height: 10px;
  border-radius: 10%;
}
.button{
  width: 10%;
  height :10%;
  color: #ffffff;
}
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
</style>