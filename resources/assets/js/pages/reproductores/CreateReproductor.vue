<template>
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-md-8 mx-auto">
        <b-card>
          <div slot="header">
            <strong>Nuevo Reproductor (a)</strong>
          </div>
          <alert-error :form="form" message="Hubo algunos problemas al guardar los datos."></alert-error>
          <b-form @submit.prevent="createReproductor" @keydown="form.onKeydown($event)" @reset="onReset" @change="form.onKeydown($event)">
            <div class="row">
              <div class="col-sm-6">
                <b-form-group label="Código" label-for="codigo">
                  <b-form-input type="text" v-model="form.codigo" name="codigo" :class="{ 'is-invalid': form.errors.has('codigo') }"></b-form-input>
                  <has-error :form="form" field="codigo"></has-error> 
                </b-form-group>
              </div>
              <div class="col-sm-6">
                <b-form-group label="Origen" label-for="origen">
                  <b-form-select v-model="form.origen" name="origen" :options="origenes" :class="{ 'is-invalid': form.errors.has('origen') }"></b-form-select>
                  <has-error :form="form" field="origen"></has-error>
                </b-form-group>
              </div>
            </div>
            <div class="row" v-if="form.origen == 'COMPRA'">
              <div class="col-sm-6">
                <b-form-fieldset label="Fecha de llegada">
                  <b-form-input type="text" v-model="form.llegada"></b-form-input>
                </b-form-fieldset>
              </div>
              <div class="col-sm-6">
                <b-form-fieldset label="Precio de compra">
                  <b-form-input type="text" v-model="form.precio"></b-form-input>
                </b-form-fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <b-form-fieldset label="Fecha de nacimiento">
                  <b-form-input type="text" v-model="form.nacimiento"></b-form-input>
                </b-form-fieldset>
              </div>
              <div class="col-sm-6">
                <b-form-fieldset label="Peso">
                  <b-form-input type="text" v-model="form.peso"></b-form-input>
                </b-form-fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <b-form-fieldset label="Sexo">
                  <b-form-select v-model="form.sexo" :options="sexos"></b-form-select>
                </b-form-fieldset>
              </div>
              <div class="col-sm-6">
                <b-form-fieldset label="Genética">
                  <b-form-input type="text" v-model="form.genetica"></b-form-input>
                </b-form-fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <b-form-fieldset label="Ubicación">
                  <b-form-input v-model="form.ubicacion"></b-form-input>
                </b-form-fieldset>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <b-form-textarea v-model="form.observacion" placeholder="Observaciones" :rows="3" :max-rows="6">
                </b-form-textarea>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-sm-6">
                <button :disabled="form.busy" type="submit" class="btn btn-primary btn-lg btn-block">
                  <i v-if="form.busy" class="fa fa-fw fa-spinner fa-spin"></i>
                  <i v-else class="fa fa-fw fa-floppy-o"></i>
                  Registrar
                </button>
              </div>
              <div class="col-sm-6">
                <button type="reset" class="btn btn-danger btn-lg btn-block">
                  <i class="fa fa-fw fa-recycle"></i>
                  Limpiar
                </button>
              </div>
            </div>
          </b-form>
        </b-card>
      </div>
    </div>
  </div>
</template>

<script>
import vSelect from "vue-select"
import { mapGetters } from 'vuex'
import Form from 'vform'

export default {
  name: 'inseminacion',
  components: {vSelect},
  data() {
    return {
      form: new Form({
        codigo: '',
        origen: null,
        llegada: '',
        precio: '',
        nacimiento: '',
        peso: '',
        sexo: null,
        genetica: '',
        ubicacion: '',
        observacion: ''
      }),
      options: ['foo','bar','baz'],
      origenes: ['COMPRA', 'GRANJA'],
      sexos: ['HEMBRA', 'MACHO']
    }
  },
  methods: {
    onSubmit (evt) {
      evt.preventDefault();
      alert(JSON.stringify(this.form));
    },
    onReset (evt) {
      evt.preventDefault();
      this.form.codigo = '';
      this.form.origen = null;
      this.form.llegada = '';
      this.form.precio = '';
      this.form.nacimiento = '';
      this.form.peso = '';
      this.form.sexo = null;
      this.form.genetica = '';
      this.form.ubicacion = '';
      this.form.observacion = '';
    },
    createReproductor() {
      this.form.post('/api/save')
        .then(({ data }) => {
          this.$store.dispatch('addReproductor', data.data)
            .then(() => {
              this.form.reset()
              this.$toasted.register(data.msg)
            })
        }).catch((error) => {
          // console.log(error)
        })
    }
  }
}
</script>
