<template>
  <div>
    <nav>
      <ul>
        <li><router-link :to="{name: 'home'}">Home</router-link></li>
        <li><router-link :to="{name: 'contact'}">Contacts</router-link></li>
        <li><a href="/admin">Admin</a></li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default{
  name: "HeaderComp",
  components: {

  }
}
</script>

<style>
</style>