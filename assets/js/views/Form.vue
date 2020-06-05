<template>
    <div>
        <b-form @submit.prevent="onSubmit">

            <!-- Si on est pas encore à la fin -->
            <div v-if="!end">
                <h1>{{acutalQuestion}}</h1>

                <b-form-radio v-for="choice in acutalChoices" :key="choice.value" v-model="form.selected[index]" :value="choice['@id']">{{choice.choice}}</b-form-radio>
                <div class="mt-4">
                    <b-button v-show="index > 0" class="mb-2" type="buttton" variant="outline-primary" @click.prevent="previousQuestion">Précédent</b-button>
                    <b-button v-show="!end" class="mb-2" :disabled="typeof form.selected[index] === 'undefined' || form.selected[index] === null" type="buttton" variant="primary" @click.prevent="nextQuestion">Suivant</b-button>                
                </div>
            </div>
             <!-- Si on est à la fin -->
            <div v-else>
                <h5>Plus qu'une étape avant de découvrir ton expérience insolite et responsable</h5>
                <b-form-group label="Ton prénom" label-for="prenom">
                    <b-form-input
                    id="prenom"
                    v-model="form.prenom"
                    required
                    placeholder="Ton prénom"
                    ></b-form-input>
                </b-form-group>
                
                <b-form-group label="Ton email" label-for="email">
                    <b-form-input
                    id="email"
                    v-model="form.email"
                    required
                    placeholder="Ton email"
                    ></b-form-input>
                </b-form-group>
                <b-alert :show=error variant="danger">{{messageError}}</b-alert>
                <div class="mt-4">
                    <b-button type="buttton" class="mb-2" variant="outline-primary" @click.prevent="previousQuestion">Précédent</b-button>
                    <b-button type="submit" class="mb-2" variant="primary">Découvrir mon expérience</b-button>
                </div>
            </div>
        </b-form>
    </div>
</template>
<script>

import axios from 'axios'

export default {
    data(){
        return{
            index:0,
            questions:[],
            end:false,
            form:{
                selected:[],
                email: '',
                prenom:''
            },
            error: false,
            messageError:''
        }
    },
    computed:{
        acutalQuestion(){
            if(typeof this.questions[this.index] !== 'undefined'){
                return this.questions[this.index].question
            }
            return ''
        },
        acutalChoices(){
            if(typeof this.questions[this.index] !== 'undefined' && this.questions[this.index].choices.length > 0){
                return this.questions[this.index].choices
            }
            return []
        }
    },
    watch:{
        index(val){
            if(val >= this.questions.length){
                this.end = true
            }
            else{
                this.end = false
            }
        }
    },
    mounted(){
        axios.get('/api/questions')
        .then(response => {
            this.questions = response.data['hydra:member']
        })
    },
    methods:{
        nextQuestion(){
            this.index++
        },
        previousQuestion(){
            this.index --
        },
        onSubmit(){
            //enregistre le participant
            axios.post('/api/participants', {
                firstname: this.form.prenom,
                email: this.form.email
            })
            //enregistre les réponses
            .then(response => axios.post('/api/answers', {
                                    date: new Date(),
                                    answers: this.form.selected,
                                    participant: response.data['@id']
                                })
                                .then(response => this.$router.push({ name:'result', params: { id: response.data.id } }))
            )
            .catch(error => {
                this.error = true
                this.messageError = error.response.data['hydra:description']
            })

        }
    }
}
</script>