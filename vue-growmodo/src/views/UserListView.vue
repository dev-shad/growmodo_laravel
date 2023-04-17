<template>
  <main>
    <a href="/home" class="btn btn-primary">Back</a>
    <table class="table-auto">
      <tr>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
      </tr>
      <tr v-for="item in items"
          :key="item.name">
        <td>{{ item.name }}</td>
        <td>{{ item.email }}</td>
        <td>{{ item.phone }}</td>
      </tr>
    </table>
  </main>
</template>
<script lang='ts'>
  import { defineComponent } from 'vue';
  import axios from 'axios';
  const client = axios.create({
    baseURL : 'http://localhost:8000/api',
    headers: {
      'Accept' : 'application/json',
      'Authorization' : 'Bearer '+ localStorage.token
    }
  });
  
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
        client.get('/users/list')
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
