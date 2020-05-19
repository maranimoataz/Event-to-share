<template>
    <div>
   <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="user in users" :key="user.id">
      <th scope="row">3</th>
      <td>{{user.name}}</td>
      <td>{{user.email}}</td>
      </tr>
  </tbody>
</table>
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
            axios.get('http://127.0.0.1:8000/api/user/profile')
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