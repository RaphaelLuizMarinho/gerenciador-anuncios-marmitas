<template>
  <div class="min-h-screen bg-gradient-to-b from-red-100 via-green-100 to-orange-100 p-10">
    <h1 class="text-center text-3xl font-bold text-red-600 mb-10">Gerenciar Anúncios</h1>

    <div class="text-right mb-6">
      <button
        @click="router.push('/cadastroanuncios')"
        class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
      >
        Novo Anúncio
      </button>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <div
        v-for="refeicao in refeicoes"
        :key="refeicao.id"
        class="bg-white p-6 rounded-2xl shadow-lg text-center"
      >
        <h2 class="text-xl font-bold text-red-600">{{ refeicao.nome }}</h2>
        <p class="text-gray-700 mt-2">{{ refeicao.descricao }}</p>
        <p class="text-gray-600 text-sm mt-1">Quantidade: {{ refeicao.quantidade }}</p>

        <div class="mt-4 space-y-2">
          <button
            @click="editar(refeicao.id)"
            class="w-full bg-orange-500 text-white py-1 rounded hover:bg-orange-700 transition"
          >
            Editar
          </button>
          <button
            @click="deletar(refeicao.id)"
            class="w-full bg-red-500 text-white py-1 rounded hover:bg-red-700 transition"
          >
            Deletar
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useRouter } from 'vue-router'
import services from '@/services/services'

const refeicoes = ref([])
const router = useRouter()

const carregar = async () => {
  const { data } = await services.getRefeicoes()
  refeicoes.value = data
}

const editar = (id) => {
  router.push(`/editaranuncios/${id}`)
}

const deletar = async (id) => {
  await services.deletarRefeicao(id)
  await carregar()
}

onMounted(() => {
  carregar()
})
</script>
