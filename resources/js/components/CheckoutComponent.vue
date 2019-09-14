<template>
  <div>
    <b-card title="Fill out the form">
        <div v-if="value==0">
            <b-badge>Step 1</b-badge>
            <b-form-input v-model="info.name" placeholder="Enter your name" class="mt-3" :state="nameState"></b-form-input>
            <b-form-input v-model="info.email" placeholder="Enter your email" class="mt-3" :state="emailState"></b-form-input>
        </div>
        <div v-if="value==1">
            <b-badge>Step 2</b-badge>
            <b-form-input v-model="info.address" placeholder="Enter your address" class="mt-3" :state="addressState"></b-form-input>
            <b-form-input v-model="info.phone" placeholder="Enter your phone number" class="mt-3" :state="phoneState"></b-form-input>
        </div>
        <div v-if="value==2">
            <b-badge>Step 3</b-badge>
            <b-form-input v-model="card.name" placeholder="Enter the cardholder name" class="mt-3" :state="cardNameState"></b-form-input>
            <b-form-input v-model="card.number" placeholder="Enter the degit card numbers" class="mt-3" :state="cardNumberState"></b-form-input>
            <b-form-input v-model="card.code" placeholder="Enter the security code on the back of your card" class="mt-3    " :state="cardCodeState"></b-form-input>
        </div>
        <div v-if="value==3">
           <b-alert variant="success" show>Thank you for your purchase, you will be redirected in 3 seconds</b-alert>

        </div>
        <b-button variant="main" v-on:click="nextPage()" class="mt-2 float-right">Next</b-button>
        <b-button v-if="this.value > 0" variant="main" v-on:click="prevPage()" class="mt-2 float-right">Go back</b-button>
    </b-card>
    <b-progress :value="value" :max="max" class="mb-3"></b-progress> 
  </div>
</template>

<script>
    export default {
        computed:{
            nameState() {
                var re = /^([a-zA-Z]{3,15})$/;
                return re.test(this.info.name) ? true : false
            },
            emailState() {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(this.info.email) ? true : false
            },
            addressState() {
                var re = /^([a-zA-Z]{3,20})$/;
                return re.test(this.info.address) ? true : false
            },
            phoneState() {
                var re = /^([0-9]{8,20})$/;
                return re.test(this.info.phone) ? true : false
            },
            cardNameState() {
                return this.card.name.length > 2 ? true : false
            },
            cardNumberState() {
                return this.card.number.length > 2 ? true : false
            },
            cardCodeState() {
                return this.card.code.length > 2 ? true : false
            },

        },
        data(){
            return{
                info:{
                    name:"",
                    email:"",
                    address:"",
                    phone:"",
                },
                card:{
                    name:"",
                    number:"",
                    code:"",
                },
                text:"",
                max: 3,
                value: 0,
            }
            
        },
        mounted() {

        },
        methods:{
            prevPage(){
                if(this.value > 0){
                    this.value-=1;
                }
            },
           nextPage(){
               if(this.value == 0){
                    if(this.nameState && this.emailState)
                    {
                        this.value+=1;
                    }
               }
               else if(this.value == 1){
                   if(this.addressState && this.phoneState)
                    {
                        this.value+=1;
                    }
               }
                else if(this.value == 2){
                    if(this.cardNameState && this.cardCodeState && this.cardNumberState)
                    {
                        axios.post('/checkout', {Info:this.info, Card:this.card}).then(response=>
                        {
                            this.value+=1;
                            setTimeout(function(){
                                    window.location.href = "/";
                                }, 3000);
                            })
                        }
                    }  
                }
        }
    }
</script>