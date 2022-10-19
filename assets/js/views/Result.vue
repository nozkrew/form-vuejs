<template>
    <div class="text-center mb-4">
        <h1 class="mb-3">Tu es probablement multipotentiel(le) à {{percent}}%</h1>

        <div v-if="percent >= 50">

          <div class="mx-auto" style="width: 200px">
            <b-img :src="imageMultipotentiel" width="200px" fluid  alt=""></b-img>
          </div>

          <p>La multipotentialité est caractérisée par le besoin d'une personne à s'épanouir dans la multiplicité. Les multipotentiels ont souvent tendance à se sentir anormaux, différents ou instable car notre société actuelle valorise les "spécialistes".</p>

          <p>Mais SPOILET ALERT : la multipotentialité n'est ni un problème, ni une maladie ni un défaut. C'est simplement un fonctionnement différent qu'il faut comprendre, appréhender et respecter ! Rien ne sert de lutter contre ta vraie nature 😉</p>

          <p>Si tu te reconnais en tant que multipotentiel, que tu souhaites mieux te comprendre, apprendre à faire des choix et avoir une vie plus stable, tu peux rejoindre la formation : <a href="https://formations.unautrehorizon.fr/4-multipotentiel-apprendre-a-faire-les-bons-choix-pour-savoir-ou-tu-vas-et-enfin-avoir-une-vie-stable" target="_blank">MULTIPOTENTIEL : Apprendre à faire les bons choix pour savoir où tu vas et enfin avoir une vie stable</a></p>
          
        </div>
        <div v-else>
          <div class="mx-auto" style="width: 200px">
            <b-img :src="imageNonMultipotentiel" width="200px" fluid  alt=""></b-img>
          </div>
          <p>Visiblement, tu ne sembles pas vraiment multipotentiel(le). </p>
          <p>Tu es donc plutôt du côté des "spécialistes". Les spécialistes représentent la majorité de la population. Ils ont tendance à choisir une voie, à se spécialiser dans un domaine et à avoir la volonté de devenir expert dans celui-ci ! 😊</p>
        </div>
        <small>⚠️ Attention, ce test n'a aucune validité scientifique ! C'est uniquement un test ludique pour t'aider à te mettre sur la piste de ta POTENTIELLE multipotentialité. Il n'existe, à ce jour, pas de test ou de diagnostic officiel pour la multipotentialité.</small>
    </div>
</template>

<script>

import multipotentielImage from '../../images/multipotentiel.jpeg'
import nonMultipotentielImage from '../../images/non-multipotentiel.jpeg'

export default {
    data(){
        return{
            percent: 0,
            imageMultipotentiel: multipotentielImage,
            imageNonMultipotentiel: nonMultipotentielImage
        }
    },
    mounted(){
      console.log(multipotentielImage)
      this.percent = this.$route.params.percent
    }
}
</script>