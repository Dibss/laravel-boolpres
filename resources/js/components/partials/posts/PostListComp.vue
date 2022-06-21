<template>
  <div>

    <LoaderComp v-if="isLoading"/>

    <ul v-if="posts.length">
      <li v-for="post in posts" :key="post.id">
        <div class="card">
          <h2>{{post.title}}</h2>
          <span>Category: {{post.category.label}}</span> 
          <div>
            <button><router-link :to="{name: 'postDetail', params: {id: post.id}}">Details</router-link></button>
          </div>
          <p>{{post.description}}</p>
          <div v-if="post.tags.length > 0">Tags: 
            <span v-for="tag in post.tags" :key="tag.id" :style="`background-color: ${tag.color}`">{{tag.label}}</span>
          </div>
          <div v-else>-</div>
        </div>
      </li>
    </ul> 
    <p v-else>Non ci sono post</p>
    
    <PaginationComp :pagination="pagination"/>

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
    getPosts(){
      axios.get('http://127.0.0.1:8000/api/posts')
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
  border: 2px solid #000;
  padding: 1em;
  margin: 1em 0;
  div{
    span{
      margin: 0 0.3em;
    }
  }
}
</style>