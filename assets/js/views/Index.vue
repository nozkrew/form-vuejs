<template>
    <div class="text-center">
        <h1>Es-tu multipotentiel ?</h1>
        <div class="mx-auto" style="width: 200px">
          <b-img :src="imageMultipotentiel" width="200px" fluid  alt=""></b-img>
        </div>
        <p>Si tu as un doute sur ta multipotentialité et que tu as envie d'être aider dans ta reflexion, tu peux faire ce test pour t'aiguiller ! </p>
        <div>
          <small>⚠️ Attention, ce test n'a aucune validité scientifique ! C'est uniquement un test ludique pour t'aider à te mettre sur la piste de ta POTENTIELLE multipotentialité. Il n'existe, à ce jour, pas de test ou de diagnostic officiel pour la multipotentialité.</small>
        </div>
        <b-button class="mx-auto mt-2" :to="{path: 'quiz'}" variant="primary" >C'est parti !</b-button>
    </div>
</template>
<script>

import multipotentielImage from '../../images/multipotentiel.jpeg'
import nonMultipotentielImage from "../../images/non-multipotentiel.jpeg";

export default {
  data(){
    return{
      imageMultipotentiel: multipotentielImage,
    }
  },
}
</script>