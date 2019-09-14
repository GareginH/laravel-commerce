<template>
  <div class="mt-5">
    <h2 class="p-0">Current Categories</h2>
    <div class="row">
        <div v-for="(item, index) in categories" :key="index" class="col">
            {{item.name}}
            <b-button variant="main" v-on:click="deleteCategory(item.id)">X</b-button>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        data(){
            return{
                categories:[],
            }
        },
        mounted() {
            axios.post('/categories').then(response=>
            {
                this.categories = response.data;   
            })
        },
        methods:{
            deleteCategory(id){
                axios.delete('/admin/category/'+id,).then(response=>{
                })
            }
        }
    }
</script>
<style scoped>
.btn-main{
    height: max-content;
    color: #8d6a9f;
    border: #8d6a9f 1px solid;
}
.btn-main:hover{
    height: max-content;
    color: #eee;
    background: #8d6a9f;
}
</style>