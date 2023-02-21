<template>
  <div id="app">
    <router-view/>
  </div>
</template>
<sript>
/*eslint-disable */
import { misMixins } from '../mixins.js'
export default {
  created: function () {

  },

  data () {
    return {

    }
  },

  mixins: [misMixins],

  methods: {
    Existuser() {
      const authToken = window.localStorage.getItem('token');
      if( authToken !== null ){

        this.$router.push({ path: '/home' });

      }else{
        this.$router.push({ path: '/' });
      }
   },

  }
}
</sript>

<style lang="scss">
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
}

#nav {
  padding: 30px;

  a {
    font-weight: bold;
    color: #2c3e50;

    &.router-link-exact-active {
      color: #42b983;
    }
  }
}
</style>
