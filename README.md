
# Building Management System

> A Laravel-based web application to manage building details, calculate utility bills, and edit tariff rates for different building types.

## Project Overview

This project was developed as part of a technical assessment to create an efficient, user-friendly **Building Management System**. It includes features like CRUD operations for building data, utility bill calculations based on tariff rates, and tariff management. The system covers specific requirements for managing building information, calculating electricity costs based on usage, and editing tariff rates for each building type.

This project demonstrates proficiency in Laravel, database management, and front-end design using Bootstrap, showcasing skills in full-stack web development and an ability to implement practical, user-friendly features.

---

## System Flow

### 1. Building Management
   - Users can **create**, **edit**, **view**, and **delete** building records.
   - Each building record includes the **customer name**, **building type**, **usage (kWh)**, **state**, and **billing month**.

### 2. Bill Calculation Report
   - The system calculates the electricity bill based on building type and usage.
   - Different rates apply to **Residential** and **Commercial** buildings.
   - A report page summarizes all buildings with calculated bills for easy review.

### 3. Tariff Editor
   - Admins can edit tariff rates for each building type.
   - The rates can be updated in a dedicated page, which affects the bill calculations in real-time.

### 4. Navigation & User Interface
   - A navigation bar and breadcrumb system provide smooth navigation across the Building List, Bill Report, and Tariff Editor.
   - The active and hover states enhance the navigation experience.

---

## Key Questions Addressed

1. **How to Manage Building Data Efficiently?**
   - A CRUD interface for adding, updating, and deleting buildings ensures data is organized and up-to-date.

2. **How to Calculate Bills Based on Usage and Building Type?**
   - A custom billing logic calculates costs based on **200 kWh** limits and differentiates between **Residential** and **Commercial** buildings, which have distinct rates.

3. **How to Edit Tariff Rates?**
   - A dedicated Tariff Editor page allows admins to modify rates for each building type.

4. **How to Make the Interface User-Friendly?**
   - Simple navigation with breadcrumbs and clear page titles ensures intuitive use.
   - Hover effects and active state indicators improve user experience.

---

## Technologies Used

### 1. Laravel
   - **Description**: Laravel is a PHP framework that provides a structured, MVC-based development environment.
   - **Usage**: Laravel was used to build the backend for handling business logic, routing, and database interactions.
   - **Why**: Laravel offers built-in tools for CRUD operations, validation, and Eloquent ORM, simplifying data handling and relationships.

### 2. Blade Templates
   - **Description**: Blade is Laravel’s default templating engine.
   - **Usage**: Used to create and structure HTML pages with reusable components (e.g., navigation bar, breadcrumbs).
   - **Why**: Blade allows for clean, modular, and reusable code, which aids in maintaining a consistent UI.

### 3. MySQL
   - **Description**: MySQL is a relational database management system.
   - **Usage**: MySQL stores all building, tariff, and user data in structured tables.
   - **Why**: MySQL is widely supported, integrates easily with Laravel using eloquent, and provides robust data management capabilities.

### 4. Bootstrap
   - **Description**: Bootstrap is a CSS framework for responsive design.
   - **Usage**: Bootstrap is used for styling pages, creating navigation bars, and adding components like buttons and forms.
   - **Why**: Bootstrap speeds up development with pre-styled components, ensuring a responsive and polished UI across devices. Easily included using CDN.

### 5. Git & GitHub
   - **Description**: Git is a version control system, and GitHub is a code hosting platform.
   - **Usage**: Git tracks code changes, and GitHub hosts the project repository for version management and collaboration.
   - **Why**: Git and GitHub ensure that code changes are tracked, allowing for easy rollbacks and collaborative development.

### 6. Composer
   - **Description**: Composer is a PHP dependency manager.
   - **Usage**: Used to install and manage Laravel and other PHP packages.
   - **Why**: Composer allows for easy installation and management of Laravel and its dependencies.

---

## Development Environment

- **Laragon**: Used as the local development environment, providing a ready-to-use setup with PHP, MySQL, and Node.js support.
- **Visual Studio Code (VSCode)**: Chosen as the code editor for its powerful extensions, syntax highlighting, and Git integration.

---

## Setup & Installation

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/YOUR_GITHUB_USERNAME/YOUR_REPO_NAME.git
   cd YOUR_REPO_NAME
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install
   ```

3. **Environment Configuration**:
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Set up database configuration in `.env`.

4. **Run Migrations and Seed Database**:
   ```bash
   php artisan migrate --seed
   ```

5. **Start the Application**:
   ```bash
   php artisan serve
   ```

6. **Access the Application**:
   - Open your browser and go to [http://localhost:8000](http://localhost:8000).

---

## Features and Modules

### Building Management
   - **CRUD**: Manage building records with options to create, view, edit, and delete.
   - **Validation**: Ensures data integrity with server-side validation.

### Bill Calculation
   - **Dynamic Calculation**: Calculates bills based on building type and usage.
   - **Report View**: Summarizes all calculated bills in a user-friendly report format.

### Tariff Editor
   - **Admin Access**: Allows updating of tariff rates based on building type.
   - **Real-Time Update**: Bill calculations reflect updated tariff rates instantly.

### Navigation
   - **Navigation Bar**: Includes links to all key sections with hover effects and active state.
   - **Breadcrumbs**: Provides an intuitive path across different pages for easy navigation.

---

## Future Improvements (KIV)

- **Role-Based Access Control**: Add user roles to restrict access to the tariff editor for admin users.
- **Pagination**: Implement pagination for building lists and report pages to handle larger datasets.
- **Export to PDF**: Add an option to export bill reports to PDF format.

---

## License

This project is open-source and free to use under the MIT License.
