<template>
    <div>
        <h1 class="text-center mb-3">Tu es multipotentiel à {{percent}}%</h1>

        <div v-if="percent >= 50">
          <p>La multipotentialité est caractérisée par le besoin d'une personne à s'épanouir dans la multiplicité. Les multipotentiels ont souvent tendance à se sentir anormaux, différents ou instable car notre société actuelle valorise les "spécialistes".</p>

          <p>Mais SPOILET ALERT : la multipotentialité n'est ni un problème, ni une maladie ni un défaut. C'est simplement un fonctionnement différent qu'il faut comprendre, appréhender et respecter ! Rien ne sert de lutter contre ta vraie nature 😉</p>

          <p>Si tu as des questions, n'hésite pas à m'écrire directement à <a href="mailto:contact@unautrehorizon.fr">contact@unautrehorizon.fr</a></p>
        </div>
        <div v-else>
          <p>Visiblement, tu ne sembles pas vraiment multipotentiel(le). </p>
          <p>Tu es donc plutôt du côté des "spécialistes". Les spécialistes représentent la majorité de la population. Ils ont tendance à choisir une voie, à se spécialiser dans un domaine et à avoir la volonté de devenir expert dans celui-ci ! 😊</p>
        </div>
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