<template>
  <nav aria-label="Page navigation example">
    <ul class="pagination">
      <li role="button" v-show="pagination.currentPage > 1" class="page-item"><a class="page-link" href="#" @click="$emit( 'page-change',  pagination.currentPage - 1)">Previous</a></li>
      <li role="button" class="page-item" v-for="page in pagination.lastPage" :key="page.id" @click="$emit('page-change', page)">
        <a class="page-link" href="#">{{page}}</a>
      </li>
      <li role="button" v-show="pagination.lastPage > pagination.currentPage" class="page-item"><a class="page-link" href="#" @click="$emit( 'page-change',  pagination.currentPage + 1)">Next</a></li>
    </ul>
  </nav>
</template>

<script>
export default{
  name: "PaginationComp",
  props: [
    'pagination',
  ]
}
</script>

<style lang="scss" scoped>

</style>