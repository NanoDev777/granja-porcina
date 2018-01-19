import Vue from 'vue'
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import auth from './modules/auth'
import notes from './modules/notes'
import reproductores from './modules/reproductores'

Vue.use(Vuex)

export default new Vuex.Store({
  modules:{
    auth,
    notes,
    reproductores
  },
  plugins: [createPersistedState()]
})
