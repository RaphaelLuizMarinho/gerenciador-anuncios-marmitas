<template>
  <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-red-100 via-green-100 to-orange-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold text-red-600 text-center mb-6">Cadastrar Marmita</h2>

      <form @submit.prevent="cadastrar">
        <div class="mb-4">
          <label class="block text-gray-700">Nome</label>
          <input v-model="form.nome" class="w-full px-4 py-2 border border-green-400 rounded-md" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700">Descrição</label>
          <input v-model="form.descricao" class="w-full px-4 py-2 border border-green-400 rounded-md" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700">Ingredientes</label>
          <input v-model="form.igredientes" class="w-full px-4 py-2 border border-green-400 rounded-md" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700">Quantidade</label>
          <input type="number" v-model="form.quantidade" class="w-full px-4 py-2 border border-green-400 rounded-md" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700">Local de Retirada</label>
          <input v-model="form.local_retirada" class="w-full px-4 py-2 border border-green-400 rounded-md" required />
        </div>

        <div class="mb-4">
          <label class="block text-gray-700">Modo de Armazenamento</label>
          <input v-model="form.modo_armazenamento" class="w-full px-4 py-2 border border-green-400 rounded-md" required />
        </div>

        <div class="flex gap-4 mb-6">
          <div class="w-1/2">
            <label class="block text-gray-700">Data Fabricação</label>
            <input type="date" v-model="form.data_fabricacao" class="w-full px-4 py-2 border border-orange-400 rounded-md" required />
          </div>
          <div class="w-1/2">
            <label class="block text-gray-700">Data Validade</label>
            <input type="date" v-model="form.data_validade" class="w-full px-4 py-2 border border-orange-400 rounded-md" required />
          </div>
        </div>

        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">
          Cadastrar
        </button>
        <p v-if="mensagem" class="text-green-600 mt-4 text-center font-medium">{{ mensagem }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import { useRouter } from 'vue-router'
import services from '@/services/services'

const router = useRouter()
const mensagem = ref('')

const form = ref({
  nome: '',
  descricao: '',
  quantidade: '',
  data_fabricacao: '',
  data_validade: '',
  igredientes: '',
  local_retirada: '',
  modo_armazenamento: ''
})

const cadastrar = async () => {
  try {
    await services.criarRefeicao(form.value)
    mensagem.value = 'Cadastro realizado com sucesso!'
    setTimeout(() => router.push('/gerenciadoranuncios'), 2000)
  } catch (err) {
    mensagem.value = 'Erro ao cadastrar anúncio.'
    console.error(err)
  }
}
</script>
