<template>
    <div>
        <notif @trashNotifs="trashNotif"  :notifs="notifications"/>

        <div @click="goBack" class="text-left" style=" padding-bottom: 30px">
            <button class="btn btn-secondary">
                Back
            </button>
        </div>
        <div style="display: flex; align-items: center">
            <span style="font-size: 150%">Task</span>
            <span style="margin-left: 5px; font-weight: bold"># {{ task.id }} </span>
        </div>

        <article>
            <div style="width: 30vw; margin-top: 30px" class="input-group mb-3">
                <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">
                    <img style="width: 20px" src="https://cdn2.iconfinder.com/data/icons/business-office-icons/256/To-do_List-512.png"/>
                </span>
                </div>
                <input @keyup.enter="trySubmit"
                       v-model="task.content"
                       type="text"
                       class="form-control"
                       aria-label="Default"
                       aria-describedby="inputGroup-sizing-default"
                >
                <button
                        @click="trySubmit" class="buttonTask">Edit</button>
            </div>
        </article>
    </div>
</template>

<style>
    .buttonTask{
        padding: 6px 12px;
        background-color: dodgerblue;
        color: white;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
    }
</style>


<script>


    import axios from 'axios'

    import { required } from 'vuelidate/lib/validators'
    import Notif from '../components/Notif'


    export default {

        components:{
            Notif
        },

        data(){
            return {
                task: {
                    content: '',
                    id: ''
                },
                notifications: [],

            }
        },


        validations: {

            task: {
                content: {
                    required
                },

            },
        },


        mounted(){


            this.task.id = this.$route.params.id

                axios.get(`api/tasks/${this.task.id}`)
                        .then(response => {
                            console.log(response.data)
                            this.task.content = response.data.content
                            this.task.id = response.data.id
                        })
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
                  //  this.createTask()
                    this.update()
                }
            },

            update(){
                axios.put(`api/tasks/${this.task.id}`, this.task)
                    .then(response =>{
                        console.log(response)
                        this.notifications.push({
                            message: 'Task has been updated',
                            type: 'success'
                        })
                    })
            },

            goBack(){
                this.$router.push({path: '/'})
            },

            trashNotif(elem){
                console.log(elem)
                this.notifications.splice(elem, 1)
            },




        }

    }
</script>