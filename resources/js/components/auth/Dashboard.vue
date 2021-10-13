<template>
    <div>
        <h1>Dashboard</h1>
       Name {{ user.name }} <br>
       Email {{ user.email }}

       <button @click.prevent="logout" class="logout">Logout</button>
    </div>
</template>
<script>
export default {
     data(){
        return{
            user: null,
        }
    },
    methods:{
        logout(){
            axios.post('/api/logout')
            .then(()=>{
                this.$router.push({name: 'Home'});
            }).catch((error) => {
                console.log(error);
            })
        }
    },

    //get logged in user details
    mounted(){
        axios.get('/api/user')
        .then((res) => {
            this.user = res.data;
     
        });
            
    }
}
</script>