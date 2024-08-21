# Vacation Plan Project

## About

This project is a challenge proposed by [Buzzvel](https://buzzvel.com/) for a developer position. It showcases the development of a vacation planning system, including features such as CRUD operations, PDF generation, and user management. The goal is to demonstrate skills in Laravel development and best practices.

## Features

- CRUD operations for vacation plans
- PDF generation for vacation plans
- User authentication and management
- Dashboard for viewing and managing vacation plans

## Requirements

- **PHP**: 8.1 or higher
- **Composer**: PHP dependency manager
- **Laravel**: 11
- **MySQL**: or other database supported by Laravel
- **Mailtrap.io**: For testing email sending or another of your choice
- **XAMPP**: For local server environment
  
## Installation

To get started with this project, follow these steps:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/mavegui/vacation-plan.git
2. **Install the project dependencies**

   ```bash
   composer install
3. **Set up the environment**
   Edit the .env file and configure the environment variables, including the database credentials and the email provider settings for password reset.

   ```bash
   cp .env.example .env
4. **Generate the application key**

   ```bash
   php artisan key:generate
5. **Run the migrations to create the tables in the database**

   ```bash
   php artisan migrate

6. **Configurar e usar o XAMPP**
   Inicie o XAMPP: Abra o XAMPP Control Panel e inicie o Apache e o MySQL.

   **Configuração do XAMPP:**
   Mova o diretório do seu projeto para o diretório htdocs do XAMPP. Normalmente, ele está localizado em C:\xampp\htdocs no Windows ou /opt/lampp/htdocs no Linux.
   No navegador, acesse http://localhost/vacation-plan/public para visualizar o projeto.


**Outras Informações**

- Ferramentas usadas: Laravel 11, domPDF para geração de PDFs.
- Outros recursos: Testes de e-mail usando Mailtrap.io.
- Observação: Todo o código está comentado para facilitar o entendimento de quem baixar o projeto.


