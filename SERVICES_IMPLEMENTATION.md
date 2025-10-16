# Dynamic Services Feature - Implementation Documentation

## Overview
This document provides comprehensive documentation for the dynamic Services management feature added to the My Bestad Online Medical Consultations System.

## Feature Summary
The Services feature allows administrators to manage service offerings dynamically through an admin panel, with automatic display on the public homepage. Services can be created, edited, deleted, activated/deactivated, and reordered via drag-and-drop.

---

## Database Schema

### Services Table
**Migration:** `database/migrations/2024_01_01_000004_create_services_table.php`

| Column | Type | Nullable | Default | Description |
|--------|------|----------|---------|-------------|
| id | bigint | NO | - | Primary key |
| title_en | varchar(255) | NO | - | Service title in English |
| title_ar | varchar(255) | NO | - | Service title in Arabic |
| description_en | text | YES | NULL | Service description in English |
| description_ar | text | YES | NULL | Service description in Arabic |
| icon_class | varchar(255) | YES | NULL | Font Awesome icon class (e.g., 'fas fa-stethoscope') |
| image_path | varchar(255) | YES | NULL | Path to service image in storage |
| sort_order | int | NO | 0 | Display order (lower numbers appear first) |
| is_active | boolean | NO | true | Whether the service is active and visible |
| created_at | timestamp | YES | NULL | Creation timestamp |
| updated_at | timestamp | YES | NULL | Last update timestamp |

---

## Files Created

### 1. Model
- **Path:** `app/Models/Service.php`
- **Purpose:** Eloquent model for services with fillable fields and type casting

### 2. Migration
- **Path:** `database/migrations/2024_01_01_000004_create_services_table.php`
- **Purpose:** Creates the services database table

### 3. Controller
- **Path:** `app/Http/Controllers/Admin/ServiceController.php`
- **Methods:**
  - `index()` - List all services
  - `create()` - Show create form
  - `store()` - Save new service
  - `edit()` - Show edit form
  - `update()` - Update existing service
  - `destroy()` - Delete service
  - `toggle()` - Toggle active status (AJAX)
  - `reorder()` - Update sort order (AJAX)

### 4. Form Request
- **Path:** `app/Http/Requests/ServiceRequest.php`
- **Purpose:** Validation rules for service creation/editing

### 5. Language Files
- **Path:** `resources/lang/en/services.php` - English translations
- **Path:** `resources/lang/ar/services.php` - Arabic translations

### 6. Admin Views
- **Path:** `resources/views/admin/services/index.blade.php` - Services list with drag-drop sorting
- **Path:** `resources/views/admin/services/create.blade.php` - Create service form
- **Path:** `resources/views/admin/services/edit.blade.php` - Edit service form

### 7. Public Partial
- **Path:** `resources/views/partials/services.blade.php` - Services display for homepage

### 8. Seeder
- **Path:** `database/seeders/ServiceSeeder.php` - Sample services data

---

## Routes

All admin routes are protected by `auth` and `admin` middleware.

### Admin Routes
```php
GET    /admin/services                    - List all services
GET    /admin/services/create             - Create service form
POST   /admin/services                    - Store new service
GET    /admin/services/{service}/edit     - Edit service form
PUT    /admin/services/{service}          - Update service
DELETE /admin/services/{service}          - Delete service
POST   /admin/services/{service}/toggle   - Toggle active status (AJAX)
POST   /admin/services/reorder            - Update sort order (AJAX)
```

### Public Route
```php
GET    /                                   - Homepage (displays active services)
```

---

## Features

### Admin Panel Features

#### 1. Service Management
- **Create Service:** Add new services with bilingual content
- **Edit Service:** Modify existing services
- **Delete Service:** Remove services with confirmation
- **List Services:** View all services in a sortable table

#### 2. Drag & Drop Sorting
- Drag services by the grip icon to reorder
- Sort order updates automatically via AJAX
- Uses SortableJS library

#### 3. Toggle Active Status
- Click the status button to activate/deactivate
- Updates instantly via AJAX without page reload
- Visual indicator (green for active, gray for inactive)

#### 4. Image Upload
- Upload images up to 2MB
- Supported formats: JPEG, PNG, GIF
- Images stored in `storage/app/public/services`
- Old images automatically deleted when replaced

#### 5. Icon Support
- Use Font Awesome icon classes
- Icons display alongside or instead of images
- Example: `fas fa-stethoscope`

#### 6. Bilingual Support
- All content available in English and Arabic
- Admin interface in Arabic (RTL)
- Public display respects current locale

---

## Installation & Setup

### 1. Run Migration
```bash
php artisan migrate
```

### 2. Link Storage (Required for Images)
```bash
php artisan storage:link
```
This creates a symbolic link from `public/storage` to `storage/app/public`.

### 3. Seed Sample Data (Optional)
```bash
php artisan db:seed --class=ServiceSeeder
```

Or run all seeders:
```bash
php artisan db:seed
```

---

## Usage Instructions

### Admin Access

1. **Login as Admin**
   - Navigate to admin login page
   - Use admin credentials (user with `is_admin = 1`)

2. **Access Services Management**
   - Click "إدارة الخدمات" / "Services" in the admin sidebar
   - Or navigate to `/admin/services`

3. **Create a Service**
   - Click "إضافة خدمة" / "Add Service" button
   - Fill in required fields:
     - Title (English) *
     - Title (Arabic) *
   - Optional fields:
     - Description (English)
     - Description (Arabic)
     - Icon Class (Font Awesome)
     - Image (upload)
     - Sort Order (default: 0)
     - Active status (default: checked)
   - Click "حفظ" / "Save"

