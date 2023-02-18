<template>
  <div>
    <button type="button" class="btn btn-danger" v-on:click="logout">Logout</button>
  </div>

</template>
<script>

export default {
data() {
    return {

    }
},mounted() {},
methods:{
        logout(){
          // window.axios.defaults.headers.common['Authorization'] = localStorage.getItem("token");;

        axios.get("http://127.0.0.1:8000/api/logoutAll",{
  headers: {
    'Content-Type': 'multipart/form-data',
    'Authorization': localStorage.getItem("token")
  }
}).then((response) => {
                    localStorage.removeItem("token");
                    localStorage.removeItem("type");
                    this.$emit('logout',false)
                    this.$router.replace('/')
                }).catch((error) => console.log(error)); } 

                  

              
              },
    
};
</script>



