🇧🇷 Português | [🇺🇸 English](README.en.md)

---

![Banner](https://github.com/user-attachments/assets/f3a566c3-d0b1-48af-b65d-5cfe6e109383)

### Um sistema web para gerenciamento de tarefas com autenticação, prioridades e controle de status, desenvolvido com Laravel.

---

## Funcionalidades

* Autenticação de usuários (registro, login e logout)
* CRUD completo de tarefas
* Definição de prioridade (baixa, média, alta)
* Data de entrega opcional
* Marcar tarefas como concluídas
* Ordenação por prazo
* Isolamento de tarefas por usuário
* Feedback visual (mensagens de sucesso e erro)

---

## Estrutura da aplicação

```
app/
├── Models/
├── Http/
│   ├── Controllers/
│   └── Requests/
resources/
└── views/
routes/
└── web.php
database/
└── migrations/
```

---

## Como funciona

O sistema permite que cada usuário:

1. Crie uma conta e faça login
2. Cadastre novas tarefas
3. Edite ou exclua tarefas existentes
4. Defina prioridade e data de entrega
5. Marque tarefas como concluídas
6. Visualize suas tarefas organizadas por prazo

Cada usuário só pode acessar suas próprias tarefas.

---

## Tecnologias utilizadas

* PHP 8+
* Laravel
* Blade
* Tailwind CSS
* PostgreSQL

---

## Screenshots

### Tasks

![Tasks](https://github.com/user-attachments/assets/d9d8c2ee-2590-4479-9d0c-79b28887812a)

---

### Criar / Editar Task

![Form1](https://github.com/user-attachments/assets/a5c28bf3-d549-4639-bd38-27a66081caa0)
![Form2](https://github.com/user-attachments/assets/c6dd3497-7f94-4bd5-9163-51a9d55cc722)

---

### Editar Perfil

![Perfil](https://github.com/user-attachments/assets/d0b4f527-831f-4771-aa8a-0a89341b1672)

---

### Excluir Conta

![Excluir](https://github.com/user-attachments/assets/166192a0-76c7-42a6-9b6f-24387fbbd75e)

---

## Como usar

### 1. Clone o repositório

```bash
git clone https://github.com/Eliezer-M-07/Personal-Task-Manager.git
cd Personal-Task-Manager
```

---

### 2. Instale as dependências

```bash
composer install
```

---

### 3. Configure o ambiente

```bash
cp .env.example .env
```

Edite o `.env` com suas configurações de banco:

```
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

---

### 4. Gere a chave da aplicação

```bash
php artisan key:generate
```

---

### 5. Execute as migrations

```bash
php artisan migrate
```

---

### 6. Inicie o servidor e o Vite

```bash
php artisan serve
npm run dev
```

Acesse no navegador:

```
http://127.0.0.1:8000
```

---

## Observações

* Cada usuário só acessa suas próprias tarefas
* Campos são validados antes de salvar
* Tarefas podem ser criadas sem data de entrega
* Tarefas sem data são exibidas após as demais

---

## Possíveis melhorias futuras

* Filtros por status (pendente, concluída, atrasada)
* Busca por tarefas
* Upload de arquivos
* Notificações
* API REST

---

## Contribuição

Sinta-se à vontade para abrir issues ou enviar pull requests!

---

## Licença

Este projeto está sob a licença MIT.
