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

6. **Set up and use XAMPP**
   Start XAMPP: Open the XAMPP Control Panel and launch Apache and MySQL. 

   **Configuration XAMPP:**
   Move your project's directory to the XAMPP htdocs directory. It is typically located at C:\xampp\htdocs on Windows or /opt/lampp/htdocs on Linux.
   In your browser, go to http://localhost/vacation-plan/public to view your project .


**Other Information**

- Tools used: Laravel 11, domPDF for PDF generation. 
- Other features: Email testing using Mailtrap.io. 
- Note: All the code is commented to make it easier for those who download the project to understand. 


