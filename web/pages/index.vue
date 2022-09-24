<template>
<h1 class="title">Hello {{name}}</h1>
</template>
<script>
export default{
  computed:{
    name(){
      return this.$auth.loggedIn?this.$auth.user.name:'there'
    }
  }
}

</script>