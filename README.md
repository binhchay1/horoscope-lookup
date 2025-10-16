# Horoscope Lookup (Tử Vi) 🌟

![PHP](https://img.shields.io/badge/PHP-8.0-blue?logo=php) ![Laravel](https://img.shields.io/badge/Laravel-10.x-red?logo=laravel) ![MySQL](https://img.shields.io/badge/MySQL-8.x-green?logo=mysql) ![License](https://img.shields.io/badge/License-MIT-green) [![Build Status](https://img.shields.io/travis/laravel/framework.svg)](https://travis-ci.org/laravel/framework) [![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework.svg)](https://packagist.org/packages/laravel/framework) [![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework.svg)](https://packagist.org/packages/laravel/framework)

Welcome to **Horoscope Lookup (Tử Vi)**! 🚀 This is a Laravel-based web app and API for generating and interpreting Vietnamese horoscope charts (Tử Vi). Think of it as a mystical CMS that calculates Thiên Bàn, Địa Bàn, assigns stars (an sao), and provides basic interpretations based on user input. Perfect for astrology enthusiasts or anyone looking to integrate a unique cultural feature into their web app.

## 📋 Project Overview
As a web dev, imagine building a backend API and frontend interface for a fortune-telling service, like a horoscope widget but rooted in Vietnamese Tử Vi astrology. This project answers questions like:
- 🌌 What’s my Tử Vi chart based on my birth details?
- ⭐ Which stars are in my 12 palaces (Thập Nhị Cung)?
- 🔮 What do these stars predict about my life?
- ⚠️ Are there any calculation errors or missing data?

Built with **Laravel** for a robust backend and a clean frontend, the app uses custom drivers to compute Tử Vi charts and deliver insights via a RESTful API or web interface.

## 🗃️ Core Components
The project revolves around Tử Vi chart generation, with key logic in:
- **app/Driver/Lich_HND.php**: Converts between solar and lunar calendars (like a date utility for astrology).
- **app/Driver/AmDuong.php**: Handles Five Elements (Ngũ Hành), palace assignments, and utilities.
- **app/Driver/DiaBan.php**: Models the 12 palaces (Thập Nhị Cung) and assigns stars/limits.
- **app/Driver/Sao.php**: Defines stars (chủ, phụ, hóa lộc/quyền/khoa/kỵ) and their categories.
- **app/Driver/Utils.php**: Core logic for star placement and chart generation.
- **app/Driver/ThienBan.php**: Manages Thiên Bàn data.
- **app/Driver/Interpreter.php**: Generates basic interpretations based on palaces and stars.

📂 Data is processed dynamically; no persistent database is required for the core Tử Vi logic, but MySQL can be used for user management or saving charts.

## 🛠️ Environment Requirements
To run Horoscope Lookup, you need:
- **PHP**: 8.0 or higher (Laravel 10.x requires it) 🐘
- **Node.js**: 16.x or higher (for frontend assets, if used) 🌐
- **MySQL**: 8.x or higher (optional, for user data) 🗄️
- **Composer**: For PHP dependencies (like npm) 📦
- **System**: Linux, macOS, or Windows (WSL works great) 💻
- **Dependencies** (in `composer.json` and `package.json`):
  - `laravel/framework`: Backend core, like Express.js for PHP.
  - `laravel/breeze` (optional): For authentication scaffolding.
  - Frontend (if used): Basic JS/CSS for the web interface.

## ⚙️ Setup Instructions
Follow these steps to get the project running, like spinning up a Laravel app:

1. **Clone the Repository** 📥:
   ```bash
   git clone https://github.com/binhchay1/horoscope-lookup.git
   cd horoscope-lookup
   ```

2. **Install Backend Dependencies** 📦:
   Ensure [Composer](https://getcomposer.org/) is installed, then run:
   ```bash
   composer install
   ```

3. **Install Frontend Dependencies** (if using a custom frontend) 🌐:
   Ensure [Node.js](https://nodejs.org/) is installed, then run:
   ```bash
   npm install
   npm run build
   ```

4. **Configure the Environment** 🛠️:
   - Copy `.env.example` to `.env`:
     ```bash
     cp .env.example .env
     ```
   - Update `.env` with database details (if used):
     ```env
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=horoscope_lookup
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

5. **Generate Application Key** 🔑:
   ```bash
   php artisan key:generate
   ```

6. **Run Migrations** (if using MySQL for user data) 🗄️:
   ```bash
   php artisan migrate
   ```

7. **Start the Application** 🚀:
   Run the Laravel dev server:
   ```bash
   php artisan serve
   ```
   Access the app at `http://localhost:8000`.

## 🚀 How to Run
1. **Start the Server** 🌐:
   Use `php artisan serve` or configure Apache/Nginx for production.

2. **Test the API** 🛠️:
   Use Postman or curl to call the `/lookup` endpoint:
   ```bash
   curl -X POST http://localhost:8000/lookup \
     -H "Content-Type: application/json" \
     -d '{
           "full_name": "Nguyen Van A",
           "year": 1990,
           "month": 5,
           "day": 15,
           "hour": 7,
           "gender": 1,
           "solar": true,
           "tz": 7
         }'
   ```
   **Response**:
   ```json
   {
     "thienBan": {...},
     "thapNhiCung": [...],
     "duDoan": "..."
   }
   ```

3. **Test the Web Interface** (if implemented) ▶️:
   Visit `http://localhost:8000` to input birth details and view the Tử Vi chart.

4. **Stop the Server** 🛑:
   Ctrl+C to stop `php artisan serve`.

## 📁 Project Structure
Like a typical Laravel app, here’s the layout:
```
horoscope-lookup/
├── app/Driver/           # Core Tử Vi logic, like a custom library 🛠️
│   ├── Lich_HND.php     # Solar/lunar calendar conversion
│   ├── AmDuong.php      # Five Elements and utilities
│   ├── DiaBan.php       # 12 palaces and star assignments
│   ├── Sao.php          # Star definitions
│   ├── Utils.php        # Chart generation and star placement
│   ├── ThienBan.php     # Thiên Bàn data
│   └── Interpreter.php  # Basic interpretation logic
├── database/             # Migrations (optional, for user data) 🗄️
│   ├── migrations/
│   └── seeders/
├── resources/views/      # Blade templates (if web UI is implemented) 🎨
├── routes/               # API and web routes 🚏
├── public/               # Public assets 🌐
├── .env.example          # Environment config 📋
├── .gitignore            # Excludes vendor/, storage/, etc. 🚫
├── composer.json         # Backend dependencies 📋
├── package.json          # Frontend dependencies (if used) 📋
├── README.md             # You're reading it! 📖
└── LICENSE               # MIT License 📜
```

## 📈 Key Features
- **Tử Vi Chart Generation**: Computes Thiên Bàn, Địa Bàn, and assigns stars based on birth details 🌌
- **API Endpoint**: POST `/lookup` for programmatic chart generation 📊
- **Calendar Conversion**: Handles solar/lunar dates for accurate astrology 🗓️
- **Star System**: Supports main, auxiliary, and special stars (Hóa Lộc, Quyền, Khoa, Kỵ) ⭐
- **Interpretation**: Generates basic predictions based on palaces and stars 🔮
- **Lightweight**: Minimal dependencies, focused on core Tử Vi logic ⚡

## 💡 API Endpoint
| Method | Endpoint   | Description                |
|--------|------------|----------------------------|
| POST   | `/lookup`  | Generate Tử Vi chart       |

**Request Body**:
```json
{
  "full_name": "Nguyen Van A",
  "year": 1990,
  "month": 5,
  "day": 15,
  "hour": 7,
  "gender": 1,
  "solar": true,
  "tz": 7
}
```

**Response**:
```json
{
  "thienBan": {...},
  "thapNhiCung": [...],
  "duDoan": "Basic interpretation based on stars and palaces"
}
```

## 🛠️ Troubleshooting
- **Error: `Class not found`** ⚠️: Run `composer install` or `composer dump-autoload`.
- **API Returns Empty** 🚫: Check request body format and ensure all fields (`year`, `month`, etc.) are valid.
- **Frontend Not Loading** (if implemented) 🌐: Run `npm run build` and verify `public/` assets.
- **Calendar Conversion Errors** 🗓️: Ensure `Lich_HND.php` handles edge cases for lunar dates.

## 🤝 Contributing
Feel free to fork, submit PRs, or open issues! Treat it like contributing to an open-source Laravel package. Check the [Laravel contribution guide](https://laravel.com/docs/contributions) for details. 🌟

## 📜 License
MIT License (see `LICENSE`).

## 📞 Contact
- **Author**: Thanh Bình Nguyễn
- **Email**: binhchay1@gmail.com
- **GitHub**: [github.com/binhchay1](https://github.com/binhchay1)
Got questions? Open an issue at [github.com/binhchay1/horoscope-lookup/issues](https://github.com/binhchay1/horoscope-lookup/issues).

## 💡 About Laravel
Laravel is a web application framework with expressive, elegant syntax. It simplifies tasks like:
- 🚀 Fast routing and middleware.
- 🛠️ Dependency injection and Eloquent ORM.
- 📦 Session/cache management and migrations.
- ⚡ Real-time event broadcasting.

Want to learn more? Check the [Laravel Documentation](https://laravel.com/docs), [Laravel Bootcamp](https://bootcamp.laravel.com), or [Laracasts](https://laracasts.com) for 2000+ video tutorials.

## 🙌 Laravel Sponsors
Big thanks to Laravel’s sponsors: Vehikl, Tighten Co., WebReinvent, Kirschbaum Development Group, 64 Robots, Curotec, Cyber-Duck, DevSquad, Jump24, Redberry, Active Logic, byte5, and OP.GG. Interested in sponsoring? Visit the [Laravel Partners program](https://partners.laravel.com).
