<template>
  <div>
    <b-carousel
    id="carousel-fade"
    style="text-shadow: 0px 0px 2px #000"
    fade
    indicators
    img-width="1024"
    img-height="480"
  >
    <b-carousel-slide
      img-src="http://www.fiveous.com/wp-content/uploads/2013/09/Bolt.jpg"
    ></b-carousel-slide>
    <b-carousel-slide
      img-src="https://i.ytimg.com/vi/uKmc9iEi3R8/maxresdefault.jpg"
    ></b-carousel-slide>
    <b-carousel-slide

      img-src="https://picsum.photos/1024/480/?image=22"
    ></b-carousel-slide>
  </b-carousel>
  </div>
</template>

<script>
  export default {
    data() {
      return {
        slide: 0,
        sliding: null
      }
    },
    methods: {
      onSlideStart(slide) {
        this.sliding = true
      },
      onSlideEnd(slide) {
        this.sliding = false
      }
    }
  }
</script>
<style>
#carousel-fade img{
  height: 400px!important;
}
</style>