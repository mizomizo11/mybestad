# Dynamic Services Feature - Quick Start Guide

## What Was Implemented

A fully dynamic Services management system that allows administrators to manage service offerings through an admin panel, with automatic display on the public homepage.

---

## Key Features

### ✅ Admin Panel
- **Location:** `/admin/services`
- **Features:**
  - Create, read, update, delete services
  - Toggle active/inactive status (AJAX)
  - Drag-and-drop reordering
  - Image uploads (up to 2MB)
  - Font Awesome icon support
  - Bilingual content (English/Arabic)

### ✅ Public Display
- **Location:** `/` (Homepage)
- **Features:**
  - Shows only active services
  - Ordered by sort_order
  - Displays icons or images
  - Localized content (EN/AR)
  - Responsive Bootstrap 5 cards

---

## Files Structure

```
mybestad/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   └── ServiceController.php       [NEW]
│   │   │   └── HomeController.php              [MODIFIED]
│   │   └── Requests/
│   │       └── ServiceRequest.php              [NEW]
│   └── Models/
│       └── Service.php                         [NEW]
├── database/
│   ├── migrations/
│   │   └── 2024_01_01_000004_create_services_table.php  [NEW]
│   └── seeders/
│       ├── DatabaseSeeder.php                  [MODIFIED]
│       └── ServiceSeeder.php                   [NEW]
├── resources/
│   ├── lang/
│   │   ├── en/
│   │   │   └── services.php                    [NEW]
│   │   └── ar/
│   │       └── services.php                    [NEW]
│   └── views/
│       ├── admin/
│       │   └── services/
│       │       ├── index.blade.php             [NEW]
│       │       ├── create.blade.php            [NEW]
│       │       └── edit.blade.php              [NEW]
│       ├── layouts/
│       │   └── admin.blade.php                 [MODIFIED]
│       ├── partials/
│       │   └── services.blade.php              [NEW]
│       └── home.blade.php                      [MODIFIED]
├── routes/
│   └── web.php                                 [MODIFIED]
├── README.md                                   [MODIFIED]
├── SERVICES_IMPLEMENTATION.md                  [NEW]
└── SERVICES_TESTING.md                         [NEW]
```

---

## Quick Setup (3 Steps)

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Link Storage
```bash
php artisan storage:link
```

### 3. Seed Sample Data (Optional)
```bash
php artisan db:seed --class=ServiceSeeder
```

---

## Usage

### Admin
1. Login as admin user
2. Navigate to `/admin/services`
3. Click "Add Service" to create new services
4. Drag services to reorder
5. Click status button to activate/deactivate
6. Upload images or use Font Awesome icons

### Public
1. Visit homepage `/`
2. Scroll to "Our Services" section
3. See all active services displayed

---

## Example Service

```php
// Example service data
[
    'title_en' => 'Medical Examinations',
    'title_ar' => 'الفحوصات الطبية',
    'description_en' => 'Comprehensive examinations with latest equipment',
    'description_ar' => 'فحوصات شاملة مع أحدث الأجهزة الطبية',
    'icon_class' => 'fas fa-stethoscope',
    'sort_order' => 0,
    'is_active' => true,
]
```

---

## Routes Added

| Method | URL | Name | Description |
|--------|-----|------|-------------|
| GET | /admin/services | admin.services.index | List services |
| GET | /admin/services/create | admin.services.create | Create form |
| POST | /admin/services | admin.services.store | Store new |
| GET | /admin/services/{id}/edit | admin.services.edit | Edit form |
| PUT | /admin/services/{id} | admin.services.update | Update |
| DELETE | /admin/services/{id} | admin.services.destroy | Delete |
| POST | /admin/services/{id}/toggle | admin.services.toggle | Toggle status |
| POST | /admin/services/reorder | admin.services.reorder | Reorder |

---

## Database Schema

**Table:** `services`

| Column | Type | Description |
|--------|------|-------------|
| id | bigint | Primary key |
| title_en | varchar(255) | English title |
| title_ar | varchar(255) | Arabic title |
| description_en | text | English description (nullable) |
| description_ar | text | Arabic description (nullable) |
| icon_class | varchar(255) | Font Awesome class (nullable) |
| image_path | varchar(255) | Image path in storage (nullable) |
| sort_order | int | Display order (default: 0) |
| is_active | boolean | Active status (default: true) |
| created_at | timestamp | Creation time |
| updated_at | timestamp | Last update time |

---

## Translation Keys

Use these in Blade views:

```blade
{{ __('services.our_services') }}      // "Our Services" / "خدماتنا"
{{ __('services.manage_services') }}   // "Manage Services" / "إدارة الخدمات"
{{ __('services.add_service') }}       // "Add Service" / "إضافة خدمة"
{{ __('services.created_successfully') }} // Success message
```

---

## Common Tasks

### Add a New Service
1. Go to `/admin/services`
2. Click "Add Service"
3. Fill required fields: title_en, title_ar
4. Optional: Add description, icon, image
5. Set sort_order (lower = higher priority)
6. Check "Active"
7. Save

### Change Service Order
1. Go to `/admin/services`
2. Drag service by grip icon (☰)
3. Drop in desired position
4. Page refreshes with new order

### Deactivate a Service
1. Go to `/admin/services`
2. Click green "Active" button
3. Button turns gray "Inactive"
4. Service hidden from homepage

### Upload Service Image
1. Edit service
2. Choose file (JPG, PNG, GIF, max 2MB)
3. Save
4. Image displays on homepage and edit page

---

## Troubleshooting

### Images Not Showing?
Run: `php artisan storage:link`

### Services Not on Homepage?
- Check service is_active = true
- Clear cache: `php artisan cache:clear`

### Can't Access Admin?
- Ensure user.is_admin = 1 in database
- Check auth middleware is working

### Drag-Drop Not Working?
- Check browser console for errors
- Ensure SortableJS is loaded

---

## Security

✅ All admin routes protected by `auth` and `admin` middleware
✅ CSRF protection on all forms
✅ Input validation via ServiceRequest
✅ Image type and size validation
✅ SQL injection protection (Eloquent ORM)
✅ XSS protection (Blade escaping)

---

## Documentation

📚 **Full Docs:** `SERVICES_IMPLEMENTATION.md`
🧪 **Testing Guide:** `SERVICES_TESTING.md`
📖 **Project README:** `README.md`

---

## Support

For issues:
1. Check `SERVICES_TESTING.md` for test scenarios
2. Review `SERVICES_IMPLEMENTATION.md` for details
3. Check Laravel logs: `storage/logs/laravel.log`
4. Open GitHub issue with error details

---

## Next Steps

After setup:
1. ✅ Migrate database
2. ✅ Link storage
3. ✅ Seed sample data
4. ✅ Login as admin
5. ✅ Create your first service
6. ✅ Check homepage display
7. ✅ Test drag-drop sorting
8. ✅ Upload service images

**Feature is production-ready!** 🎉

---

© 2024 My Bestad Online Medical Consultations
