<template>
    <div id="home">
      <notif @trashNotifs="trashNotif" @endAnim="autoTrashNotif" :notifs="notifications"/>
        <div style="width: 30vw"class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">
                    <img style="width: 20px" src="https://cdn2.iconfinder.com/data/icons/business-office-icons/256/To-do_List-512.png"/>
                </span>
            </div>
            <input @keyup.enter="trySubmit"
                   v-model="newTask.content"
                   type="text"
                   class="form-control"
                   aria-label="Default"
                   aria-describedby="inputGroup-sizing-default"

                   v-model.trim="$v.newTask.content.$model"

            >
            <button
                    @click="trySubmit" class="buttonTask">Add</button>
        </div>

        <ul>
            <li  v-for="(task, index) in tasks">

                <article>
                    {{ task.content }}
                </article>
                <article>
                    <img
                            @click="toEdit(task)"
                            style="width: 20px; cursor: pointer"
                         src="data:image/png;base64,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">
                    <img
                            style="width:  20px; cursor: pointer"
                            src="https://cdn3.iconfinder.com/data/icons/cleaning-icons/512/Trash_Can-512.png"
                            @click="trash(task, index)"
                    >
                </article>
            </li>
        </ul>
    </div>
</template>

<script>

    import axios from 'axios'
    import Notif from '../components/Notif'

    import { required } from 'vuelidate/lib/validators'


    export default {

        components:{
            Notif
        },
        data(){
            return{

                tasks: [],
                notifications: [],
                newTask: {
                    content:''
                },

            }
        },

        validations: {

            newTask: {
                content: {
                    required
                },

            },
        },

        mounted(){

            axios.get('api/tasks')
                .then(response => this.tasks = response.data)

        },

        methods: {

            trySubmit() {
                this.$v.$touch()
                if (this.$v.$invalid) {
                    console.log("error")
                    this.notifications.push({
                        message: 'Please enter task',
                        type: 'error'
                    })
                } else {
                    // do your submit logic here
                    console.log("ok")
                    this.createTask()
                }
            },


            // trySubmit() {
            //     this.$v.$touch()
            //     if (this.$v.$invalid) {
            //         console.log('ERROR')
            //     } else {
            //         console.log('valid')
            //         this.createTask()
            //     }
            // },


            createTask(){
                axios.post(`api/tasks`, this.newTask)
                    .then(response => {

                        this.$v.newTask.content.$model = ""

                       this.tasks.push(response.data)
                        this.notifications.push({
                            message: 'Task has been add',
                            type: 'success'
                        })
                    })

            },

            toEdit(elem){
                console.log("edit")
                this.$router.push({path: `/${elem.id}` ,name: `Task`, params:{id: elem.id} })
            },

            trash(elem, index){

                axios.delete(`api/tasks/${elem.id}`)
                           .then(response =>{
                                   console.log(response)
                                   this.tasks.splice(index, 1)

                               this.notifications.push({
                                   message: 'Task has been delete',
                                   type: 'error'
                               })
                           })
                ;

            },

            trashNotif(elem){
                console.log(elem)
                this.notifications.splice(elem, 1)
            },

            // autoTrashNotif(elem){
            //     setTimeout( () => {
            //         this.notifications.splice(elem, 1)
            //      }, 2000);
            //
            // },


        }
    }
</script>


<style scoped>

    li{
        list-style: none;
        display: flex;
        justify-content: space-between;
        box-shadow: 0px 0px 2px grey;
        margin: 5px;
        border-radius: 5px;
        padding: 5px;
        background-color: white;
        align-items: center;

    }

    ul{
        width: 60vw;
        padding: 0;

    }

    .buttonTask{
        padding: 6px 12px;
        background-color: dodgerblue;
        color: white;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    .error{
        border: 1px solid red;
    }
</style>