4. **Edit a Service**
   - Click the edit icon (pencil) on any service
   - Modify fields as needed
   - Click "حفظ" / "Save"

5. **Delete a Service**
   - Click the delete icon (trash) on any service
   - Confirm deletion in the browser prompt

6. **Toggle Active Status**
   - Click the status button (green/gray)
   - Status changes immediately

7. **Reorder Services**
   - Drag services by the grip icon (☰)
   - Drop in desired position
   - Order updates automatically

### Public Display

Services automatically appear on the homepage at `/`:
- Only active services are shown
- Sorted by `sort_order` (ascending)
- Displays in current locale (English or Arabic)
- Shows icon or image
- Includes title and description

---

## Localization

### Translation Keys

Services use the `services` translation namespace:

**Common keys:**
- `services.our_services` - "Our Services" / "خدماتنا"
- `services.manage_services` - "Manage Services" / "إدارة الخدمات"
- `services.add_service` - "Add Service" / "إضافة خدمة"
- `services.edit_service` - "Edit Service" / "تعديل الخدمة"
- `services.no_services` - No services message

### Adding New Translations

1. Edit `resources/lang/en/services.php` for English
2. Edit `resources/lang/ar/services.php` for Arabic
3. Use in views: `{{ __('services.key') }}`

---

## Storage Management

### Image Storage
- **Location:** `storage/app/public/services/`
- **Public URL:** `public/storage/services/`
- **Access:** Via `Storage::url($service->image_path)`

### Storage Link
The storage link must be created once:
```bash
php artisan storage:link
```

This is required for uploaded images to be publicly accessible.

---

## Code Examples

### Display Services in Custom View
```blade
@foreach(App\Models\Service::where('is_active', true)->orderBy('sort_order')->get() as $service)
    <div class="service">
        @if($service->icon_class)
            <i class="{{ $service->icon_class }}"></i>
        @endif
        <h3>{{ app()->getLocale() == 'ar' ? $service->title_ar : $service->title_en }}</h3>
        <p>{{ app()->getLocale() == 'ar' ? $service->description_ar : $service->description_en }}</p>
    </div>
@endforeach
```

### Get Active Services in Controller
```php
use App\Models\Service;

$services = Service::where('is_active', true)
    ->orderBy('sort_order')
    ->get();
```

---

## Testing Checklist

### Admin Panel
- [ ] Admin can access `/admin/services`
- [ ] Create new service with all fields
- [ ] Create service with only required fields
- [ ] Edit existing service
- [ ] Delete service (with confirmation)
- [ ] Toggle service active/inactive
- [ ] Drag and drop to reorder services
- [ ] Upload service image
- [ ] Replace existing image
- [ ] Services list displays correctly

### Public Homepage
- [ ] Active services appear on homepage
- [ ] Inactive services do NOT appear
- [ ] Services are sorted by sort_order
- [ ] English locale shows English content
- [ ] Arabic locale shows Arabic content
- [ ] Icons display correctly
- [ ] Images display correctly
- [ ] Responsive layout on mobile

### Validation
- [ ] Required fields enforce validation
- [ ] Image size limit enforced (2MB)
- [ ] Image format validation works
- [ ] Sort order accepts numbers only

---

## Security Considerations

1. **Authentication:** All admin routes require authentication
2. **Authorization:** Admin middleware checks `is_admin` flag
3. **CSRF Protection:** All forms include CSRF tokens
4. **Input Validation:** ServiceRequest validates all inputs
5. **File Upload Security:** 
   - File type validation (images only)
   - File size limit (2MB)
   - Stored in non-public directory (linked via symlink)

---

## Troubleshooting

### Images Not Displaying
**Problem:** Uploaded images return 404  
**Solution:** Run `php artisan storage:link`

### Services Not Appearing on Homepage
**Problem:** Services don't show on homepage  
**Solution:** Check that services are marked as active (`is_active = true`)

### Drag & Drop Not Working
**Problem:** Cannot reorder services  
**Solution:** Ensure SortableJS is loaded (check browser console for errors)

### Translation Not Working
**Problem:** Seeing translation keys instead of text  
**Solution:** Ensure language files exist in `resources/lang/en/` and `resources/lang/ar/`

---

## Dependencies

### PHP Libraries
- Laravel 10.x
- Laravel Storage (built-in)

### JavaScript Libraries
- SortableJS 1.15.0 (CDN) - For drag & drop sorting
- Bootstrap 5 (already included)

### CSS Libraries
- Bootstrap 5 (already included)
- Font Awesome 6 (already included)

---

## Future Enhancements

Potential improvements for future versions:

1. **Service Categories:** Group services into categories
2. **Service Pages:** Individual pages for each service
3. **Service Analytics:** Track views and interactions
4. **Bulk Actions:** Edit multiple services at once
5. **Image Gallery:** Multiple images per service
6. **Service Booking:** Link services to appointment system
7. **SEO Fields:** Meta descriptions and keywords per service

---

## Support

For issues or questions:
1. Check this documentation
2. Review the troubleshooting section
3. Check Laravel logs: `storage/logs/laravel.log`
4. Open an issue on GitHub

---

## Changelog

### Version 1.0 (2024-10-15)
- Initial implementation
- Full CRUD operations
- Drag & drop sorting
- Toggle active status
- Image upload support
- Bilingual support (EN/AR)
- Admin menu integration
- Homepage integration
- Documentation

---

© 2024 My Bestad Online Medical Consultations
