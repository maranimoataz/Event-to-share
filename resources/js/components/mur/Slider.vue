<template>
  <div class="example-3d">
    <swiper class="swiper" :options="swiperOption">
     <swiper-slide><img src="image/Slider/img6.jpg" class="image"></swiper-slide>
    <swiper-slide><img src="image/Slider/img7.jpg" class="image"></swiper-slide>
      <swiper-slide><img src="image/Slider/img2.jpg" class="image"></swiper-slide>
      <swiper-slide><img src="image/Slider/img3.jpg" class="image"></swiper-slide>
      <swiper-slide><img src="image/Slider/img4.jpg" class="image"></swiper-slide>
      <swiper-slide><img src="image/Slider/img5.jpg" class="image"></swiper-slide>
      <swiper-slide><img src="image/Slider/img1.jpg" class="image"></swiper-slide>
      <swiper-slide>Slide 7</swiper-slide>
      <div class="swiper-pagination" slot="pagination"></div>
    </swiper>
  </div>
</template>

<script>
  import { Swiper, SwiperSlide } from 'vue-awesome-swiper'
  import 'swiper/css/swiper.css'

  export default {
    name: 'swiper-example-3d-coverflow',
    title: '3D Coverflow effect',
    components: {
      Swiper,
      SwiperSlide
    },
    data() {
      return {
        swiperOption: {
          effect: 'coverflow',
          grabCursor: true,
          centeredSlides: true,
          slidesPerView: 'auto',
          coverflowEffect: {
            rotate: 50,
            stretch: 0,
            depth: 100,
            modifier: 1,
            slideShadows : true
          },
          pagination: {
            el: '.swiper-pagination'
          }
        }
      }
    }
  }
</script>

<style lang="scss" scoped>
  .example-3d {
    width: 500%;
    height: 500px;
    padding-top: 50px;
    padding-bottom: 50px;
  }

  .swiper {
    height: 100%;
    width: 100%;

    .swiper-slide {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 400px;
      height: 400px;
      text-align: center;
      font-weight: bold;
      background-color: #ffffff;
      background-position: center;
      background-size: cover;
      color: #ffffff;
    }

    .swiper-pagination {
      .swiper-pagination-bullet.swiper-pagination-bullet-active {
        background-color: #ffffff;
      }
    }
  }
.image {
    width : 150%;
    height : 100%;
}
</style>