<template>
  <div class="app flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
        <alert-error :form="form"></alert-error>
          <div class="card-group mb-0">
            <div class="card p-4">
              <div class="card-body">
              <form @submit.prevent="login" @keydown="form.onKeydown($event)">
              <!-- Alert -->
                <h2>Iniciar Sesión</h2>
                <p class="text-muted">Escriba sus datos para ingresar al sistema</p>

                <div class="form-group">
                <div class="input-group mb-3">
                  <span class="input-group-addon text"><i class="fa fa-user"></i></span>
                  <input v-model="form.email" type="text" name="email" id="email" class="form-control" :class="{ 'is-invalid': form.errors.has('email') }">
                </div>
                <has-error :form="form" field="email" style="display: inline;"></has-error> 
                </div>

                <div class="form-group">
                <div class="input-group mb-4" id="show_hide_password">
                  <span class="input-group-addon text"><i class="fa fa-lock"></i></span>
                  <input v-model="form.password" type="password" name="password" id="password" class="form-control" :class="{ 'is-invalid': form.errors.has('password') }" />
                  <div class="input-group-addon">
                    <a href="" class="input-group-text"><i id="view" class="fa fa-eye-slash" aria-hidden="true"></i></a>
                  </div>
                </div>
                <has-error :form="form" field="password" style="display: inline;"></has-error>
                </div>

                <div class="form-group">
                  <label class="custom-control custom-checkbox">
                    <input v-model="form.remember" type="checkbox" class="custom-control-input" value="1">
                    <span class="custom-control-indicator"></span>
                    <span class="custom-control-description">Recordarme</span>
                  </label>
                </div>

                <div class="row">
                  <button :disabled="form.busy" type="submit" class="btn btn-primary btn-lg btn-block">
                    <i v-if="form.busy" class="fa fa-fw fa-spinner fa-spin"></i>
                    <i v-else class="fa fa-fw fa-sign-in"></i>
                    Ingresar
                  </button>
                </div>

                </form>
              </div>
            </div>
            <div class="card text-white bg-primary py-5 d-md-down-none">
              <div class="card-body text-center">
                <img v-bind:src="url" class="rounded mx-auto d-block" width="250px" height="250px">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import Form from 'vform'

export default {
  data: () => ({
    form: new Form({
      email: '',
      password: ''
    }),
    remember: false,
    url: 'img/logo.png'
  }),

  mounted: function() {
    $(function() {
      $("#show_hide_password a").on('click', function(event) {
        event.preventDefault();
        if($('#show_hide_password input').attr("type") == "text"){
          $('#show_hide_password input').attr('type', 'password');
          $('#view').addClass( "fa-eye-slash" );
          $('#view').removeClass( "fa-eye" );
        }else if($('#show_hide_password input').attr("type") == "password"){
          $('#show_hide_password input').attr('type', 'text');
          $('#view').removeClass( "fa-eye-slash" );
          $('#view').addClass( "fa-eye" );
        }
      });
    });
  },

  methods: {
    login() {
      this.form.post('/api/login')
      .then(({ data }) => {
        this.$store.dispatch('saveToken', data.token)
        this.$store.dispatch('setCurrentUser', data.user)
        this.$router.push({ name: 'Home' })
        this.$toast.success({
          title:'Bienvenido',
          message:'Ingreso correctamente al sistema.'
        })
      }).catch((error) => {
        //console.log(error.response.data)
      })
    }
  }
}
</script>

<style>
.container .card {
  border-color: transparent;
  box-shadow: 0 0 40px rgba(0,0,0,.05);
}

.container .form-control {
  border-width: 1px;
}

.container .text{
  color:#000000; 
  background-color: #ffffff;
}

</style>