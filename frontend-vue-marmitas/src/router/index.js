import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AnunciosView from '@/views/AnunciosView.vue'
import DetalheAnuncioView from '@/views/DetalheAnuncioView.vue'
import CadastroDoadorView from '@/views/CadastroDoadorView.vue'
import CadastroEntidadeView from '@/views/CadastroEntidadeView.vue'
import CadastroAnunciosView from '@/views/CadastroAnunciosView.vue'
import GerenciadorAnunciosView from '@/views/GerenciadorAnunciosView.vue'
import EditarAnunciosView from '@/views/EditarAnunciosView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView,

    },
    {
      path: '/anuncios',
      name: 'anuncios',
      component: AnunciosView,

    },
    {
      path: '/anuncios/:id',
      name: 'DetalheAnuncio',
      component: DetalheAnuncioView,

    },
    {
      path: '/cadastrodoador',
      name: 'CadastroDoador',
      component: CadastroDoadorView,

    },
    {
      path: '/cadastroentidade',
      name: 'CadastroEntidade',
      component: CadastroEntidadeView,

    },
    {
      path: '/cadastroanuncios',
      name: 'CadastroAnuncios',
      component: CadastroAnunciosView,

    },
     {
      path: '/editaranuncios/:id',
      name: 'EditarAnuncios',
      component: EditarAnunciosView,

    },
     {
      path: '/gerenciadoranuncios',
      name: 'GerenciadorAnuncios',
      component: GerenciadorAnunciosView,

    },
  ],
})

export default router
