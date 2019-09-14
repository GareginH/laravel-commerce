<template>
<div>
    <image-carousel class="shadow-dark"></image-carousel>
  <div class="bg-color-white pb-0">
        <div class="mb-3"></div>
        <div class="md-form row">
            <h4 class="text-uppercase color col-10">Latest</h4>
        </div>    
        <div class="row dash-content pb-5">
            <div v-for="(item, index) in products" :key="index" class="col-md-3">
                
                    <div class="product-card">
                        <a :href="'/' + item.id">
                        <div class="product-card-img" v-bind:style="{ backgroundImage: 'url(' + item.Image + ')' }">
                
                        </div>
                         <div class="product-card-name">
                            {{item.Title}}
                        </div>
                        </a>
                        <div class="product-card-info row m-0 justify-content-around align-items-center">
                            <span class="p-2 col-4">${{item.Price}}</span>
                            <add-to-cart-btn :product=item.id class="col-6 p-0"></add-to-cart-btn>
                        </div>
                    </div>  
            </div>
      </div>
</div>
</div>
</template>

<script>
    export default {
        data(){
            return{
                products:[],
            }
        },
        mounted() {
             axios.post('/latest').then(response=>
             {
                this.products = response.data.data;
            })
        },
    }
</script>
<style scoped>
.color{
    color:  #8d6a9f;
}
.text-main{
    color:  #8d6a9f;
}
a{
    text-decoration: none;
}
.btn-main{
    color: #8d6a9f;
    border: #8d6a9f 1px solid;
    height: max-content;
}
.btn-main:hover{
    color: #eee;
    background: #8d6a9f;
}
.bg-color-white{
    background: #ffffff;
    padding: 5%;
    padding-top: 2%;
    box-shadow: 1px 1px 15px 1px rgba(0,0,0,0.35);
}
.shadow-dark{
    box-shadow: 1px 1px 15px 1px rgba(0,0,0,0.35);
}
</style>