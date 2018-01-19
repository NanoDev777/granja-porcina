<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-6">
        <b-card>
          <div slot="header">
            <strong>Nueva Inseminación</strong>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <b-form-fieldset label="Fecha">
                <b-form-input type="date"></b-form-input>
              </b-form-fieldset>
            </div>
          </div><!--/.row-->
          <div class="row">
            <div class="col-sm-12">
              <b-form-fieldset label="Hembra">
                <v-select :value.sync="selected" :options="options"></v-select>
              </b-form-fieldset>
            </div>
          </div><!--/.row-->
          <div class="row">
            <div class="col-sm-4">
              <b-form-fieldset label="Month">
                <b-form-select
                  :plain="true"
                  :options="[1,2,3,4,5,6,7,8,9,10,11,12]">
                </b-form-select>
              </b-form-fieldset>
            </div><!--/.col-->
            <div class="col-sm-4">
              <b-form-fieldset label="Year">
                <b-form-select
                  :plain="true"
                  :options="[2014,2015,2016,2017,2018,2019,2020,2021,2022,2023,2024,2025]">
                </b-form-select>
              </b-form-fieldset>
            </div><!--/.col-->
            <div class="col-sm-4">
              <b-form-fieldset label="CVV/CVC">
                <b-form-input type="text" id="cvv" placeholder="123"></b-form-input>
              </b-form-fieldset>
            </div><!--/.col-->
          </div><!--/.row-->
        </b-card>
      </div>
      <div class="col-md-4 ml-auto">
        <b-card title="Datos del animal" class="text-center">
          <p class="card-text">
            Seleccione un animal, por favor
          </p>
          <p class="card-text">
            Seleccione un animal, por favor
          </p>
          <a href="#" class="card-link">Más info.</a>
        </b-card>
      </div>
    </div>
  </div>
</template>

<script>
import vSelect from "vue-select"

export default {
  name: 'inseminacion',
  components: {vSelect},
  data() {
    return {
      selected: null,
      options: ['foo','bar','baz']
    }
  },
  methods: {
    click () {
      // do nothing
    }
  }
}
</script>
