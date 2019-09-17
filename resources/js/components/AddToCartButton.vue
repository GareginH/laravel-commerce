<template>
  <div>
    <b-button variant="main" size="sm" v-on:click="addToCart(product)"><font-awesome-icon icon="shopping-cart"/>Add to cart</b-button>
  </div>
</template>

<script>
    export default {
        props:['product'],
        data(){
            return{
                Quantity:1,
                Error:"",
            }
            
        },
        mounted() {
            //console.log(this.product);
        },
        methods:{
            addToCart(id){
                axios.post('/cart/'+id, {Qt:1}).then(response=>{
                    if(response.data === "Already in cart"){
                        this.Error = response.data;
                    }
                })
            }
        }
    }
</script>
<style scoped>
.btn-main{
    color: #8d6a9f;
    border: #8d6a9f 1px solid;
}
.btn-main:hover{
    color: #eee;
    background: #8d6a9f;
}
</style>