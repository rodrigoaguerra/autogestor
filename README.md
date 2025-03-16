# 🛠️ Sistema de Gestão de Usuários e Permissões

Este projeto é um sistema de autenticação e controle de acesso desenvolvido com Laravel e MySQL, utilizando **Spatie Permission** para gerenciamento de papéis e permissões.

## 🚀 Tecnologias Utilizadas

- Laravel (Última versão estável)
- Banco de dados MySQL
- Bootstrap (para o layout)
- Spatie Laravel Permission (Gerenciamento de permissões)
- Laravel Breeze (Autenticação)

## 📌 1. Instalação do Projeto
Siga os passos abaixo para instalar e configurar o sistema em sua máquina.


### 🔹 1.1 Clonar o Repositório
```sh
git clone https://github.com/rodrigoaguerra/autogestor.git
cd autogestor
```
### 🔹 1.2 Instalar Dependências
```sh
composer install
npm install
```

### 🔹 1.3 Configurar o Banco de Dados
1. **Crie um banco de dados no MySQL**
2. **Copie o arquivo de configuração**
```sh
cp .env.example .env
```
3. **Edite o arquivo** .env e configure a conexão com o banco:
```ini
DB_CONNECTION=mysql
DB_HOST=localhost
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=sua_senha
```
### 🔹 1.4 Gerar a Key do Laravel
```sh
php artisan key:generate
```

### 🔹 1.5 Executar as Migrations e Seeders
```sh
php artisan migrate --seed
```
#### O Seeder cria um usuário admin automaticamente:
 - **Email:** admin@example.com
 - **Senha:** password
 - **Nível:** admin

#### O Seeder cria um usuário comum automaticamente:
 - **Email:** user@example.com
 - **Senha:** password
 - **Nível:** comum

### 🔹 1.6 Iniciar o Servidor
```sh
php artisan serve
```
O sistema estará disponível em: http://localhost:8000


## 📌 2. Funcionalidades
- ✅ Login e Registro de Usuários
- ✅ Admin pode gerenciar papéis e permissões
- ✅ Controle de acesso com Spatie
- ✅ Painel básico com Bootstrap

Papéis padrão criados no Seeder:
- **admin**: Pode gerenciar usuários e permissões
- **comum**: Acesso as funcinalidade de gestão de produtos, gestão de categorias e gestão de marcas

## 📌 3. Créditos
Desenvolvido por **Rodrigo Alves Guerra 🖥️🚀**
Baseado na documentação do **Spatie Laravel Permission**.

