<template>
    <div>
        <div class="container">
            
            <div class="row">
                <div class="col-md-6 mx-auto shadow" id="register-box">
                    <div class="alert alert-danger" v-if="errors.error" >
                        <span v-for="(error, index) in errors" :key="index"> {{ error }}</span>
                       
                    </div>
                    <h3 class="mb-3">Login</h3>
                     

                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" v-model="form.email" placeholder="Enter Email">

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" v-model="form.password" placeholder="Enter Password">
                    </div>

                    

                    <button @click.prevent="loginUser()" type="submit" class="btn btn-info text-light">Login </button>
                    
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
     data(){
        return{
           form:{
              
               email: '',
               password: '',
             
           } ,
           errors:[]
        }
    },
    methods: {
         loginUser(){
            axios.post('/api/login', this.form)
            .then(() => {
                this.$router.push({name: 'Dashboard'});
            })
            .catch((error) => {
                this.errors = error.response.data.errors
            })
        }
    
    }
       
}
</script>