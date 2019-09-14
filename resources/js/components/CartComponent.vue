<template>
  <div>
    <b-button variant="outline-light" v-on:click="getCart()"><font-awesome-icon icon="shopping-cart"/></b-button>
    <div v-if="modal" class="d-flex align-items-center justify-content-center modal-position">
        <div class="modal-outline modal-table-width p-2">
            <h2 v-if="products.length" class="pt-2 pb-2">Your cart
                <a href="/checkout">
                    <b-button variant="outline-light" class="float-right mt-2">Checkout</b-button>
                </a>
            </h2> 
            <h3 v-if="!products.length" class="pt-2 pb-2 text-center text-uppercase">Your cart is empty</h3>
            <table style="width:100%" v-if="products.length">
                <tr>
                    <th>Item</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th> </th>
                </tr>
                <tr v-for="(item, index) in products" :key="index">
                    <td>{{item[0].Title}}</td>
                    <td>${{item[0].Price}}</td>
                    <td>{{item[1]}}</td>
                    <td>${{(item[0].Price*item[1]).toFixed(2)}}</td>
                    <td><button class="btn btn-outline-light" v-on:click="removeItem(item[0].id)"><font-awesome-icon icon="trash"/></button></td>
                </tr>
            </table>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        data(){
            return{
                products:[],
                modal: false,
            }
        },
        mounted() {
            
        },
        methods:{
            getCart(){
                axios.post('/cart').then(response=>{
                    console.log();
                    if(response.data == "Cart is empty"){
                        this.products = [];
                    }
                    else{
                        this.products = response.data;
                    }
                })
                this.modal = !this.modal;
            },
            removeItem(id){
                 axios.delete('/cart/'+id, {itemId:id}).then(response=>{
                     this.modal = false;
                    this.getCart();
                })
            }
        }
    }
</script>

<style scoped>
    .modal-position{
        position: absolute;
        right: 0;
        top: 135%;
        z-index: 999;
    }
    .modal-table-width{
        width: 600px;
    }
    .modal-outline{
        border: 1px solid #8d6a9f;
        color: #eee;
        background: #8d6a9f;
        border-radius: 0 0 25px 25px;
    }
</style>