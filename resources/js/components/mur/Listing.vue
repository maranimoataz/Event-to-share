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
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
      
            <div class="dropdown">
            <span>Type </span>
            <div class="dropdown-content">
            <p>{{event.type}}</p>
            </div>
            </div>

      </li>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <li class="nav-item">
       
            <div class="dropdown">
            <span>Date</span>
            <div class="dropdown-content">
            <p>{{event.date}}</p>
            </div>
            </div>

      </li>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <li class="nav-item dropdown">
        
            <div class="dropdown">
            <span>the time </span>
            <div class="dropdown-content">
            <p>{{event.start_time}}</p>
            </div>
            </div>

      </li>
      &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <li class="nav-item">
        
        <div class="dropdown">
        <span>the end time</span>
        <div class="dropdown-content">
        <p>{{event.end_time}}</p>
        </div>
        </div>

          </li>
          &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
      <li class="nav-item">
        
        <div class="dropdown">
        <span>the location</span>
        <div class="dropdown-content">
        <p>{{event.location}}</p>
        </div>
        </div>

          </li>
        </ul>    
      </div>
    </nav>
    <br />
        <b><span >{{event.title}}</span></b>
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
    <div class="pagination">
      <button class="btn btn-default" v-on:click="fetchPaginateEvents(pagination.prev_page_url)" :disabled="!pagination.prev_page_url">
      <img src="image/image/left.png" style="width:50px; height:50px" />  </button>
       <button class="btn btn-default" v-on:click="fetchPaginateEvents(pagination.next_page_url)" :disabled="!pagination.next_page_url">
        <img src="image/image/right.png" style="width:50px; height:50px" />
      </button>
    </div>
</div>
</template>
<script>
import Slider from './Slider'
import navbar from './navbar-li'
export default {
  components : {Slider, navbar},
  data() {
        return {
           events : [],
           url : 'http://127.0.0.1:8000/api/event',
           pagination : []
        }
      },
      mounted() {
        this.getEvents();
      },
      methods : {
        getEvents(){
          let $this = this;
          axios.get(this.url)
            .then(response => {
              this.events = response.data.data
              $this.makePagination(response.data)
            })
              .catch(error => {
                console.log('error')
              })
          },
         makePagination(data) {
           let pagination = {
             current_page : data.current_page,
             last_page : data.last_page,
             next_page_url : data.next_page_url,
             prev_page_url : data.prev_page_url
           }
           this.pagination = pagination
         },
         fetchPaginateEvents(url) {
            this.url = url
            this.getEvents()
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

.searchBox {
    position: absolute;
    top: 50%;
    left: 50%;
    transform:  translate(-50%,50%);
    background: #2f3640;
    height: 40px;
    border-radius: 40px;
    padding: 10px;

}

.searchBox:hover > .searchInput {
    width: 240px;
    padding: 0 6px;
}

.searchBox:hover > .searchButton {
  background: white;
  color : #2f3640;
}

.searchButton {
    color: white;
    float: right;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: #2f3640;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: 0.4s;
}

.searchInput {
    border:none;
    background: none;
    outline:none;
    float:left;
    padding: 0;
    color: white;
    font-size: 16px;
    transition: 0.4s;
    line-height: 40px;
    width: 0px;

}

@media screen and (max-width: 620px) {
.searchBox:hover > .searchInput {
    width: 150px;
    padding: 0 6px;
}
}
</style>