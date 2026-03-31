# 🐶 UPV Dog Tracker

## 📌 Application Description and Purpose
The UPV Dog Tracker is a web-based application designed to manage and monitor dogs within a specific area. It allows users to add, edit, delete, and search for dogs based on attributes such as name, location, temperament, gender, and color.

The purpose of this system is to provide an organized and efficient way of tracking dogs, making it easier to manage records and filter information based on user needs.

---

## ⚙️ Installation and Setup Instructions

### 1. Clone the repository
```bash
git clone https://github.com/millimeter0200/CMSC129-Lab2-YapMM-OngCH.git
cd CMSC129-Lab2-YapMM-OngCH

2. Install dependencies

composer install
npm install
npm run dev

3. Setup environment file

cp .env.example .env

Then configure your database in .env

⸻

🗄️ Database Setup Guide (PostgreSQL)

1. Create database in PostgreSQL

Open terminal or pgAdmin and run:

CREATE DATABASE upv_dog_tracker_db;

2. Update .env file

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=upv_dog_tracker_db
DB_USERNAME=your_username
DB_PASSWORD=your_password


⸻

🔁 Migration Commands

Run the following to create tables:

php artisan migrate

If needed (reset):

php artisan migrate:fresh


⸻

▶️ Run the Application

php artisan serve

Then open:

http://127.0.0.1:8000


⸻

## 📸 Screenshots of the Application

### Welcome Page
![Welcome Page](https://raw.githubusercontent.com/millimeter0200/CMSC129-Lab2-YapMM-OngCH/main/screenshots/welcome_page.png)

### Home Page
![Home](https://raw.githubusercontent.com/millimeter0200/CMSC129-Lab2-YapMM-OngCH/main/screenshots/home.png)

### Add Dog
![Add Dog](https://raw.githubusercontent.com/millimeter0200/CMSC129-Lab2-YapMM-OngCH/main/screenshots/add.png)

### Edit Dog
![Edit Dog](https://raw.githubusercontent.com/millimeter0200/CMSC129-Lab2-YapMM-OngCH/main/screenshots/edit.png)

### Show Dog
![Show Dog](https://raw.githubusercontent.com/millimeter0200/CMSC129-Lab2-YapMM-OngCH/main/screenshots/show.png)

### Trash List
![Trash](https://raw.githubusercontent.com/millimeter0200/CMSC129-Lab2-YapMM-OngCH/main/screenshots/trash.png)

⸻

✨ Features Implemented
	•	Add new dog records
	•	Edit existing dog information
	•	Delete and restore dogs (Soft Deletes)
	•	Search dogs by:
	•	Name
	•	Location
	•	Gender
	•	Color
	•	Temperament
	•	Filter dogs by location and temperament
	•	Pagination of dog list
	•	Form validation with error messages
	•	Clean and responsive UI using Tailwind CSS

⸻

🏗️ MVC Architecture Explanation

This application follows the Model-View-Controller (MVC) architecture:

📦 Models

Located in:

app/Models/

	•	Dog.php
	•	Represents dog records
	•	Contains attributes like name, gender, color, temperament
	•	Defines relationship:

public function location() {
    return $this->belongsTo(Location::class);
}


	•	Location.php
	•	Stores location data
	•	Related to multiple dogs

⸻

🎮 Controllers

Located in:

app/Http/Controllers/

	•	DogController.php
	•	Handles all business logic:
	•	Display list of dogs (index)
	•	Store new dog (store)
	•	Update dog (update)
	•	Delete and restore (destroy, restore)
	•	Filtering and searching logic
	•	Uses Eloquent queries and pagination

⸻

🖼️ Views (Blade Templates)

Located in:

resources/views/dogs/

	•	index.blade.php → displays dog list + filters
	•	create.blade.php → form to add dogs
	•	edit.blade.php → form to edit dogs
	•	show.blade.php → displays detailed dog info
	•	trashed.blade.php → shows deleted dogs

Views use Blade templating and Tailwind CSS for styling.

⸻

🔗 Routes

Defined in:

routes/web.php

	•	Resource routes:

Route::resource('dogs', DogController::class);

	•	Additional routes:

Route::get('dogs/trashed/all', ...);
Route::patch('dogs/{id}/restore', ...);
Route::delete('dogs/{id}/force-delete', ...);


⸻

