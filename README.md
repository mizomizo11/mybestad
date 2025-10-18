# My Bestad Online Medical Consultations System

الاستشارات الطبية عبر الإنترنت - نظام إدارة الاستشارات الطبية

## Overview | نظرة عامة

This is a Laravel-based online medical consultations system for My Bestad (mybestad.com) featuring:

1. **Customer Reviews System** - نظام تقييمات العملاء
   - Public-facing reviews section on homepage
   - Admin panel for managing reviews (approve/edit/delete)
   - Bootstrap 5 carousel and card display
   - Rating system (1-5 stars)

2. **Monthly Consultation Reports** - التقارير الشهرية للاستشارات
   - Admin-only reports dashboard
   - Doctor consultation statistics (current month, last month, total)
   - Chart.js visualization (line and bar charts)
   - Monthly trends for last 12 months

## Features | المميزات

### Public Features
- **Home Page** - الصفحة الرئيسية
  - Hero section with online medical consultations information
  - Customer reviews carousel and cards
  - Services showcase
  - Bootstrap 5 responsive design
  - RTL (Right-to-Left) support for Arabic

### Admin Features (Admin Only)
- **Manage Reviews** - إدارة التقييمات (`/admin/reviews`)
  - View all reviews in table format
  - Add new reviews manually
  - Approve/unapprove reviews
  - Edit existing reviews
  - Delete reviews
  - Only approved reviews appear on public homepage

- **Manage Services** - إدارة الخدمات (`/admin/services`)
  - Full CRUD operations for services
  - Add/edit/delete services
  - Activate/deactivate services
  - Drag-and-drop sorting
  - Upload service images
  - Set custom icons (Font Awesome)
  - Bilingual support (English/Arabic)
  - Only active services appear on public homepage

- **Monthly Reports** - التقارير الشهرية (`/admin/reports`)
  - Doctor consultation statistics table
  - Statistics cards (this month, last month, total)
  - Chart.js line chart for monthly trends (12 months)
  - Chart.js bar chart for doctor comparison
  - Percentage change indicators

## Installation | التثبيت

### Requirements
- PHP >= 8.1
- MySQL/MariaDB
- Composer
- Laravel 10.x

### Setup Steps

1. **Clone the repository**
```bash
git clone https://github.com/mizomizo11/mybestad.git
cd mybestad
```

2. **Install dependencies**
```bash
composer install
```

3. **Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure database**
Edit `.env` file with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mybestad
DB_USERNAME=root
DB_PASSWORD=
```

5. **Run migrations**
```bash
php artisan migrate
```

6. **Seed database with sample data (optional)**
```bash
php artisan db:seed
```

7. **Link storage for images**
```bash
php artisan storage:link
```
This creates a symbolic link from `public/storage` to `storage/app/public` for serving uploaded service images.

8. **Start the server**
```bash
php artisan serve
```

Visit: http://localhost:8000

## Database Structure | هيكل قاعدة البيانات

### Tables

1. **users** - المستخدمين
   - id, name, email, password, is_admin, timestamps

2. **reviews** - التقييمات
   - id, name, rating (1-5), comment, approved (boolean), timestamps

3. **services** - الخدمات
   - id, title_en, title_ar, description_en, description_ar, icon_class, image_path, sort_order, is_active, timestamps

4. **doctors** - الأطباء
   - id, name, specialization, timestamps

5. **consultations** - الاستشارات
   - id, doctor_id, patient_name, notes, timestamps

## Routes | المسارات

### Public Routes
- `GET /` - Home page with reviews and services

### Admin Routes (Requires Authentication + Admin)
- `GET /admin/reviews` - Manage reviews page
- `POST /admin/reviews` - Create new review
- `POST /admin/reviews/{id}/approve` - Toggle review approval
- `PUT /admin/reviews/{id}` - Update review
- `DELETE /admin/reviews/{id}` - Delete review

- `GET /admin/services` - Manage services page
- `GET /admin/services/create` - Create service form
- `POST /admin/services` - Store new service
- `GET /admin/services/{service}/edit` - Edit service form
- `PUT /admin/services/{service}` - Update service
- `DELETE /admin/services/{service}` - Delete service
- `POST /admin/services/{service}/toggle` - Toggle service active status
- `POST /admin/services/reorder` - Update service sort order

- `GET /admin/reports` - Monthly consultation reports

## Security | الأمان

- Admin routes are protected by `auth` and `admin` middleware
- Only users with `is_admin = true` can access admin features
- CSRF protection on all forms
- Input validation on all user inputs

## Technology Stack | التقنيات المستخدمة

- **Backend**: Laravel 10.x (PHP)
- **Frontend**: Bootstrap 5 (with RTL support)
- **Charts**: Chart.js 4.x
- **Icons**: Font Awesome 6
- **Database**: MySQL
- **Authentication**: Laravel built-in

## Project Structure | هيكل المشروع

```
mybestad/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── HomeController.php
│   │   │   ├── ReviewController.php
│   │   │   └── ReportController.php
│   │   └── Middleware/
│   │       └── AdminMiddleware.php
│   └── Models/
│       ├── User.php
│       ├── Review.php
│       ├── Doctor.php
│       └── Consultation.php
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000000_create_users_table.php
│   │   ├── 2024_01_01_000001_create_reviews_table.php
│   │   ├── 2024_01_01_000002_create_doctors_table.php
│   │   └── 2024_01_01_000003_create_consultations_table.php
│   └── seeders/
│       └── DatabaseSeeder.php
├── resources/
│   └── views/
│       ├── layouts/
│       │   ├── app.blade.php
│       │   └── admin.blade.php
│       ├── admin/
│       │   ├── reviews/
│       │   │   └── index.blade.php
│       │   └── reports/
│       │       └── index.blade.php
│       └── home.blade.php
└── routes/
    └── web.php
```

## Usage | الاستخدام

### For Public Users
1. Visit the homepage to see approved customer reviews
2. Reviews are displayed in both carousel and card formats
3. View online medical consultations services and information

### For Administrators
1. Login with admin credentials
2. Access admin panel via sidebar menu
3. **Manage Reviews**: Add, approve, edit, or delete reviews
4. **View Reports**: See consultation statistics and charts

## Sample Data | البيانات التجريبية

The seeder creates:
- 4 sample doctors with different specializations
- Consultations distributed across 12 months
- 4 sample reviews (3 approved, 1 pending)

## Customization | التخصيص

### Adding More Features
The system is designed to be extendable. You can add:
- User authentication pages
- Patient management
- Appointment booking
- Doctor schedules
- More report types

### Styling
- All views use Bootstrap 5 with RTL support
- Custom CSS can be added in the layout files
- Arabic font is "Segoe UI"

## License

MIT License

## Support

For issues or questions, please open an issue on GitHub.

---

© 2024 My Bestad Online Medical Consultations - All rights reserved
الاستشارات الطبية عبر الإنترنت - جميع الحقوق محفوظة
