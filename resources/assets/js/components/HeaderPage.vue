<template>
  <header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler d-lg-none" type="button" @click="mobileSidebarToggle">&#9776;</button>
    <b-link class="navbar-brand" to="#"></b-link>
    <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" @click="sidebarMinimize">&#9776;</button>
    
    <b-navbar-nav>
      <b-nav-item-dropdown>
        <template slot="button-content">
          <i class="fa fa-bell-o"></i><!--<span class="badge badge-pill badge-danger">7</span>-->
        </template>
        <b-dropdown-item>one</b-dropdown-item>
        <b-dropdown-item>two</b-dropdown-item>
        <b-dropdown-divider></b-dropdown-divider>
        <b-dropdown-item>three</b-dropdown-item>
      </b-nav-item-dropdown>
    </b-navbar-nav>

    <b-navbar-nav class="ml-auto">
      <b-nav-item-dropdown right>
        <template slot="button-content" v-show="authenticated">
          <!--<img v-bind:src="url" class="img-avatar" alt="admin@bootstrapmaster.com">-->
          <span v-if="currentUser"><a>{{currentUser.name}}</a></span>
        </template>
        <b-dropdown-item><i class="fa fa-user"></i> Perfil</b-dropdown-item>
        <b-dropdown-item><i class="fa fa-wrench"></i> Configuración</b-dropdown-item>
        <b-dropdown-item @click="logout"><i class="fa fa-lock"></i> salir</b-dropdown-item>
      </b-nav-item-dropdown>
    </b-navbar-nav>
  </header>
</template>

<script>
import { mapGetters } from 'vuex'

export default {
  name: 'headerpage',
  data: () => ({
    url: '../../../img/user.jpg'
  }),

  computed: {
    ...mapGetters([
      'currentUser',
      'authenticated'
    ])
  },
  methods: {
    logout() {
        this.$store.dispatch('logout').then(() => {
        this.$router.push({ name: 'login' })
      })
    },
    sidebarToggle (e) {
      e.preventDefault()
      document.body.classList.toggle('sidebar-hidden')
    },
    sidebarMinimize (e) {
      e.preventDefault()
      document.body.classList.toggle('sidebar-minimized')
    },
    mobileSidebarToggle (e) {
      e.preventDefault()
      document.body.classList.toggle('sidebar-mobile-show')
    }
  }
}
</script>
