<template>
  <main>
    Welcome, {{ username }}
    <button v-if="role == 'admin'" @click="viewRecords">View Records</button>
    <button @click="unsubcribe" v-if="!role" clickable>Unsubscribe</button>
    <button @click="logout" class="logout-btn">Logout</button>
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
    data ()  {
      
      return {
        username: localStorage.username,
        role: localStorage.role        
      }
    },
    created () {
      
      if(!localStorage.token){
        this.$router.push({
          path:'/'
        })
      }
    },
    methods:{
      logout(){
        localStorage.clear();
        this.$router.push({
          path:'/'
        })
      },
      unsubcribe() {
        client.delete('/unsubscribe/'+localStorage.userId).then(response => {
          
          if(response.status == 200 && response.data.status){
            this.$router.push({
              path:'/'
            })
          }
        }).catch(error => {
          console.log(error)
        })
      },
      viewRecords() {
        this.$router.push({
          path:'/user-list'
        })
      }
    }
   
  })
</script>