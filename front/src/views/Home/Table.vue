<template>
    <div>

                    <vs-table
                        @search="handleSearch"
                        @change-page="handleChangePage"
                        @sort="handleSort"
                        v-model="selected"
                        pagination
                        max-items="10"
                        search
                        :data="results"
                        >
                        <template slot="header">
                            <h2>uuid de búsqueda: {{ uuid }}</h2>
                        </template>
                        <template slot="thead">
                            <vs-th sort-key="foto" >
                                <p class="p-th">Nombre</p>
                            </vs-th>
                            <vs-th sort-key="foto" >
                                <p class="p-th">Tipo persona</p>
                            </vs-th>
                            <vs-th sort-key="codigo">
                                <p class="p-th">Tipo Cargo</p>
                            </vs-th>
                            <vs-th sort-key="nombre">
                                <p class="p-th">Departamento</p>
                            </vs-th>
                            <vs-th sort-key="categoria">
                                <p class="p-th">Municipio</p>
                            </vs-th>
                            <vs-th sort-key="valor">
                                <p class="p-th">% Coincidencia</p>
                            </vs-th>
                        </template>

                        <template slot-scope="{data}">
                            <vs-tr :data="tr" :key="indextr" v-for="(tr, indextr) in data" >
                                <vs-td :data="data[indextr].nombre" class="table-td">
                                    {{data[indextr].nombre}}
                                </vs-td>

                                <vs-td :data="data[indextr].tipo_persona" class="table-td">
                                    {{data[indextr].tipo_persona}}
                                </vs-td>

                                <vs-td :data="data[indextr].tipo_cargo" class="table-td">
                                    {{data[indextr].tipo_cargo}}
                                </vs-td>

                                <vs-td :data="data[indextr].departamento" class="table-td">
                                    {{data[indextr].departamento}}
                                </vs-td>

                                <vs-td :data="data[indextr].municipio" class="table-td">
                                    {{data[indextr].municipio}}
                                </vs-td>

                                <vs-td :data="data[indextr].porcentaje" class="table-td">
                                    {{data[indextr].porcentaje}} %
                                </vs-td>
                            </vs-tr>
                        </template>
                        </vs-table>
    </div>
</template>
<script>
/*eslint-disable */
import { misMixins } from '../mixins.js'
export default {
  created: function () {

  },

  props:['results','uuid'],

  data () {
    return {
        selected:[]
    }
  },

  mixins: [misMixins],

  methods: {

    handleSearch(searching) {
      let _print = `The user searched for: ${searching}\n`
      this.$refs.pre.appendChild(document.createTextNode(_print))
    },
    handleChangePage(page) {
      let _print = `The user changed the page to: ${page}\n`
      this.$refs.pre.appendChild(document.createTextNode(_print))
    },
    handleSort(key, active) {
      let _print = `the user ordered: ${key} ${active}\n`
      this.$refs.pre.appendChild(document.createTextNode(_print))
    },

   },

}
</script>