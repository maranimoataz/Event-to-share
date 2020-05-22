<template>
<div>
  <div class="nav">
      <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #6495ED;">
      <div >
        <a class="navbar-brand" href="#"><h1><b>Display events </b></h1></a>
      </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
            <router-link class="nav-item nav-link" to="Home">Home </router-link>
            <router-link class="nav-item nav-link" to="help">Help</router-link>

                    <router-view></router-view>
            </div>
        </div>
        </nav>
  </div>
  <div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
         &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-1" type="search" placeholder="Search an event..." aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>  
</div>
<br />
  <div class="container">
    <div class="row justify-content-center">
    <div  class="col-md-8">

    </div>
    <div  class="col-md-8">
      <div class="container">
      <div v-for="event in events" v-bind:key="event.id">
        <label><b> The title of the event</b></label>
        <span >{{event.title}}</span>
        <br />
        <label><b> The type of the event</b></label>
        <span>{{event.type}}</span>
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
        <hr width="75%">
      </div>
      </div>
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
.nav{
  width: 100%;
  height :300%;
  color: #6495ED;
}
</style>