<template>
    <div class="welcome">
      <vs-navbar
        color="#FFFFFF"
        text-color="#000000"
        active-text-color="#C8C8C8"
        class="myNavbar">
          <div slot="title">

          </div>

            <vs-navbar-item index="0" >
                <a @click="logout()">Cerrar sesión</a>
            </vs-navbar-item>
            <vs-spacer></vs-spacer>
            <vs-button color-text="rgb(255, 255, 255)" color="rgba(255, 255, 255, 0.3)" type="flat" icon="more_horiz"></vs-button>
      </vs-navbar>
    </div>
</template>
<script>
/*eslint-disable */
import { misMixins } from '../views/mixins.js'
export default {
  created: function () {

  },

  data () {
    return {
      name: '',
      percent: '',
      showResults: false,
      results: []
    }
  },

  mixins: [misMixins],

  methods: {

    logout(){
        this.loadingOpen()
        this.axios({
            url: 'logout',
            method: 'GET',
            headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*',
            'Authorization': 'Bearer ' + localStorage.token
            }
        }).then((result) => {
            this.results = []
            this.$vs.notify({
                text: 'Sesión cerrada con éxito',
                color: 'success',
                position: 'top-center',
                icon: 'done'
            })
            this.loadingClose()
            this.$router.push({ path: '/' });
        }).catch(error => {
            if (error) {
            this.loadingClose()
            this.$vs.notify({
                text: error.response.data.message,
                color: 'danger',
                icon: 'warning'
            })
            }
        })
    },
  }
}
</script>