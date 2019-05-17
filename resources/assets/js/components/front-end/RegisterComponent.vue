<template>
    <div>
        <h4 class="text-success">Register</h4>
        <p class="m-b-30 f-s-13">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur lobortis tortor justo, elementum volutpat ante porta eu. 
        </p>
        <form class="form-horizontal" name="contact_us_form" @submit.prevent="doSubmit" method="POST">
            <div class="form-group">
                <label class="control-label col-md-3">Name <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input type="text" v-model="name" class="form-control"  name="name" required />
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Email <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input type="text" :class="{hasErro: register_errors.email}" v-model="email" class="form-control border-danger" name="email" required />
                    <small class="text-danger" v-if="register_errors.email">{{ register_errors.email[0] }}</small>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Gender <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <select name="gender" v-model="gender" id="" class="form-control">
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
            <hr>
            <div class="form-group">
                <label class="control-label col-md-3">Username <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input type="text"  :class="{hasErro: register_errors.username}" v-model="username" class="form-control" name="subject" requried />
                    <small class="text-danger" v-if="register_errors.username">{{ register_errors.username[0] }}</small>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Password <span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input type="password" :class="{hasErro: register_errors.password}" min="6" v-model="password" required class="form-control" name="subject" />
                    <small class="text-danger" v-if="register_errors.password">{{ register_errors.password[0] }}</small>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3">Confirm<span class="text-danger">*</span></label>
                <div class="col-md-7">
                    <input type="password" :class="{hasErro: register_errors.password}" min="6" v-model="password_confirmation" required class="form-control" name="password_confirmation" />
                    <small class="text-danger" v-if="register_errors.password">{{ register_errors.password[0] }}</small>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3"></label>
                <div class="col-md-7">
                    <button type="submit" class="btn btn-inverse">Submit</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
export default {
    data(){
        return{
            name: '',
            email: '',
            gender: 'Male',
            username: '',
            password: '',
            password_confirmation:'',
            register_errors: []
        }
    },
    methods:{
        doSubmit(){
            axios.post('/register',{
                name: this.name,
                email:this.email,
                username: this.username,
                password: this.password,
                gender: this.gender,
                password_confirmation: this.password_confirmation,
                type: 'student'
            })
            .then( response => {
                var stat = response.status
                if(stat == 200){
                    location.reload()
                }
            })
            .catch( error => {
                console.log(error)
                console.log(error.response.data.errors)
                this.register_errors = error.response.data.errors
            })
        }
    }
}
</script>

<style lang="css">
    .hasErro{
        border:1px solid red;
    }
</style>