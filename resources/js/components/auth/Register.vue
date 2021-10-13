<template>
    <div>
        <div class="container">
            <div class="row" >
                <div class="col-md-6 mx-auto shadow" id="register-box" >
                    <div v-if="Regstatus" class="alert alert-success">
                        {{ message }}
                    </div>
                    <h3>Register</h3>
                     <div class="form-group mt-5">
                        <label for="name">Name</label>
                        <input type="text" class="form-control"  v-model="form.name" placeholder="Enter name">
                        <!-- <small style="color:red" v-if="form.name.length < 4" >Invalid Entry</small>
                        <small style="color:green" v-else>Good</small> -->
                        <span class="text-danger text-sm" v-if="errors.name">{{errors.name[0]}}</span>
                    </div>

                    <div class="form-group ">
                        <label for="email">Email</label>
                        <input type="email" class="form-control"  v-model="form.email" placeholder="Enter Email">
                        <!-- <small style="color:red" v-if="form.email.length < 4" >Invalid Entry</small>
                        <small style="color:green" v-else>Good</small> -->
                         <span class="text-danger text-sm" v-if="errors.email">{{errors.email[0]}}</span>

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control"  v-model="form.password" placeholder="Enter Password">
                        <!-- <small style="color:red" v-if="form.password.length < 4" >Invalid Entry</small>
                        <small style="color:green" v-else>Good</small> -->
                         <span class="text-danger text-sm" v-if="errors.password">{{errors.password[0]}}</span>
                    </div>

                    <div class="form-group">
                        <label for="password">Password Confirm</label>
                        <input type="password" class="form-control"  v-model="form.password_confirmation" placeholder="Enter Password Confirmation">
                        <!-- <small style="color:red" v-if="form.password_confirmation.length < 4" >Invalid Entry</small>
                        <small style="color:green" v-else>Good</small> -->
                         <span class="text-danger text-sm" v-if="errors.password_confirmation">{{errors.password_confirmation[0]}}</span>
                    </div>

                    <button @click.prevent="registerUser" type="submit" class="btn btn-info text-light">Register </button>
                    
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
               name: '',
               email: '',
               password: '',
               password_confirmation: ''
           } ,
           errors:[],
           message: '',
           Regstatus: false
        }
    },
    methods:{
        registerUser(){
            axios.post('/api/register', this.form)
            .then(res => {
              if(res.status = 201){
                this.form = '';
                this.message = res.data;  
                this.Regstatus = true;
               
              }

            }).catch(error => {
                this.errors = error.response.data.errors;
            })
        },
        
    }
}
</script>
<style scoped>
.green-border{
    border: 2px solid green;
}
.red-border{
    border: 2px solid red;
}
.hide-submit-button{
    display: none;
}
</style>