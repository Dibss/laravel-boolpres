<template>
  <div>
    <PostListComp/>
  </div>
</template>

<script>
import PostListComp from './posts/PostListComp.vue';

export default{
  name: "MainComp",
  components: {
    PostListComp,
  }
}
</script>

<style>
</style>