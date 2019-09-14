<template>
  <div>
    <input type="number" min="0" value="1" step="1" v-model="Quantity" size="3">
    <b-button variant="main" v-on:click="addToCart()">Add To Cart</b-button>
    <br>
    <span v-text="Error"></span>
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
            addToCart(){
                axios.post('/cart/'+this.product, {Qt:this.Quantity}).then(response=>{
                    if(response.data === "Already in cart"){
                        this.Error = response.data;
                    }
                    
                })
            }
        }
    }
</script>
