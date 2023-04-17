<template>
  <form @submit.prevent="register()">
    <input v-model="username" type="text" placeholder="Username" />
    <input v-model="email" type="email" placeholder="Email Address" />
    <input v-model="phone" type="phone" placeholder="Phone Number" />
    <input v-model="password" type="password" placeholder="Password" />
    <input v-model="confirmed" type="password" placeholder="Confirm Password" />
    <input type="submit" value="submit" />
    <a href="/"> Back to Login </a>
  </form>
</template>
<script lang='ts'>
  import { defineComponent } from 'vue';
  import axios from 'axios';
  const client = axios.create({
    baseURL : 'http://localhost:8000/api',
    headers: {
      'Accept' : 'application/json',      
    }
  });
  
  export default defineComponent({
    data ()  {
      
      return {
        username: '',
        email: '',
        phone: '',
        password: '',
        confirmed: ''
      }
    },
    
    methods:{
      register() {
        client.put('/register',{
          username: this.username,
          email: this.email,
          phone: this.phone,
          password: this.password,
          confirmed: this.confirmed
        }).then(response => {
          console.log(response)
          if(response.status == 200){
            localStorage.setItem('notification',response.data.message)
            if(response.data.status){
              this.$router.push({
                path:'/'
              })
            }
          }
        }).catch(error => {
          console.log(error)
        })
               
      }
    }
   
  })
</script>