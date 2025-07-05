# 🍱 Sistema de Doação de Marmitas

Este projeto é um sistema completo (API Backend + Frontend) desenvolvido como **Trabalho de Graduação** no curso de **Análise e Desenvolvimento de Sistemas**.

O objetivo da aplicação é **conectar doadores e instituições de caridade**, permitindo o gerenciamento e o anúncio de **doações de marmitas**, promovendo o combate ao desperdício de alimentos e incentivando ações solidárias.

---

## 🚀 Tecnologias Utilizadas

### 🔧 Backend (API RESTful)
- **Laravel 12 (PHP)**
- Laravel Sanctum (Autenticação via token)
- MySQL (Banco de Dados)

### 💻 Frontend
- **Vue.js 3 + Vite**
- TailwindCSS (Estilização moderna)
- Axios (Consumo de API)
- Vue Router

---

## 📱 Funcionalidades

### 🔐 Autenticação
- Login com diferenciação entre **Doador** e **Instituição**
- Geração de Token JWT com Laravel Sanctum

### 👤 Módulo Doador
- Cadastro com validação automática de **CEP** e **CNPJ**
- Gerenciamento de anúncios de marmitas
- Edição e exclusão dos seus próprios anúncios

### 🏥 Módulo Instituição
- Visualização de anúncios
- **Reserva de marmitas** com atualização automática da quantidade disponível

### 📦 Refeições (Anúncios)
- Cadastro, edição e exclusão
- Visualização detalhada
- Quantidade de marmitas disponível

---

## 🔗 Estrutura das Rotas da API

| Método | Endpoint           | Descrição                       |
|--------|--------------------|---------------------------------|
| POST   | `/login`           | Login de doador ou instituição |
| GET    | `/instituicao`     | Lista instituições             |
| POST   | `/instituicao`     | Cadastra instituição           |
| GET    | `/doador`          | Lista doadores                 |
| POST   | `/doador`          | Cadastra doador                |
| GET    | `/refeicao`        | Lista anúncios de marmitas     |
| POST   | `/refeicao`        | Cadastra anúncio               |
| PUT    | `/refeicao/{id}`   | Atualiza anúncio               |
| DELETE | `/refeicao/{id}`   | Remove anúncio                 |

---

## 📁 Organização do Projeto

```bash
📦 api-laravel-marmitas/
├── app/
│   └── Models/
│       ├── Doador.php
│       ├── Instituicao.php
│       └── Refeicao.php
├── routes/
│   └── api.php
├── database/
│   └── migrations/
└── ...

📦 frontend-vue-marmitas/
├── src/
│   ├── views/
│   │   ├── HomeView.vue
│   │   ├── CadastroDoadorView.vue
│   │   ├── CadastroEntidadeView.vue
│   │   ├── GerenciadorAnunciosView.vue
│   │   ├── AnunciosView.vue
│   │   └── DetalheAnuncioView.vue
│   └── services/
│       └── services.js
└── ...
```

📚 Sobre o Projeto
Este sistema foi desenvolvido como parte do Trabalho de Conclusão de Curso (TCC) na faculdade de Análise e Desenvolvimento de Sistemas, com o propósito de aplicar os conhecimentos adquiridos durante a graduação em:

- Programação Web (Frontend e Backend)

- APIs RESTful

- Autenticação segura

- Arquitetura MVC

- Integração Front + Back

- Melhoria de qualidade de vida social


✅ Para rodar o projeto
### Backend Laravel
```bash
  cd api-laravel-marmitas
  composer install
  cp .env.example .env
  php artisan key:generate
  php artisan migrate
  php artisan serve
```
### Frontend Vue
```bash
  cd frontend-vue-marmitas
  npm install
  npm run dev
```
