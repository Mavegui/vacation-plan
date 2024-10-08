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
- **PHP Artisan Serve**: For local server environment (replaces XAMPP)
  
## Installation

To get started with this project, follow these steps:

1. **Clone the Repository**

   ```bash
   git clone https://github.com/mavegui/vacation-plan.git
2. **Install the project dependencies**
   Navigate to the project directory:

   ```bash
   cd vacation-plan
   composer install
3. **Set up the environment**

   Copy the example environment file and configure your environment variables, including database credentials and email provider settings:
   
   ```bash
   cp .env.example .env
4. **Generate the application key**

   ```bash
   php artisan key:generate
5. **Run the migrations to create the tables in the database**

   ```bash
   php artisan migrate

6. **Serve the Application**

   Use Laravel's built-in server to serve the application:
   
   ```bash
   php artisan serve
**Other Information**

- Tools used: Laravel 11, domPDF for PDF generation. 
- Other features: Email testing using Mailtrap.io. 
- Note: All the code is commented to make it easier for those who download the project to understand. 


