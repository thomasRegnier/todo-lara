<template>
    <div class="headNotif">
        <div class="notifs appear"  @animationend="endAnim(index)"  v-for="(notif , index) in notifs">
            <article class="topNotif" :class="notif.type">
            </article>
            <article class="messageNotif">
               <span>
                   {{ notif.message }}
               </span>
                <span   @click="trashNotif(index)"
                        class="trashNotif">
                    ✗
                </span>
            </article>
        </div>
    </div>
</template>


<script>
    export default {
        name: 'Notif',

        props:{
            notifs: {
                type: Array
            },
        },

        methods: {

            trashNotif(elem){
                console.log(elem)
                this.$emit('trashNotifs', elem)

            },

            endAnim(elem){
                this.$emit('endAnim', elem)

            }
        }
    }
</script>


<style scoped>


    .headNotif{
        position: fixed;
        top: 0;
        right: 0;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        z-index: 999;
    }
    .notifs{
        border-radius: 5px;
        width: 200px;
        margin: 5px 5px 0px 5px;
        overflow: hidden;
        background-color: white;
        box-shadow: 0px 0px 8px lightgrey;
    }
    .success{
        background-color: #2d995b;
    }

    .error{
        background-color: #ff5b5a;
    }

    .topNotif{
        text-align: right;
        color: white;
        padding: 5px;
    }

    .messageNotif{
        padding: 15px 5px 15px 5px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        line-height: 0;
    }

    .trashNotif{
        box-shadow: 0px 0px 15px lightgrey;
        border-radius: 100%;
        width: 20px;
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: grey;
        cursor: pointer;

    }

    .appear{
        transform: translateY(-100px);
        opacity: 0;
        animation: ease-out 0.3s appear forwards;

    }

    @keyframes appear{

        from{
            transform: translateY(-100px);
            opacity: 0;
        }
        to{
            transform: translateY(0px);
            opacity: 1;
        }

    }



</style>