import axios from 'axios'

// Base da API
const api = axios.create({
  baseURL: 'http://127.0.0.1:8000/api',
})

export default {
  // LOGIN
  async login(email, senha) {
    const response = await api.post('/login', { email, senha })
    if (response.data.token) {
      localStorage.setItem('token', response.data.token)
      localStorage.setItem('tipo', response.data.tipo) // 'doador' ou 'instituicao'
    }
    return response.data
  },
  // CRUD INSTITUIÇÃO
  getInstituicoes() {
    return api.get('/instituicao')
  },
  getInstituicao(id) {
    return api.get(`/instituicao/${id}`)
  },
  criarInstituicao(data) {
    return api.post('/instituicao', data)
  },
  atualizarInstituicao(id, data) {
    return api.put(`/instituicao/${id}`, data)
  },
  deletarInstituicao(id) {
    return api.delete(`/instituicao/${id}`)
  },
  // CRUD DOADOR
  getDoadores() {
    return api.get('/doador')
  },
  getDoador(id) {
    return api.get(`/doador/${id}`)
  },
  criarDoador(data) {
    return api.post('/doador', data)
  },
  atualizarDoador(id, data) {
    return api.put(`/doador/${id}`, data)
  },
  deletarDoador(id) {
    return api.delete(`/doador/${id}`)
  },
  // CRUD REFEIÇÃO
  getRefeicoes() {
    return api.get('/refeicao')
  },
  getRefeicao(id) {
    return api.get(`/refeicao/${id}`)
  },
  criarRefeicao(data) {
    return api.post('/refeicao', data)
  },
  atualizarRefeicao(id, data) {
    return api.put(`/refeicao/${id}`, data)
  },
  deletarRefeicao(id) {
    return api.delete(`/refeicao/${id}`)
  },
  // LOGOUT
  logout() {
    localStorage.removeItem('token')
    localStorage.removeItem('tipo')
  },
}
