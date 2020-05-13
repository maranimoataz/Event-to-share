<template>
<div>
    this is listing for events
</div>
</template>
<script>
import axios from 'axios'
export default {
    data() {
        return {
            title : '',
            type: '',
            image: '',
            location : '',
            description : '',
            date : '',
            start_time :'',
            end_time :'',
            email : '',
            first_name : '',
            last_name : '',    
        }
    },
    methods : {
        fetchdata(){
            axios.get('http://127.0.0.1:8000/api/event').then((res) => {
                console.log(res)
            })
        }
    }
}
</script>