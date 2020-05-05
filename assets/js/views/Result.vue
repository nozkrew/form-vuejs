<template>
    <div>
        <h1>{{title}}</h1>
        <p>{{description}}</p>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data(){
        return{
            title:'',
            description: ''
        }
    },
    mounted(){
        axios.get('/api/answers/'+this.$route.params.id+'/result')
        .then(response => {
            this.title = response.data.title
            this.description = response.data.description
        })
    }
}
</script>