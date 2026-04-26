🇺🇸 English | [🇧🇷 Português](README.md)

---

![Banner](https://github.com/user-attachments/assets/f3a566c3-d0b1-48af-b65d-5cfe6e109383)

### A web application for task management with authentication, priorities, and status control, built with Laravel.

---

## Features

* User authentication (register, login, and logout)
* Full CRUD for tasks
* Priority levels (low, medium, high)
* Optional due date
* Mark tasks as completed
* Sorting by due date
* User data isolation
* Visual feedback (success and error messages)

---

## Application Structure

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

## How it works

The system allows each user to:

1. Create an account and log in
2. Create new tasks
3. Edit or delete existing tasks
4. Set priority and due date
5. Mark tasks as completed
6. View tasks organized by due date

Each user can only access their own tasks.

---

## Technologies Used

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

### Create / Edit Task

![Form1](https://github.com/user-attachments/assets/a5c28bf3-d549-4639-bd38-27a66081caa0)
![Form2](https://github.com/user-attachments/assets/c6dd3497-7f94-4bd5-9163-51a9d55cc722)

---

### Edit Profile

![Profile](https://github.com/user-attachments/assets/d0b4f527-831f-4771-aa8a-0a89341b1672)

---

### Delete Account

![Delete](https://github.com/user-attachments/assets/166192a0-76c7-42a6-9b6f-24387fbbd75e)

---

## How to use

### 1. Clone the repository

```bash
git clone https://github.com/Eliezer-M-07/Personal-Task-Manager.git
cd Personal-Task-Manager
```

---

### 2. Install dependencies

```bash
composer install
```

---

### 3. Configure environment

```bash
cp .env.example .env
```

Edit `.env` with your database settings:

```
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

---

### 4. Generate application key

```bash
php artisan key:generate
```

---

### 5. Run migrations

```bash
php artisan migrate
```

---

### 6. Start server and Vite

```bash
php artisan serve
npm run dev
```

Access in your browser:

```
http://127.0.0.1:8000
```

---

## Notes

* Each user can only access their own tasks
* All inputs are validated before saving
* Tasks can be created without a due date
* Tasks without a due date are displayed after others

---

## Future Improvements

* Filters by status (pending, completed, overdue)
* Task search
* File uploads
* Notifications
* REST API

---

## Contributing

Feel free to open issues or submit pull requests!

---

## License

This project is licensed under the MIT License.
