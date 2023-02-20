<template>
    <div class="welcome">
        <div class="img-background"></div>
        <vs-row>
            <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12" class="content_card">
                <vs-row vs-justify="center">
                    <vs-col type="flex" vs-justify="center" vs-align="center" vs-w="6">
                        <vs-card>
                        <div slot="header">
                            <h3>
                            Login
                            </h3>
                        </div>
                        <div class="centerx labelx">
                            <vs-row>
                                <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12" class="content_card_item">
                                    <vs-input placeholder="Email" v-model="email"/>
                                </vs-col>
                                <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12" class="content_card_item">
                                    <vs-input type="password" placeholder="Password" v-model="password"/>
                                </vs-col>
                                <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12" class="content_card_item">
                                    <vs-button color="primary" type="filled" @click="login()">Iniciar Sesión</vs-button>
                                </vs-col>
                                <vs-col vs-type="flex" vs-justify="center" vs-align="center" vs-w="12" class="content_card_item">
                                    <router-link to="/register">
                                        <vs-button color="warning" type="filled">Registrarse</vs-button>
                                    </router-link>
                                </vs-col>
                            </vs-row>
                        </div>

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
      email: '',
      password: ''
    }
  },

  mixins: [misMixins],

  methods: {

    login () {

      var validEmail =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
      var result = validEmail.test(this.email)

      if (this.email === '' || this.password === '') {
        this.$vs.notify({
          text: 'Debes agregar un email y una contraseña',
          color: 'danger',
          icon: 'warning'
        })

      }else if (result === false) {
        this.$vs.notify({
          text: 'Debes agregar un email válido',
          color: 'danger',
          icon: 'warning'
        })
      } else {

        this.loadingOpen()
        this.axios({
            url: 'login',
            method: 'POST',
            data:{
                email: this.email,
                password: this.password
            },
            headers: {
            'Access-Control-Allow-Origin': '*',
            'Access-Control-Allow-Headers': '*'
            }
        }).then((result) => {
            // console.log('result', result.data.token)
            localStorage.setItem('token', result.data.token)
            this.loadingClose()
            this.email = ''
            this.password = ''
            this.$router.push({name: 'home'})
        }).catch(error => {
            console.log('error', error.response.data.message)
            if (error) {
            this.loadingClose()
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
    margin-top: 15%;
}
.content_card_item{
    margin-top: 2% !important;
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
