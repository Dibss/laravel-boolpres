<template>
  <div>

    <LoaderComp v-if="isLoading"/>

    <ul v-if="posts.length">
      <li v-for="post in posts" :key="post.id">
        <div class="card text-center">
          <div class="card-header font-weight-bold">
            {{post.title}}
          </div>
          <div class="card-body">
            <span>Category: {{post.category.label}}</span> 
            <!-- <h5 class="card-title">Special title treatment</h5> -->
            <p class="card-text" >{{post.description}}</p>
            <div>
              <button class="btn btn-primary"><router-link :to="{name: 'postDetail', params: {slug: post.slug}}">Details</router-link></button>
            </div>
            <div v-if="post.tags.length > 0" class="my-3">Tags: 
              <span v-for="tag in post.tags" :key="tag.id" :style="`background-color: ${tag.color}`" class="badge badge-pill">{{tag.label}}</span>
            </div>
            <div v-else>-</div>
          </div>
          <!-- <div class="card-footer text-muted">
            2 days ago
          </div> -->
        </div>
      </li>
    </ul>
    <p v-else>Non ci sono post</p>
    
    <PaginationComp :pagination="pagination" @page-change="getPosts"/>

  </div>
</template> 

<script>
import axios from 'axios';
import LoaderComp from '../../LoaderComp.vue';
import PaginationComp from '../../PaginationComp.vue';

export default{
  name: "PostListComp",
  components: {
    LoaderComp,
    PaginationComp,
},
  data(){
    return{
      posts: [],
      pagination: {},
      isLoading: true,
    }
  },
  methods: {
    getPosts(page =  1){
      axios.get('http://127.0.0.1:8000/api/posts?page=' + page)
          .then((res) => {
            console.log(res.data);

            const {data, current_page, last_page} = res.data.posts;

            this.posts = data;
            this.pagination = {
              lastPage: last_page,
              currentPage: current_page,
            }

          }).then(()=>{
            this.isLoading = false;
          })
    },
  },
  mounted(){
    this.getPosts();
  }
}
</script>

<style lang="scss" scoped>
.card{
  a{
    color: #fff;
  }
}
</style>