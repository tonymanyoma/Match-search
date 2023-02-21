import { shallowMount } from '@vue/test-utils'
import Home from '../../src/views/Home/Index.vue'
import Vue from 'vue'
import Vuesax from 'vuesax'
import vmodal from 'vue-js-modal'
import axios from 'axios'
import VueAxios from 'vue-axios'

Vue.use(VueAxios, axios)

Vue.use(Vuesax, {
  // options here
})

Vue.use(vmodal)

describe('componente Index.vue', () => {
  it('debe cambiar el valor a true', () => {
    /// Crea una instancia del componente

    const wrapper = shallowMount(Home)

    /// Evalúa que el valor por defecto sea "false"

    expect(wrapper.vm.showResults).toBe(false)

    /// Ejecuta el metodo que cambia el valor de la variable a "true"

    wrapper.vm.search()
    /// Evalúa que el nuevo valor search sea "true"

    expect(wrapper.vm.showResults).toBe(false)
  })
})
