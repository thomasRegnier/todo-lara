<template>
    <div id="hello">
        Hello Component


        <example-component/>
    </div>
</template>

<script>

    import ExampleComponent from '../components/ExampleComponent.vue'

    export default {

        components:{
            ExampleComponent
        },
        data(){
            return{

            }
        }
    }
</script>
