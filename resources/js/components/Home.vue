<template>
    <div>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Welcom </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
               &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;    &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;   &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
            <router-link class="nav-item nav-link" to="Login">Login </router-link>
            <router-link class="nav-item nav-link" to="register">Register </router-link>
           <router-link class="nav-item nav-link" to="image">image </router-link>

                    <router-view></router-view>
            </div>
        </div>
        </nav>
       <section>
            <div :style="image" class="image">     
            </div>
            <div class="zone">
            <button> <center><router-link to="add"><strong class="text">To share an event </strong></router-link></center></button>
            <router-view></router-view>
             </div>
         </section>
    </div>
</template>
<script>
    export default {
        name : "Home",
        data() {
            return {
                image: {backgroundImage: "url(image/img.gif)"},
            };
        }
    };
</script>

<style scoped lang="scss">
    .image{
        position: absolute;
        width: 1500px;
        height: 1500px;
        mix-blend-mode: multiply;
        border: 1px solid #4F4F4F;
        box-sizing: border-box;
        border-radius: 6px;
    }
    .text{
        position: absolute;
        width: 467px;
        height: 105px;

        font-family: Roboto;
        font-style: normal;
        font-weight: normal;
        font-size: 30px;
        line-height: 35px;
        display: flex;
        align-items: center;

        color: #FFFFFF;

        /* Gray 2 */

        border: 8px solid #4F4F4F;
    }
</style>