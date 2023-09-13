<template>
    <section>
        <div
         class="clearfix"
        >
          <nuxt-link
           v-for="(data,index) in datas"
          :key="index"
            to="#"
            class="px-8 my-5 float-left"
          >
            {{data.title}}
          </nuxt-link>
        </div>
        <hr class="bg-gray-200">
        <footer>
            <table>
                <tr>
                  <td class="w-48 text-center">name</td>
                  <td class="w-48">price</td>
                  <td class="text-right w-3/4">btn</td>
                </tr>
            </table>
        </footer>
    </section>     
</template>
<style>
   .clearfix::after {
    content: "";
    display: table;
    clear: both;
  }
</style>
<script>
export default {
  name: 'items',
  async asyncData({$axios}){
  const datas = await $axios.$get(`/item`)
  return {
    datas
  }
 },
}
</script>
