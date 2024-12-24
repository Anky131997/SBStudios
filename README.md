# SBStudios

SBStudios is a web application built from scratch for an upcoming startup company. It is designed to showcase the services offered by the company and streamline job requests from users. The platform is developed using Laravel, Bootstrap, and basic MySQL for database management.

## Table of Contents
- [About the Project](#about-the-project)
- [Technologies Used](#technologies-used)
- [Features](#features)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)
- [Contact](#contact)

---

## About the Project

The SBStudios website is a feature-rich, custom-built web platform designed specifically for an upcoming startup company. Developed from the ground up using Laravel for the backend and Bootstrap for the frontend, this project emphasizes performance, scalability, and a seamless user experience. It caters to two distinct user groups with dedicated functionalities:

### Guest Side

The guest side serves as the public-facing section of the website, designed to engage visitors and provide comprehensive information about the company's services. Key features include:

* Service Showcase: A detailed and visually appealing display of all the services offered by the company, enabling visitors to explore and understand what the company provides.
* Job Request System: Visitors can easily submit job requests for specific services through an intuitive and straightforward interface, ensuring smooth interaction and lead generation.

This section prioritizes accessibility and ease of use, providing potential customers with a welcoming and informative entry point to interact with the company.

### Admin Panel

The admin panel is the management hub of the platform, designed exclusively for authorized users to oversee and handle operations efficiently. Key features include:

* Job Request Management: Admins can view, track, and manage all job requests submitted by visitors. This includes tools to update the status of requests, assign tasks, and maintain customer communication.
* Secure Access: The admin panel is secured to ensure only authorized users can log in, protecting sensitive data and administrative controls.
* Scalability: The system is designed to accommodate growth, allowing the admin panel to handle increasing job requests as the company expands.

---

## Technologies Used

1. **Laravel (PHP Framework)**

The backend of the website is powered by Laravel, a modern PHP framework known for its elegant syntax and robust features. Laravel simplifies complex backend tasks with:

* Routing and Middleware: For secure and efficient navigation across pages.
* Eloquent ORM: For seamless interaction with the database using object-oriented syntax.
* Blade Templating Engine: To create dynamic and reusable views efficiently.
* Authentication: Built-in mechanisms for secure admin access.

2. **Bootstrap**

The frontend of the website utilizes Bootstrap, a popular CSS framework, to ensure:

* Mobile Responsiveness: A consistent and optimized user experience across all screen sizes.
* Pre-styled Components: Quick and reliable UI development with built-in styles and components.
* Customizable Design: Flexibility to tailor styles while maintaining a cohesive look and feel.

3. **MySQL**

The website's database is managed with MySQL, a reliable and widely used relational database. It is used to:

* Store and manage job requests, service data, and user information.
* Ensure data consistency and integrity.
* Handle queries efficiently, even as the application scales.

4. **Node.js and NPM**

Node.js and NPM are used for managing frontend dependencies and building assets. These technologies enable:

* Webpack and Mix Integration: To compile CSS and JavaScript files for optimal performance.
* Package Management: Easy installation and management of frontend libraries and tools.

5. **Version Control with Git**

Git is used for version control, enabling:

* Collaborative Development: Efficiently track and merge changes across the development team.
* Code Backup and Recovery: Safely manage project history and rollbacks when needed.

6. **Modern Development Environment**

The project is designed to be compatible with modern development environments, using tools like:

* Composer: For managing Laravel dependencies.
* Database Management Tools: phpMyAdmin - For interacting with and managing the MySQL database.

---

## Features

* **Fully Dynamic:**
The website is built to be fully dynamic, allowing seamless updates and content management for services and job requests without requiring code modifications.

* **Mobile Responsive:**
Designed with a mobile-first approach using Bootstrap, ensuring optimal user experience across all devices, including desktops, tablets, and smartphones.

* **Service Showcase:**
A dedicated section to display all the services offered by the company, providing users with detailed insights into what the business provides.

* **Job Request Functionality:**
Visitors can request specific services directly from the guest side, simplifying lead generation and client interaction.

* **Secure Admin Panel:**
An exclusive backend for authorized users to manage and process job requests, equipped with secure authentication mechanisms.

* **User-Friendly Interface:**
The intuitive UI/UX ensures smooth navigation for both visitors and administrators.

* **Efficient Database Management:**
MySQL database integration for secure storage and efficient handling of all user data, including service requests.

* **Scalable Architecture:**
The system is designed to support future enhancements, such as new service additions, user roles, and advanced analytics.

* **Built with Modern Web Technologies:**
Developed using Laravel and Bootstrap, ensuring robustness, flexibility, and maintainability.

---

## Getting Started

### Prerequisites

Before setting up and running the SBStudios project, ensure that the following prerequisites are met:

1. **Server Requirements**

* **PHP**: Version 8.1 or higher.
* **Web Server**: Apache or Nginx (Configured to support Laravel).
* **Database**: MySQL 5.7 or higher / MariaDB.

2. **Development Tools**

* **Composer**: Dependency manager for PHP.
* **Node.js**: Version 18.x or higher (for frontend asset compilation).
* **NPM/Yarn**: Included with Node.js, used for managing frontend dependencies.
* **Git**: For version control and cloning the repository.

### Installation

To install and run the SBStudios project, follow these steps:

**Setup Instructions:**

1. **Clone the Repository**
```
git clone https://github.com/Anky131997/SBStudios.git
```

2. **Install dependencies**
```
composer install
npm install
```

3. Copy the .env.example file to .env and update the database configurations. After that, run the following command to generate the 'APP_KEY':
```
php artisan key:generate
```

4. **Migrate the Database**
```
php artisan migrate
```

5. **Seed the Database**
```
php artisan db:seed
```

6. **Start the Development Server**
```
php artisan serve
```

7. Access the application at http://localhost:8000

---

## Contact

For any questions or issues, please contact the project maintainer at [ankanpolley0@gmail.com](mailto:ankanpolley0@gmail.com).