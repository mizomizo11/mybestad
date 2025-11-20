# Testing Guide for Dynamic Services Feature

## Quick Test Checklist

### Prerequisites
1. Ensure database is migrated: `php artisan migrate`
2. Create storage link: `php artisan storage:link`
3. Seed sample data (optional): `php artisan db:seed --class=ServiceSeeder`
4. Have an admin user (with `is_admin = 1` in users table)

---

## Test Scenarios

### 1. Homepage Display (Public)
**URL:** `http://localhost:8000/`

**Expected Results:**
- [ ] Services section displays with title "خدماتنا" (Arabic) or "Our Services" (English)
- [ ] All active services are visible
- [ ] Services are displayed in sort_order (lowest first)
- [ ] Each service shows:
  - Icon (if icon_class is set) OR Image (if image_path is set)
  - Title (in current locale)
  - Description (in current locale, if set)
- [ ] Inactive services are NOT displayed
- [ ] If no active services: "لا توجد خدمات متاحة" message displays

---

### 2. Admin Services List
**URL:** `http://localhost:8000/admin/services`

**Login Required:** Yes (admin user)

**Expected Results:**
- [ ] Page loads successfully
- [ ] Title shows "إدارة الخدمات" (Manage Services)
- [ ] "إضافة خدمة" (Add Service) button visible at top
- [ ] Services table displays with columns:
  - Sort Order (with drag handle icon)
  - Title (English)
  - Title (Arabic)
  - Icon Class
  - Status (Active/Inactive button)
  - Actions (Edit/Delete buttons)
- [ ] Status buttons are color-coded (green = active, gray = inactive)
- [ ] All services are listed (both active and inactive)

**Interactive Tests:**
- [ ] Click status button toggles active/inactive without page reload
- [ ] Drag a service by grip icon and drop in new position
- [ ] After drag-drop, page refreshes and shows new order
- [ ] Click Edit button navigates to edit page
- [ ] Click Delete button shows confirmation prompt
- [ ] Confirm delete removes the service

---

### 3. Create Service
**URL:** `http://localhost:8000/admin/services/create`

**Test Cases:**

#### Valid Submission
1. Fill in:
   - Title (English): "Test Service EN"
   - Title (Arabic): "خدمة تجريبية"
   - Description (English): "Test description"
   - Description (Arabic): "وصف تجريبي"
   - Icon Class: "fas fa-test"
   - Sort Order: 10
   - Active: Checked
2. Click "حفظ" (Save)

**Expected:**
- [ ] Redirects to services list
- [ ] Success message: "تم إنشاء الخدمة بنجاح!"
- [ ] New service appears in the list

#### Validation Tests
1. **Missing Required Fields:**
   - Leave Title (English) empty
   - Click Save
   - **Expected:** Error message under Title (English) field

2. **Invalid Image:**
   - Upload a text file (.txt)
   - **Expected:** Validation error about file type

3. **Large Image:**
   - Upload image > 2MB
   - **Expected:** Validation error about file size

---

### 4. Edit Service
**URL:** `http://localhost:8000/admin/services/{id}/edit`

**Test Cases:**

#### Update Text Fields
1. Navigate to edit page for existing service
2. Change Title (English) to "Updated Title"
3. Change Description (Arabic)
4. Click "حفظ" (Save)

**Expected:**
- [ ] Redirects to services list
- [ ] Success message displays
- [ ] Updated values are visible in list

#### Upload New Image
1. Navigate to edit page
2. Current image displays (if exists)
3. Choose new image file
4. Click Save

**Expected:**
- [ ] New image replaces old image
- [ ] Old image file is deleted from storage
- [ ] New image displays on homepage

#### Change Sort Order
1. Edit service and change sort_order to 0
2. Save

**Expected:**
- [ ] Service appears first in list
- [ ] Service appears first on homepage

---

### 5. Delete Service
**Test:**
1. Click delete (trash) icon on any service
2. Browser shows confirmation dialog
3. Click OK

**Expected:**
- [ ] Service is deleted from database
- [ ] Service removed from list
- [ ] If service had image, image file is deleted from storage
- [ ] Success message displays

---

### 6. Image Upload & Display

#### Upload Test
1. Create new service with image
2. Upload PNG image (e.g., 100KB)
3. Save

**Expected:**
- [ ] File uploads to `storage/app/public/services/`
- [ ] image_path saved in database
- [ ] Image displays on edit page
- [ ] Image displays on homepage

#### Storage Link Test
```bash
# Check if symbolic link exists
ls -la public/storage
```

**Expected:**
- [ ] `public/storage` -> `../storage/app/public`
- [ ] Images accessible at `http://localhost:8000/storage/services/{filename}`

---

### 7. Localization

#### English Locale
1. Set app locale to 'en' or visit English version
2. View homepage
3. View admin pages

