<template>
  <div class="mt-5">
    <h4 class="p-0 pt-4" v-if="categories">Current Categories</h4>
    <div class="d-flex flex-column">
        <div v-for="(item, index) in categories" :key="index" class="row mb-2">
            <div class="col-10">{{item.name}}</div>
            <div class="col-2 text-right"><b-button :id="index" variant="main" v-on:click="deleteCategory(item.id, index)" v-b-popover.hover.left="'Delete category'">X</b-button></div>
        </div>
    </div>
  </div>
</template>

<script>
    export default {
        data(){
            return{
                categories:null,
            }
        },
        mounted() 
        {
            axios.post('/categories').then(response=>
            {
                (response.data.length > 0) ? this.categories = response.data: null;
            })
        },
        methods:
        {
            deleteCategory(id, index){
                axios.delete('/admin/category/'+id,).then(response=>{
                    this.$delete(this.categories, index);
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