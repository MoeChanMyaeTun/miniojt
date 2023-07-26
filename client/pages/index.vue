<template>
   <h1 class="text-3xl font-bold underline">
        Hello world!
        {{kitchen}}
      </h1>
</template>

<script>
export default {
  name: 'IndexPage',
   async asyncData({$axios}){
  const kitchen = await $axios.$get('/kitchen')
  console.log(kitchen)
   return {kitchen}
 }
}
</script>
