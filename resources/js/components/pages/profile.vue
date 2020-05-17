<template>
    <div>
    this is profile
    <div  class="col-md-8">
      <div v-for="user in users"  v-bind:key="user.id">
        {{user.name}}
        {{user.email}}
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
    mounted() {
        this.getUsers();
    },
    methods: {
        getUsers() {
            axios.get('http://127.0.0.1:8000/api/profile')
            .then(response => {
               console.log(response.data);
            })
              .catch(error => {
                console.log('err')
              })
        }
    }
}
</script>