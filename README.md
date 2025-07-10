# 🎉 Eventify – Event Management Platform API

**Eventify** is a modern Laravel-powered RESTful API designed to manage events, attendees, bookings, and user roles with ease. It provides everything needed for users to discover, organize, and book events — from secure authentication to detailed event categorization, reviews, and real-time booking.

---

## 🚀 Features

- 🔐 **Authentication** with Laravel Sanctum
- 👤 **User & Role Management** (Admin / Organizer / Attendee)
- 🎫 **Event CRUD** (Create, List, Update, Delete)
- 📍 **Location Management** for events
- 🗂️ **Event Categories** for filtering
- ❤️ **Wishlist / Favorite Events**
- 🛒 **Cart System** for event booking prep
- 📅 **Booking Management** for attendees
- 📝 **Review System** for events
- 🔄 **Assign / Remove Roles** to users

---

## 📂 API Overview

```bash
# Auth
POST    /user/login
POST    /user/register
DELETE  /user/logout

# Events
GET     /eventify/events
POST    /eventify/events
...

# Bookings
POST    /eventify/bookings
DELETE  /eventify/bookings/{id}

# Reviews
GET     /eventify/events/{eventId}/reviews
POST    /eventify/events/{eventId}/reviews

# Roles
POST    /eventify/users/{userId}/roles/{roleId}
DELETE  /eventify/users/{userId}/roles/{roleId}

🧰 Tech Stack

    Backend: Laravel 10+

    Authentication: Laravel Sanctum

    Database: MySQL / PostgreSQL

    Architecture: REST API

📦 Installation

git clone https://github.com/your-username/eventify-api.git
cd eventify-api
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve

🔐 Security

    All protected routes use auth:sanctum.

    Role-based access system.

🙌 Contributing

Contributions and pull requests are welcome!
Feel free to open an issue to propose changes.
📜 License

MIT
🔗 Links

    Live demo: Coming Soon

    Frontend repo: Coming Soon

    API Docs: Coming Soon
