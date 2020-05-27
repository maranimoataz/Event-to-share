<template>
<div>
     <div class="searchBox">
            <input class="searchInput" type="text" v-model="qry" v-on:keyup="autoComplete" placeholder="Search by Title of events">
            <div class="panel-footer" v-if="results.length"
            style="position:relative; z-index:1000; border:1px solid #ccc; background:#fff;">
                <p v-for="result in results" v-bind:key="result.id">
                <b>@{{ result.title }}</b>
                </p>
            </div>
            <button class="searchButton" href="#">
                <i class="material-icons"></i>
            </button>
        </div>
</div>
</template>
<script>
export default {
    data () {
    return {
      qry :'',
      results : [],
    }
  },
  methods : {
    autoComplete(){
      this.results = [];
      axios.post('http://127.0.0.1:8000/api/search' , {
        qry : this.qry
      })
      .then( (response) => {
        console.log(response);
        this.results = response.data;
      })
    }
  }
}
</script>
<style scoped>

.searchBox {
    position: absolute;
    top: 50%;
    left: 94%;
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