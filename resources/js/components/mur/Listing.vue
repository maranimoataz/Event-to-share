<template>
    <div>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">title</th>
      <th scope="col">type</th>
      <th scope="col">image</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th v-for="event in events" :key="event.id"></th>
      <td>{{ event.title}}</td>
      <td>{{ event.type }}</td>
      <td>{{ event.image }}</td>
    </tr>
  </tbody>
</table>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    
    data () {
        return {
           event : [],
           events : {
           title : '',
           type : '',
           image : '',
           }
        }
    },
    methods : {
        getEvent: function() {
            var vm = this
            axios.get('http://127.0.0.1:8000/api/event')
            .then((response) => {
               console.log(response.data);
                vm.event = response.data.data;
            }).catch(function(error){
                console.log('error : ',error);
            }).then(function (){

            });
        }
    },
    mounted(){
        this.getEvent()
    }
}
</script>