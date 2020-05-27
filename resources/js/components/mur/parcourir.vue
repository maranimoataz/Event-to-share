<template>
<div class="container">
<h2> Parcourir les évènenments par </h2>
    <div class="flex-container">
     <button class="button">
       <b class="text"> Art </b>
     </button>
     <button class="button">
       <b class="text"> Musique </b>   
     </button>
     <button class="button">
        <b class="text"> Science et technologie </b>
     </button>
     <button class="button">
        <b class="text"> Sport </b>
     </button>
     <button class="button">
       <b class="text"> Culture </b>
     </button>
    </div>
      <hr width="75%">
    </div>
</template>
<script>
export default {
    data () {
        return {

        }
    }
}
</script>
<style scoped>
.flex-container {
  display: flex;
  flex-wrap: nowrap;
  text-align : center;
}
.flex-container > button {
  background-color: #A9A9A9;
  width: 300px;
  height :130px;
  margin: 10px;
  text-align: center;
  line-height: 75px;
  font-size: 30px;
}
.button {
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline:none;
  background-color: black;
  border: none;
  border-radius: 15px;
}
.button:hover {background-color: #808080}

.button:active {
  background-color: rgb(29, 27, 27);
  transform: translateY(4px);
}
.text {
  color : black;
}

</style>