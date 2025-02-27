# Projeto Backend - Top 5 Músicas Tião Carreiro & Pardinho

## Descrição

Este é o backend da aplicação que gerencia a lista das 5 músicas mais tocadas de Tião Carreiro & Pardinho, permitindo que usuários autenticados sugiram novas músicas via link do YouTube. O projeto também permite que administradores gerenciem as sugestões e a lista de músicas.

## Tecnologias utilizadas

- **Backend**: Laravel 11
- **Banco de Dados**: PostgreSQL
- **Containerização**: Docker

---

## Instalação do projeto

> **Requisitos:** Docker instalado na máquina.

### Passo 1 - Clonar o repositório

```bash
  git clone https://github.com/samuelvinib/projeto-Techpines-backend
  cd projeto-Techpines-backend
```

### Passo 2 - Configurar e iniciar os containers

```bash
  docker-compose up -d --build
```

### Passo 3 - Configurar o backend (Laravel)

Acesse o container da API:

```bash
  docker exec -it tech_pines_api bash
```

Dentro do container, execute:

```bash
  php artisan migrate --seed
```

---

## Funcionalidades

- Exibe o ranking das 5 músicas mais populares.
- Exibe todas as músicas, com paginação.
- Usuários autenticados podem sugerir novas músicas via link do YouTube.
- Administradores podem aprovar/reprovar sugestões e gerenciar a lista de músicas.
- Sistema de autenticação e autorização.
- API REST para comunicação com o frontend.

---

## Usuários de acesso

---
admin:
```bash
  admin@example.com
```
```bash
password123
```

usuário:
```bash
  user@example.com
```
```bash
password123
```
---

## Acesso à API

Após a instalação e execução dos containers, a API estará rodando em:

```bash
  http://localhost:8000
```
