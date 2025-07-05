<template>
  <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-red-100 via-green-100 to-orange-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
          <img style="height: 100px; width: 110px; justify-self: center; padding-bottom: 15px;" :src="Logo" alt="Logo" />
      <h2 class="text-2xl font-bold text-red-600 text-center mb-6">Login</h2>

      <div class="mb-4">
        <label class="block text-gray-700">Email</label>
        <input
          type="email"
          placeholder="Digite seu email"
          v-model="email"
          class="w-full px-4 py-2 border border-green-400 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
        />
      </div>

      <div class="mb-6">
        <label class="block text-gray-700">Senha</label>
        <input
          type="password"
          placeholder="Digite sua senha"
          v-model="senha"
          class="w-full px-4 py-2 border border-orange-400 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500"
        />
      </div>

      <button @click="logar" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">
        Entrar
      </button>

      <p v-if="mensagem" class="text-center text-red-600 font-medium mt-4">{{ mensagem }}</p>

      <p class="text-center text-sm text-gray-600 mt-4">
        Não tem uma conta?
      </p>
      <p class="text-center text-sm text-gray-600">
        <a @click="cadastrarDoador" href="#" class="text-green-600 hover:underline">Cadastre-se Como Doador</a>
        <br>
        <a @click="cadastrarEntidade" href="#" class="text-green-600 hover:underline">Cadastre-se Como Instituição</a>
      </p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import services from '@/services/services'
import Logo from '@/assets/logo.png'

const email = ref('')
const senha = ref('')
const mensagem = ref('')
const router = useRouter()

const logar = async () => {
  mensagem.value = ''
  try {
    const data = await services.login(email.value, senha.value)
    console.log('Login bem-sucedido:', data)
    if (data.tipo === 'doador') {
      router.push('/gerenciadoranuncios')
    } else if (data.tipo === 'instituicao') {
      router.push('/anuncios')
    }
  } catch (err) {
    console.error('Erro ao logar:', err)
    mensagem.value = 'Email ou senha inválidos.'
  }
}

const cadastrarEntidade = () => {
  router.push('/cadastroentidade')
}
const cadastrarDoador = () => {
  router.push('/cadastrodoador')
}
</script>
