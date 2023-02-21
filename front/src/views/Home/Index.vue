<template>
    <div class="welcome">
        <div class="img-background"></div>
        <nav_bar></nav_bar>
        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12" class="content_card">
                <vs-row vs-justify="center">
                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="8">
                        <vs-card>
                        <div slot="header">
                            <h3>
                            Buscador
                            </h3>
                        </div>
                        <div class="centerx labelx">
                            <vs-row>
                                <vs-col v-if="former == false" vs-type="flex" vs-justify="center" vs-align="center" vs-w="4" class="content_card_item">
                                    <vs-input label="Nombres y Apellidos" v-model="name" />
                                </vs-col>
                                <vs-col v-if="former == false" vs-type="flex" vs-justify="center" vs-align="center" vs-w="4" class="content_card_item">
                                    <vs-input type="number" min=1 label="Porcentaje de coincidencia" v-model="percent"/>
                                </vs-col>
                                <vs-col v-if="former == true" vs-type="flex" vs-justify="center" vs-align="center" vs-w="6" class="content_card_item">
                                    <vs-input type="number" min=1 label="uuid" v-model="searchId" />
                                </vs-col>
                                <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="2" class="content_card_item">
                                    <vs-button color="primary" type="filled" @click="validateSearch(former)">Buscar</vs-button>
                                </vs-col>
                                <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="2" class="content_card_item">
                                    <vs-checkbox v-model="former">Busquedas anteriores</vs-checkbox>
                                </vs-col>
                            </vs-row>
                        </div>
                            <vs-row v-show="showResults">
                                <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12" class="content_card_item">
                                    <table_search :results="results" :uuid="uuid"></table_search>
                                </vs-col>
                            </vs-row>
                        </vs-card>
                    </vs-col>
                </vs-row>
            </vs-col>
        </vs-row>
    </div>
</template>
<script>
/*eslint-disable */
import { misMixins } from '../mixins.js'
export default {
  created: function () {

  },

  data () {
    return {
      name: '',
      percent: '',
      uuid:'',
      showResults: false,
      results: [],
      former: false,
      searchId:''
    }
  },

  mixins: [misMixins],

  methods: {

    //metodo para validar si se va a crear una nueva busqueda o si se va a traer una busqueda anterior
    validateSearch(data){
        if(data == true){
            this.history()
        }else{
            this.search()
        }
    },

    // metodo para traer una busqueda anterior
    history () {
      if (this.searchId === '') {
        this.$vs.notify({
          text: 'Debes agregar un uuid para realizar la búsqueda',
          color: 'danger',
          icon: 'warning'
        })
    }else {

        this.loadingOpen()
        this.axios({
            url: 'getSearches',
            method: 'POST',
            data:{
                id: this.searchId
            },
            headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*',
            'Authorization': 'Bearer ' + localStorage.token
            }
        }).then((result) => {
            this.results = []
            this.$vs.notify({
                text: 'Información consultada con éxito',
                color: 'success',
                icon: 'done'
            })
            this.results = result.data.data.estado_ejecucion
            this.uuid = result.data.id
            this.showResults = true
            this.searchId = ''
            console.log('result', result)
            this.loadingClose()
        }).catch(error => {
            if (error) {
            this.loadingClose()
            this.showResults = false
            this.$vs.notify({
                text: error.response.data.message,
                color: 'danger',
                icon: 'warning'
            })
            }
        })
        }

   },

   // metodo para realizar una busqueda 
    search () {
      if (this.percent === '' || this.name === '') {
        this.$vs.notify({
          text: 'Debes agregar un nombre y un porcentaje de coincidencia',
          color: 'danger',
          icon: 'warning'
        })
    }else if (this.percent < 0) {
        this.$vs.notify({
          text: 'El porcentaje no puede ser negativo',
          color: 'danger',
          icon: 'warning'
        })  
      } else {

        this.loadingOpen()
        this.axios({
            url: 'search',
            method: 'POST',
            data:{
                name: this.name,
                percent: this.percent,
            },
            headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*',
            'Authorization': 'Bearer ' + localStorage.token
            }
        }).then((result) => {
            this.results = []
            this.$vs.notify({
                text: 'Información consultada con éxito',
                color: 'success',
                icon: 'done'
            })
            this.results = result.data.data
            this.uuid = result.data.id
            this.showResults = true
            this.name = ''
            this.percent = ''
            console.log('result', result)
            this.loadingClose()
        }).catch(error => {
            if (error) {
            this.loadingClose()
            this.showResults = false
            this.$vs.notify({
                text: error.response.data.message,
                color: 'danger',
                icon: 'warning'
            })
            }
        })
        }

   },

  }
}
</script>
<style scoped>
.content_card{
    margin-top: 10%;
}
.content_card_item{
    margin-top: 2% !important;
    margin-bottom: 2% !important;
}
.img-background {
  background-image: url("../../assets/images/fondo2.jpg");
  position: absolute;
  background-repeat: no-repeat;
  background-size: cover;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.8);
  filter: brightness(0.4);
  z-index: -1;
}
</style>
