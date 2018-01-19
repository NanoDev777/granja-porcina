export default {
  items: [
    {
      name: 'Home',
      url: '/',
      icon: 'fa fa-home',
    },
    {
      title: true,
      name: 'Reproducción y Cría',
      class: '',
      wrapper: {
        element: '',
        attributes: {}
      }
    },
    {
      name: 'Reproductores',
      url: '/reproductores',
      icon: 'fa fa-github-alt',
      children: [
        {
          name: 'Registrar',
          url: '/reproductores/registrar'
        },
        {
          name: 'Hembras',
          url: '/reproductores/hembras'
        },
        {
          name: 'Machos',
          url: '/reproductores/machos'
        },
        {
          name: 'Notes',
          url: '/reproductores/notes',
          icon: 'icon-puzzle'
        }
      ]
    },
    {
      name: 'Eventos',
      url: '/eventos',
      icon: 'fa fa-calendar-plus-o',
      children: [
        {
          name: 'Inseminación',
          url: '/eventos/inseminacion',
        },
        {
          name: 'Reproductores',
          url: '/eventos/reproductores',
        }
      ]
    },
    {
      divider: true
    },
    {
      title: true,
      name: 'Crecimiento y Engorde'
    },
    {
      name: 'Pages',
      url: '/pages',
      icon: 'icon-star',
      children: [
        {
          name: 'Login',
          url: '/pages/login',
          icon: 'icon-star'
        },
        {
          name: 'Register',
          url: '/pages/register',
          icon: 'icon-star'
        },
        {
          name: 'Error 404',
          url: '/pages/404',
          icon: 'icon-star'
        },
        {
          name: 'Error 500',
          url: '/pages/500',
          icon: 'icon-star'
        }
      ]
    }
  ]
}
