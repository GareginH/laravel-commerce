<template>
  <div>
    <div class="md-form mt-3 bg-color-white mb-5">
        <h4 class="text-uppercase color">Categories</h4>
        <input class="form-control col-2" type="text" placeholder="Search all products" aria-label="Search" v-model="Search" @keyup.enter="filterProducts()">
        <div class="row dash-content pt-2">
            <b-tabs content-class="mt-3" class="col-lg-12" active-nav-item-class="font-weight-bold text-uppercase text-main">
                 <div v-for="(item, index) in categories" :key="index">
                    <b-tab :title=item.name @click="categorizeProducts(item.id)">
                         <div class="row dash-content pt-1">
                            <div v-for="(item, index) in categoryProducts" :key="index" class="col-md-3">
                                    <div class="product-card">
                                        <a :href="'/shop/' + item.id">
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
                    </b-tab>
                </div>
                <b-button variant="main" class="mt-4" v-on:click="loadMoreCatProducts()" v-if="categoryNextPage">More</b-button>
            </b-tabs>
        </div>
    </div>
</div>
</template>
<script>
    export default {

        data(){
            return{
                categoryNextPage:"",
                categories:[],
                categoryProducts:[],
                Search:"",
            }
        },
        mounted() {
            axios.post('/categories').then(response=>
            {
                this.categories = response.data;
                this.categorizeProducts(response.data[0].id)
                
            })
        },
        methods:{
            filterProducts(){
                axios.post('/vueShop', {Title:this.Search}).then(response=>
                {
                    if(this.Search != ""){
                        this.categoryProducts = response.data.data;
                        this.categoryNextPage = (response.data.next_page_url)?(response.data.next_page_url).split('http://commerce/')[1]:false;
                    }
                    else{
                        this.categoryProducts = response.data.data;
                        this.categoryNextPage = (response.data.next_page_url)?(response.data.next_page_url).split('http://commerce/')[1]:false;
                    }

                })
            },
            categorizeProducts(id){
                this.categoryProducts = [];
                axios.post('/category/'+id).then(response=>
                {
                    this.categoryProducts = response.data.data;
                    this.categoryNextPage = (response.data.next_page_url)?(response.data.next_page_url).split('http://commerce/')[1]:false;
                })
            },
            loadMoreCatProducts(){
                axios.post('/'+this.categoryNextPage).then(response=>
                {
                    response.data.data.forEach(element => {
                        this.categoryProducts.push(element);
                    });
                    this.categoryNextPage = (response.data.next_page_url)?(response.data.next_page_url).split('http://commerce/')[1]:false;
                })
            }
        }
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
}
.btn-main:hover{
    color: #eee;
    background: #8d6a9f;
}
.bg-color-white{
    background: #ffffff;
    padding: 5%;
    box-shadow: 1px 1px 15px 1px rgba(0,0,0,0.35);
}
</style>