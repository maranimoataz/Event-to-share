<template>
  <div class="container">
    <div class="row justify-content-center">
    <div  class="col-md-8">
      <strong>  Loading </strong>
      <button> <router-link to="profile"> profile</router-link></button>
      <router-view></router-view>
    </div>
    <div  class="col-md-8">
      <div v-for="event in events" v-bind:key="event.id">
        <label><b> The title of the event</b></label>
        <span >{{event.title}}</span>
        <br />
        <label><b> The type of the event</b></label>
        <span>{{event.type}}</span>
        <br />
        <label><b> The image of the event</b></label>
        <img :src="'image/event/'+ event.image" />
        <br />
        <label><b> The location of the event</b></label>
        <span>{{event.location}}</span>
        <br />
        <label><b> The description</b></label>
        <span>{{event.description}}</span>
        <br />
        <label><b> The date of the event</b></label>
        <span>{{event.date}}</span>
        <br />
        <label><b> The start time</b></label>
        <span>{{event.start_time}}</span>
        <br />
        <label><b> The end_time</b></label>
        <span>{{event.end_time}}</span>
        <br />
     <label><b> The email</b></label>
        <span>{{event.email}}</span>
        <br />
       <label><b> The first name</b></label>
        <span>{{event.first_name}}</span>
        <br />
        <label><b> The last name </b></label>
        <span>{{event.last_name}}</span>
      </div>
    </div>
    </div>
    </div>
</template>
<script>
export default {
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
          axios.get('http://127.0.0.1:8000/event')
            .then(response => {
              this.events = response.data;
            })
              .catch(error => {
                console.log('err')
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
</style>