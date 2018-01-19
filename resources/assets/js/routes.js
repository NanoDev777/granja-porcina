import NotesList from './pages/notes/NotesList.vue'
import Login from './pages/auth/Login.vue'
import Register from './pages/auth/Register.vue'
import NotFound from './components/NotFound.vue'

import Full from './containers/Full'

//reproductores
import CreateReproductor from './pages/reproductores/CreateReproductor'
import Reproductores from './pages/reproductores/ListReproductores'

//eventos
import Inseminacion from './pages/eventos/Inseminacion'
import Notes from './pages/notes/NotesList'

export default [
    {
      path: '/',
      name: 'Home',
      component: Full,
      meta: { requiresAuth: true },
      children: [
        {
          path: '/reproductores',
          redirect: '/reproductores/registrar',
          name: 'Reproductores',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'registrar',
              name: 'Registrar',
              component: CreateReproductor
            },
            {
              path: 'hembras',
              name: 'Hembras',
              component: Reproductores
            },
            {
              path: 'notes',
              name: 'Notes',
              component: Notes
            }
          ]
        },
        {
          path: '/eventos',
          redirect: '/eventos/inseminacion',
          name: 'Eventos',
          component: {
            render (c) { return c('router-view') }
          },
          children: [
            {
              path: 'inseminacion',
              name: 'Inseminación',
              component: Inseminacion
            }
          ]
        }
      ]
    },

    {
      path: '/login', 
      name: 'login', 
      component: Login, 
      meta: { 
        redirectIfLogged: true 
      } 
    }
]
