<template>
  <div>
    <b-card title="Fill out the form">
        <b-form @submit.stop.prevent="onSubmit">
             <div v-if="step==0">
                <b-form-group id="example-input-group-1">
                    <b-badge>Step 1</b-badge>
                    <b-form-input name="name" v-model="$v.form.name.$model" placeholder="Enter your name" class="mt-3" :state="$v.form.name.$dirty ? !$v.form.name.$error : null"></b-form-input>
                    <b-form-input name="email" v-model="$v.form.email.$model" placeholder="Enter your email" class="mt-3" :state="$v.form.email.$dirty ? !$v.form.email.$error : null"></b-form-input>
                    <b-form-invalid-feedback id="input-1-live-feedback">
                    This is a required field and must not be empty.
                    </b-form-invalid-feedback>
                </b-form-group>
             </div>
            <div v-if="step==1">
                <b-form-group id="example-input-group-2">
                    <b-badge>Step 2</b-badge>
                    <b-form-input name="cardname" v-model="$v.cardForm.cardName.$model" placeholder="Enter the cardholders name" class="mt-3" :state="$v.cardForm.cardName.$dirty ? !$v.cardForm.cardName.$error : null"></b-form-input>
                    <b-form-input name="cardcode" v-model="$v.cardForm.cardCode.$model" placeholder="Enter the code on card" class="mt-3" :state="$v.cardForm.cardCode.$dirty ? !$v.cardForm.cardCode.$error : null"></b-form-input>
                    <b-form-invalid-feedback id="input-2-live-feedback">
                    This is a required field and must not be empty.
                    </b-form-invalid-feedback>
                </b-form-group>
            </div>
            <b-button variant="main" type="submit" class="mt-2 float-right" :disabled="curStep">Next</b-button>
        </b-form>
    </b-card>
    <b-progress :value="step" :max="max" class="mb-3"></b-progress> 
  </div>
</template>

<script>
import { validationMixin } from 'vuelidate'
  import { required, minLength, alpha, numeric } from 'vuelidate/lib/validators'

  export default {
    mixins: [validationMixin],
        data(){
            return{
                text:"",
                max: 3,
                step: 0,
                form: {
                    name: null,
                    email: null,
                },
                cardForm:{
                    cardName: null,
                    cardCode: null
                }
            }
            
        },
        validations: {
            form: {
                name: {
                    required,
                    alpha
                },
                email: {
                    required
                }
            },
            cardForm:{
                cardName: {
                    required,
                    alpha
                },
                cardCode: {
                    required,
                    numeric
                },
            }
        },
        computed:{
            curStep(){
                if(this.step == 0)
                return this.$v.form.$invalid
                else if(this.step == 1)
                return this.$v.cardForm.$invalid
            }
        },
        methods:{
            prevPage(){
                if(this.step > 0){
                    this.step-=1;
                }
            },
            onSubmit() {
                this.$v.form.$touch()
                if (this.$v.form.$anyError) {
                    return
                }
                if(this.step < 2){
                    this.step+=1;
                }
                else if(this.step == 2){
                    if(this.cardNameState && this.cardCodeState && this.cardNumberState)
                    {
                        axios.post('/checkout', {Info:this.info, Card:this.card}).then(response=>
                        {
                            this.step+=1;
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