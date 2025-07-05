<template>
  <div class="min-h-screen bg-gradient-to-b from-red-100 via-green-100 to-orange-100 p-10">
    <h1 class="text-center text-3xl font-bold text-red-600 mb-10">Marmitas Disponíveis</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
      <div
        v-for="refeicao in refeicoes"
        :key="refeicao.id"
        class="bg-white p-6 rounded-2xl shadow-lg text-center cursor-pointer hover:shadow-xl"
        @click="detalhar(refeicao.id)"
      >
        <h2 class="text-xl font-bold text-red-600">{{ refeicao.nome }}</h2>
        <p class="text-gray-700 mt-2">{{ refeicao.descricao }}</p>
        <p class="text-gray-600 text-sm mt-1">Quantidade: {{ refeicao.quantidade }}</p>
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

const detalhar = (id) => {
  router.push(`/anuncios/${id}`)
}

onMounted(() => {
  carregar()
})
</script>
