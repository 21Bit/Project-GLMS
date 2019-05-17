<template>
    <div>
        <h4 class="text-success">Login</h4>
        <br />
        <form id="loginFormModal" @submit.prevent="doLogin">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" ref="username" id="username" :class="{ failure: failed }" placeholder='username' required v-model="username" class="form-control rounded-0 input-md">
            </div>
            <br />
            <p>
                <label for="password">Password</label>
                <input type="password" :class="{ failure: failed }" id="password" placeholder='password' required v-model="password" class="form-control rounded-0 input-md">
            </p>
            <br />
            <p>
                <label for="remember_me_checkbox">
                    <input type="checkbox" id="remember_me_checkbox" name="remember_me" v-model="remember_me" value="" /> Remember me
                </label>
            </p>
            <button class="btn btn-success  mt-3" :disabled="connecting" type="submit"><i v-show="!connecting" class="fa fa-sign-in"></i> <i v-show="connecting" class="fa fa-spinner fa-spin"></i> Login</button>
            <br />
        </form>
        <p class="mt-3">
            Forgot your password? <a href="#">Click Here</a>
        </p>
            <div v-show="failed" class="alert alert-danger">
                No Account Found
            </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            username: '',
            password: '',
            remember_me: false,
            failed: false,
            connecting: false
        }
    },
    methods:{
        doLogin(){
            this.failed = false
            this.connecting = true
            axios.post('/login', {
                    username: this.username, password: this.password
                })
                .then( response => {
                    location.reload()
                })
                .catch( error => {
                   if(error.response.status == 422){
                      this.failed = true
                      this.password = ""
                      this.$refs.username.focus()
                   }
                })
            this.connecting = false
        }   
    }
}
</script>
<style lang="css">
     .failure{
         border: 1px solid red;
     }
</style>