<template>
  <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-red-100 via-green-100 to-orange-100 p-6">
    <div class="bg-white p-8 rounded-2xl shadow-xl w-full max-w-2xl text-center">
      <h2 class="text-3xl font-bold text-red-600 mb-4">{{ refeicao.nome }}</h2>
      <p class="text-gray-700 mb-2">{{ refeicao.descricao }}</p>
      <p class="text-sm text-gray-500 mb-4">Ingredientes: {{ refeicao.igredientes }}</p>
      <p class="text-sm text-gray-600">Local de Retirada: {{ refeicao.local_retirada }}</p>
      <p class="text-sm text-gray-600">Armazenamento: {{ refeicao.modo_armazenamento }}</p>
      <p class="text-gray-700 mt-2">Disponível: <strong>{{ refeicao.quantidade }}</strong></p>

      <button
        @click="reservar"
        class="mt-6 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-800 transition"
      >
        Reservar
      </button>

      <p v-if="mensagem" class="text-green-600 mt-4 font-medium">{{ mensagem }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import { useRoute } from 'vue-router'
import services from '@/services/services'

const route = useRoute()
const refeicao = ref({})
const mensagem = ref('')

const carregar = async () => {
  const { data } = await services.getRefeicao(route.params.id)
  refeicao.value = data
}

const reservar = async () => {
  if (refeicao.value.quantidade > 0) {
    refeicao.value.quantidade--
    await services.atualizarRefeicao(refeicao.value.id, refeicao.value)
    mensagem.value = 'Reserva realizada com sucesso!'
  } else {
    mensagem.value = 'Não há mais unidades disponíveis.'
  }
}

onMounted(() => {
  carregar()
})
</script>
