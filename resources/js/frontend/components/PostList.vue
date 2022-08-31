<template>
<div>
    <div class="container">
    <div class="row row-cols-4">
      <div class="col" v-for="post in posts" :key="post.id">
        <div class="card altezzaCard mb-4" style="width: 15rem">
          <img class="card-img-top" :src=" post.cover_img" />
          <div class="card-body">
            <h5 class="card-title">{{post.title}}</h5>
            <p class="card-text altezzatesto overflow-auto">
              {{post.content}}
            </p>
              <router-link :to="{name: 'posts.show', params: {slug: post.slug }}" class="btn btn-primary">Vai al post</router-link>
            </div>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center">
        <Pagination :current-page="paginationData.current_page"
    :next-page="paginationData.current_page + 1" 
    :total-pages="paginationData.last_page"
    @changePage="onChangePage"></Pagination>
    </div>
    
  </div>

</div>
</template>

<script>
import axios from "axios";
import Pagination from "./Pagination.vue"

export default {
    components:{
        Pagination,
    },
  data() {
    return {
        posts: [],
        paginationData: {}

    };
  },
  methods: {
    fetchPosts(newPage = 1){
        axios.get("/api/posts?page=" + newPage)
        .then((resp)=> {
            this.posts = resp.data.data;
            this.paginationData = resp.data

        })
    },
    onChangePage(newPage){
        this.fetchPosts(newPage);
    }
  },
  mounted(){
    this.fetchPosts();
  },

};
</script>

<style>

.card-img-top{
    aspect-ratio: 16/9;
    object-fit: cover;
}
.altezzaCard{
    height: 450px;
}
.altezzatesto{
    max-height: 100px;
}

</style>
