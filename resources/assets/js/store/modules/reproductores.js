import axios from 'axios'

const state = {
  reproductores: []
}

const mutations = {
  GET_REPRODUCTORES(state, reproductores) {
    state.reproductores = reproductores.reverse()
  },

  ADD_REPRODUCTOR(state, reproductor) {
    state.reproductores.unshift(reproductor)
  },
}

const actions = {
  getReproductores({commit}) {
    return new Promise((resolve, reject) => {
      axios.get('/api/reproductores')
      .then((response) => {
        commit('GET_REPRODUCTORES', response.data.data)
        resolve()
      })
      .catch((error) => {
        console.log(error);
      });
    }, error => console.log(error))
  },

  addReproductor({commit}, reproductor) {
    return new Promise((resolve, reject) => {
      commit('ADD_REPRODUCTOR', reproductor)
      resolve()
    }, error => console.log(error))
  },
}

const getters = {
  reproductores: (state) => {
    return state.reproductores
  }
}


export default {
  state,
  mutations,
  actions,
  getters
}
