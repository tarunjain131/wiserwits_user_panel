# Wiserwits Student User Panel

Wiserwits is a student user panel built with Laravel, providing a modern dashboard for students to manage their academic activities, view performance, access courses, quizzes, and more.

## Features

- Student authentication (login/logout)
- Dashboard with academic stats and achievements
- Profile management (update personal, academic, and guardian details)
- Course listing and progress tracking
- Quiz management and submission
- Performance analytics and charts
- Growth & vital charts (BMI, etc.)
- Teacher feedback and classroom reports
- Responsive UI with Bootstrap 5

## Project Structure

- **app/Models/**: Eloquent models (User, Student, Assignment, etc.)
- **app/Http/Controllers/**: Application controllers (UserController, AuthController, etc.)
- **resources/views/**: Blade templates for UI (dashboard, profile, courses, etc.)
- **routes/web.php**: Web routes for the application
- **routes/api.php**: API routes (if needed)
- **public/**: Entry point and static assets

## Getting Started

### Prerequisites
- PHP 7.3 or higher
- Composer
- Node.js & npm
- MySQL or compatible database

### Installation
1. Clone the repository:
	```bash
	git clone <repo-url>
	cd user_panel-wiser
	```
2. Install PHP dependencies:
	```bash
	composer install
	```
3. Install JS dependencies:
	```bash
	npm install
	```
4. Copy `.env.example` to `.env` and set your environment variables:
	```bash
	cp .env.example .env
	```
5. Generate application key:
	```bash
	php artisan key:generate
	```
6. Set up your database in `.env` and run migrations:
	```bash
	php artisan migrate
	```
7. (Optional) Seed the database:
	```bash
	php artisan db:seed
	```
8. Build frontend assets:
	```bash
	npm run dev
	```
9. Start the local server:
	```bash
	php artisan serve
	```

## Usage

- Visit `http://localhost:8000` in your browser.
- Login as a student to access the dashboard and features.
- Update your profile, view courses, take quizzes, and track your performance.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
