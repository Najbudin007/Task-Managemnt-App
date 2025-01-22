Task Management System

This is a basic Task Management System developed on Laravel 11 for task submission. This project is designed with a very minimalist approach since it only focused on completing the given tasks.

Features
•	Create, edit, and delete tasks.
•	Assign tasks to projects.
•	Filter tasks by project.
•   Priority based sorting of task if the priority is 1 then it at top, 2 then it's in 2nd and so on.
•	Drag-and-drop task sorting with live updates.
•   Toaster like notification just by using css and js.

Requirements
•	PHP 8.1+
•	Composer
•	Database (MySQL)
_______________________________________________________________________________

Setup and Installation

1. Clone the Repository
git clone git@github.com:Najbudin007/Task-Managemnt-App.git
cd Task-Managemnt-App

2. Install Dependencies
composer install

3. Environment Configuration
Copy the .env.example file and configure your environment settings:
cp .env.example .env

Update the database credentials and other environment variables in the .env file.
________________________________________________________________________________

4. Generate Application Key

php artisan key:generate
5. Run Migrations
php artisan migrate

6. Seed the Database
Run database seeders to populate sample data:
php artisan db:seed

7. Start the Application
php artisan serve
The application will be available at http://127.0.0.1:8000.
_______________________________________________________
Notes
•	This project is designed for task submission purposes only.
•	The features are kept very simple to be focused on the provided requirements.
•	Projects and other related data are pre-populated using seeders.
_______________________________________________________
Technologies Used
•	Laravel 11: Backend framework.
•	Bootstrap 5: Frontend styling.
•	jQuery UI: Drag-and-drop sorting functionality.
•	Font Awesome: Icons.
______________________________________________________
Usage
1.	Navigate to the application home page.
2.	Add tasks via the "Add Task" option in the nav bar.
3.	Filter tasks by project using the dropdown.
4.	Reorder tasks by dragging and dropping rows in the task list.


For any questions or issues, feel free to contact.

