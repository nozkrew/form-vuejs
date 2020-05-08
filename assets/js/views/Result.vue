<template>
    <div>
        <h1 class="text-center">{{title}}</h1>
        <p class="text-center">{{description}}</p>
        <b-embed v-show="video"
            type="iframe"
            aspect="16by9"
            :src=video
            allowfullscreen
        ></b-embed>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data(){
        return{
            title:'',
            description: '',
            video: ''
        }
    },
    mounted(){
        axios.get('/api/answers/'+this.$route.params.id+'/result')
        .then(response => {
            this.title = response.data.title
            this.description = response.data.description,
            this.video = 'https://www.youtube.com/embed/'+response.data.videoUrl+'?rel=0'
        })
    }
}
</script>