**Expected:**
- [ ] Services display title_en and description_en
- [ ] Admin labels in English (if locale supports it)
- [ ] Translation keys do not appear (e.g., no "services.title")

#### Arabic Locale
1. Set app locale to 'ar' or visit Arabic version
2. View homepage
3. View admin pages

**Expected:**
- [ ] Services display title_ar and description_ar
- [ ] Admin labels in Arabic
- [ ] RTL layout works correctly
- [ ] Translation keys do not appear

---

### 8. Sorting & Ordering

**Test Drag-Drop:**
1. Open services list
2. Drag service with sort_order 0 to bottom
3. Release

**Expected:**
- [ ] AJAX request fires
- [ ] Page refreshes
- [ ] sort_order values updated in database
- [ ] New order reflected in list
- [ ] New order reflected on homepage

**Manual Sort Order:**
1. Edit service
2. Set sort_order to 100
3. Save
4. Edit another service
5. Set sort_order to 1
6. View services list

**Expected:**
- [ ] Service with sort_order 1 appears first
- [ ] Service with sort_order 100 appears last
- [ ] Same order on homepage

---

### 9. Active/Inactive Toggle

**Test:**
1. Find active service (green button)
2. Click status button
3. Observe change (should turn gray)
4. Check homepage

**Expected:**
- [ ] Button changes color immediately (no page reload)
- [ ] is_active value changes in database
- [ ] Homepage no longer shows the service
- [ ] Click again to reactivate
- [ ] Service reappears on homepage

---

### 10. Icon vs Image Priority

**Test:**
1. Create service with icon_class: "fas fa-heart"
2. Save (no image)
3. Check homepage: icon displays

4. Edit same service
5. Upload image
6. Save
7. Check homepage: image displays (not icon)

**Expected:**
- [ ] When both icon and image exist, image takes priority
- [ ] When only icon exists, icon displays
- [ ] When neither exists, no icon/image area displays

---

### 11. Sidebar Menu

**Test:**
1. Login as admin
2. Navigate to any admin page
3. Check sidebar

**Expected:**
- [ ] "إدارة الخدمات" (Services) menu item visible
- [ ] Icon is "fas fa-concierge-bell"
- [ ] Clicking navigates to `/admin/services`
- [ ] Menu item highlights when on services pages

---

### 12. Responsive Design

**Test on Mobile:**
1. Resize browser to mobile width (< 768px)
2. View homepage services
3. View admin services list

**Expected:**
- [ ] Homepage: Services stack vertically (1 per row)
- [ ] Admin: Table is horizontally scrollable
- [ ] All buttons are accessible
- [ ] Touch drag-drop works (if supported)

---

## Browser Compatibility

Test in:
- [ ] Chrome/Edge (latest)
- [ ] Firefox (latest)
- [ ] Safari (if available)

---

## Performance Tests

1. **Load Time:**
   - Homepage with 6 services loads in < 2 seconds
   - Admin list with 20 services loads in < 2 seconds

2. **Image Optimization:**
   - Large images (> 500KB) should be compressed before upload
   - Recommend max 200KB per image

---

## Error Handling

**Test Invalid Routes:**
1. Visit `/admin/services/999/edit` (non-existent ID)

**Expected:**
- [ ] 404 error or graceful error message

**Test Without Auth:**
1. Logout
2. Visit `/admin/services`

**Expected:**
- [ ] Redirects to login page

**Test Without Admin:**
1. Login as non-admin user
2. Visit `/admin/services`

**Expected:**
- [ ] 403 Forbidden or redirect

---

## Database Integrity

**Check After CRUD:**
```sql
SELECT * FROM services;
```

**Verify:**
- [ ] sort_order values are sequential
- [ ] is_active is 0 or 1
- [ ] image_path points to existing file (if not null)
- [ ] Deleted services are removed from DB

---

## Cleanup

**After Testing:**
1. Delete test services via admin panel
2. Check `storage/app/public/services/` for orphaned files
3. Optionally re-seed with: `php artisan db:seed --class=ServiceSeeder`

---

## Known Issues / Limitations

1. **Drag-drop on touch devices:** May require SortableJS touch configuration
2. **Image caching:** Browser may cache old images; hard refresh to see updates
3. **Large image uploads:** May timeout on slow connections; increase PHP upload limits if needed

---

## Success Criteria

All tests passing indicates:
- ✅ Services feature is fully functional
- ✅ Admin can manage services
- ✅ Public homepage displays services correctly
- ✅ Localization works
- ✅ Image uploads work
- ✅ Sorting and toggling work
- ✅ Security is enforced

---

## Automated Testing (Future)

Consider adding:
- PHPUnit tests for ServiceController
- Feature tests for CRUD operations
- Browser tests with Laravel Dusk

---

**Testing Date:** _____________
**Tested By:** _____________
**Results:** PASS / FAIL
**Notes:**

