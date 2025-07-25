<template>
  <div class="flex items-center justify-center min-h-screen bg-gradient-to-b from-red-100 via-green-100 to-orange-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold text-red-600 text-center mb-6">Cadastro de Instituição</h2>

      <form @submit.prevent="cadastrar">
        <div v-for="(campo, key) in campos" :key="key" class="mb-4">
          <label :for="key" class="block text-gray-700">{{ campo.label }}</label>
          <input
            v-model="entidade[key]"
            :type="campo.type"
            :id="key"
            :placeholder="campo.placeholder"
            class="w-full px-4 py-2 border border-green-400 rounded-md focus:outline-none focus:ring-2 focus:ring-green-500"
            required
            @blur="key === 'cep' ? buscarCep() : (key === 'cnpj' ? buscarCNPJ() : null)"
          />
        </div>

        <button type="submit" class="w-full bg-red-500 text-white py-2 rounded hover:bg-red-600 transition">
          Cadastrar
        </button>
      </form>

      <p v-if="mensagem" class="text-green-600 mt-4 text-center font-medium">{{ mensagem }}</p>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue'
import services from '@/services/services'
import { useRouter } from 'vue-router'

const router = useRouter()
const mensagem = ref('')
const cnpjValido = ref(false)

const entidade = ref({
  cnpj: '',
  nome: '',
  email: '',
  senha: '',
  telefone: '',
  cep: '',
  logradouro: '',
  complemento: '',
  bairro: '',
  cidade: '',
  uf: '',
  crn_responsavel: '',
  status_recebimento: 'ativo'
})

const campos = {
  cnpj: { label: 'CNPJ', type: 'text', placeholder: 'Digite o CNPJ' },
  nome: { label: 'Nome', type: 'text', placeholder: 'Digite o nome' },
  email: { label: 'Email', type: 'email', placeholder: 'Digite o email' },
  senha: { label: 'Senha', type: 'password', placeholder: 'Digite a senha' },
  telefone: { label: 'Telefone', type: 'text', placeholder: 'Digite o telefone' },
  cep: { label: 'CEP', type: 'text', placeholder: 'Digite o CEP' },
  logradouro: { label: 'Logradouro', type: 'text', placeholder: 'Digite o logradouro' },
  complemento: { label: 'Complemento', type: 'text', placeholder: 'Digite o complemento' },
  bairro: { label: 'Bairro', type: 'text', placeholder: 'Digite o bairro' },
  cidade: { label: 'Cidade', type: 'text', placeholder: 'Digite a cidade' },
  uf: { label: 'UF', type: 'text', placeholder: 'Digite o estado' },
  crn_responsavel: { label: 'CRN do Responsável', type: 'text', placeholder: 'Digite o CRN' }
}

const cadastrar = async () => {
  if (!cnpjValido.value) {
    mensagem.value = 'CNPJ inválido ou não validado. Verifique antes de cadastrar.'
    return
  }
  try {
    await services.criarInstituicao(entidade.value)
    mensagem.value = 'Cadastro realizado com sucesso!'
    setTimeout(() => router.push('/'), 2000)
  } catch (err) {
    mensagem.value = 'Erro ao cadastrar instituição.'
    console.error(err)
  }
}

const buscarCep = async () => {
  const cep = entidade.value.cep.replace(/\D/g, '')
  if (cep.length !== 8) {
    return
  }

  try {
    const response = await fetch(`https://viacep.com.br/ws/${cep}/json/`)
    const data = await response.json()

    if (data.erro) {
      mensagem.value = 'CEP não encontrado.'
      return
    }

    entidade.value.logradouro = data.logradouro
    entidade.value.bairro = data.bairro
    entidade.value.cidade = data.localidade
    entidade.value.uf = data.uf
    entidade.value.complemento = data.complemento

  } catch (error) {
    console.error('Erro ao buscar CEP:', error)
  }
}

const buscarCNPJ = async () => {
  const cnpj = entidade.value.cnpj.replace(/[^\d]+/g, '')
  if (cnpj.length !== 14) {
    mensagem.value = 'CNPJ inválido.'
    cnpjValido.value = false
    return
  }

  try {
    const response = await fetch(`https://brasilapi.com.br/api/cnpj/v1/${cnpj}`)
    console.log(response)
    if (!response.ok) {
      mensagem.value = 'CNPJ não encontrado na Receita Federal.'
      cnpjValido.value = false
      return
    }

    mensagem.value = 'CNPJ válido e encontrado.'
    cnpjValido.value = true

  } catch (error) {
    console.error('Erro ao buscar CNPJ:', error)
    mensagem.value = 'Erro ao buscar CNPJ.'
    cnpjValido.value = false
  }
}

</script>
