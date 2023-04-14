<template>
  <main>
    <ul>
      <li v-for="item in items"
          :key="item.name">
        {{ item.name}}
      </li>
    </ul>
  </main>
</template>
<script lang='ts'>
  import { defineComponent } from 'vue';
  import axios from 'axios';
  
  export default defineComponent({
    data() {
      return {
        items : []
      }
    },
    created() {
      this.getList()
    },
    methods: {
      getList () {
        axios.get('http://localhost:8000/api/users/list')
                .then(response => {
                  console.log(response)
                  this.items = response.data;
                })
                        .catch(error => {
                          console.log(error)
                        })
      }
    }
  })
</script>
