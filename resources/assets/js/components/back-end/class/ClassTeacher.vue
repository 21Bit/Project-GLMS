<template>
     <div class="panel panel-inverse">
        <div class="panel-body teacher-class-panel-body">
            <div class="d-flex">
                <div>
                    <img :src="teacher.picture" class="mw-100 rounded-circle mr-2" alt="">
                </div>
                <div>
                    <div><a href="#" target="_blank" class="mb-0 text-inverse">{{  teacher.name }}</a></div>
                    <small>Teacher  &nbsp;&nbsp;&nbsp;<a href="#" v-show="!changeMode"  @click="changeMode = !changeMode" class="teacher-change-link">Change</a></small>
                </div>
            </div>
                <div class="mt-3 change-teacher-form" v-show="changeMode">
                    <button @click="changeMode = !changeMode" type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <hr>
                    <h5>Change Teacher</h5>
                    <form method="post" @submit.prevent="submit()" id="teacher-form">
                        <p>
                            <label for="">Teacher</label>
                            <select name="teacher_id" id="select2teacher" style="width:100%"></select>
                        </p>
                        <p>
                            <button class="btn btn-success" type="submit">Submit</button>
                        </p>
                    </form>
                </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['session'],
    data(){
        return{
            teacher: {},
            changeMode: false
        }
    },
    created(){
        this.getTeacher();
    },
    methods:{
        submit(){
            var form_data = $('#teacher-form').serialize()
            console.log(form_data)
            axios.post('/back-end/api/changeteacher/' + this.session, form_data)
                .then( response => {
                    this.teacher = response.data
                    this.changeMode = false
                    $('#teacher-form').triger("reset")
                })
                .catch( error => {
                    console.error(error)
                })
        },
        getTeacher(){
            axios.post('/back-end/api/getclassteacher/' + this.session)
                .then( response => {
                    this.teacher = response.data
                })
                .catch( error => {
                    console.error(error)
                })
        }
    }
    
}
</script>
<style lang="scss" scoped>
    .teacher-class-panel-body{
        position: relative;        

        .change-teacher-form{
            position: absolute;
            width: 100%;
            background-color: #fff;
            left:0;
            padding:15px;
            border:1px solid #ccc;
        }

    }
  

</style>