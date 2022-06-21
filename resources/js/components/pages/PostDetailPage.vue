<template>
  <div>
    <LoaderComp v-if="isLoading"/>
    <h1 v-else>post detail page: {{post.title}}</h1>
  </div>
</template>

<script>
import LoaderComp from '../LoaderComp.vue';
import axios from 'axios';

export default{
  name: 'PostDetailPage',
  components: {
    LoaderComp,
  },
  data(){
    return{
      isLoading: true,
      post: [],
    }
  },
  methods: {
    getPost(){
      axios.get(`http://127.0.0.1:8000/api/posts/${this.$route.params.slug}`)
          .then((res) => {
            console.log(res.data);

            // const {data} = res.data.posts;
            this.post = res.data;

          }).then(()=>{
            this.isLoading = false;
          })
    }
  },
  mounted(){
    this.getPost();
    console.log(this.post);
  }
}
</script>

<style lang="scss" scoped>

</style>