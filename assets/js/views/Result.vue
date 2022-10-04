<template>
    <div>
        <h1 class="text-center">Tu es multipotentiel à {{percent}}%</h1>
    </div>
</template>

<script>
import axios from 'axios'

export default {
    data(){
        return{
            percent: 0
        }
    },
    mounted(){
      this.percent = this.$route.params.percent
    }
}
</script>