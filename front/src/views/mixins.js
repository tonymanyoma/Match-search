export const misMixins = {

  data () {
    return {
    }
  },

  methods: {
    // metodo que lanza un spinner
    loadingOpen () {
      this.$vs.loading({
        color: '#34c759',
        type: 'corners'
      })
    },
    // metodo que oculta un spinner
    loadingClose () {
      this.$vs.loading.close()
    }

  }
}
