<template>
  <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-red-100 via-green-100 to-orange-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold text-red-600 text-center mb-6">Editar Marmita</h2>

      <form @submit.prevent="editar">
        <div v-for="(value, key) in refeicao" :key="key" class="mb-4">
          <label class="block text-gray-700 capitalize">{{ key.replace('_', ' ') }}</label>
          <input
            v-model="refeicao[key]"
            class="w-full px-4 py-2 border border-green-400 rounded-md"
            :type="['data_fabricacao', 'data_validade'].includes(key) ? 'date' : 'text'"
            :disabled="key === 'id'"
          />
        </div>

        <button class="w-full bg-orange-500 text-white py-2 rounded hover:bg-orange-600 transition">
          Salvar Alterações
        </button>

        <p v-if="mensagem" class="text-green-600 mt-4 text-center font-medium">{{ mensagem }}</p>
      </form>
    </div>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import services from '@/services/services'

const route = useRoute()
const router = useRouter()
const refeicao = ref({})
const mensagem = ref('')

onMounted(async () => {
  const { data } = await services.getRefeicao(route.params.id)
  refeicao.value = data
})

const editar = async () => {
  await services.atualizarRefeicao(refeicao.value.id, refeicao.value)
  mensagem.value = 'Anúncio atualizado com sucesso!'
  setTimeout(() => router.push('/gerenciadoranuncios'), 2000)
}
</script>
