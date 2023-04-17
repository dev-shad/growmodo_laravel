<template>
  <div class="notification">{{ notification }}</div>
  <form @submit.prevent="login()">
    <input type="email" placeholder="email" v-model="email" />
    <input type="password" placeholder="password" v-model="password" />
    <input type="submit" value="submit" />
    <a href="/register"> Register </a>
  </form>
</template>
<script lang='ts'>
  import { defineComponent } from 'vue';
  import axios from 'axios';
  const client = axios.create({
    baseURL : 'http://localhost:8000/api',
    headers: {
      'Accept' : 'application/json'
    }
  });
  
  export default defineComponent({
    data ()  {
      return {
        email: '',
        password: '',
        notification: localStorage.notification
      }
    },
    methods: {
      
      login () {
        
        client.post('/login', {
          email : this.email,
          password: this.password
        })
                .then(response => {
                  console.log(response)
                  if(response.status == 200){
                    localStorage.setItem("token",response.data.token)
                    localStorage.setItem("role",response.data.role)
                    localStorage.setItem("username",response.data.username)
                    localStorage.setItem("userId",response.data.userId)
                    
                    this.$router.push({
                      path:'/home'
                    })
                  }
                  
                })
                        .catch(error => {                         
                          console.log(error)
                        })
      }
    }
  })
</script>