# Dynamic Services Feature - UI Screenshots & Mockups

This document describes the expected UI appearance for the Services feature.

---

## 1. Admin Services List (`/admin/services`)

### Layout Description

**Header:**
```
┌─────────────────────────────────────────────────────────┐
│  🔔 إدارة الخدمات                    [+ إضافة خدمة]   │
└─────────────────────────────────────────────────────────┘
```

**Table:**
```
┌────────────────────────────────────────────────────────────────────┐
│ Sort | Title (EN)        | Title (AR)        | Icon    | Status    │ Edit │
├────────────────────────────────────────────────────────────────────┤
│ ☰ 0  │ Medical Exams     │ الفحوصات الطبية   │ 🩺      │ [✓Active]│ [✏️🗑️]│
│ ☰ 1  │ Consultations     │ الاستشارات الطبية │ 👨‍⚕️    │ [✓Active]│ [✏️🗑️]│
│ ☰ 2  │ Emergency         │ الطوارئ           │ 🚑      │ [✓Active]│ [✏️🗑️]│
│ ☰ 3  │ Home Care         │ الرعاية المنزلية  │ 🏠      │ [Inactive]│[✏️🗑️]│
└────────────────────────────────────────────────────────────────────┘
```

**Features:**
- ☰ Drag handle: Click and drag to reorder
- [✓Active] button: Green, click to deactivate
- [Inactive] button: Gray, click to activate
- [✏️] Edit icon: Opens edit page
- [🗑️] Delete icon: Shows confirmation dialog

---

## 2. Create Service Form (`/admin/services/create`)

### Layout Description

**Header:**
```
┌─────────────────────────────────────────────────────────┐
│  ➕ إضافة خدمة                        [← العودة للخدمات]│
└─────────────────────────────────────────────────────────┘
```

**Form:**
```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│  Title (English) *              Title (Arabic) *        │
│  [____________________]         [____________________]  │
│                                                         │
│  Description (English)          Description (Arabic)    │
│  [____________________]         [____________________]  │
│  [____________________]         [____________________]  │
│  [____________________]         [____________________]  │
│                                                         │
│  Icon Class                     Sort Order              │
│  [fas fa-stethoscope___]        [0_____]                │
│  ℹ️ Font Awesome class          ℹ️ Lower numbers first  │
│                                                         │
│  Status                                                 │
│  [✓] Active                                             │
│                                                         │
│  Image                                                  │
│  [Choose File] No file chosen                           │
│  ℹ️ Upload an image (optional, max 2MB)                │
│                                                         │
│  [💾 Save] [✖️ Cancel]                                  │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

**Required Fields:** Marked with *
**Optional Fields:** All others

---

## 3. Edit Service Form (`/admin/services/{id}/edit`)

### Layout Description

Same as Create form, plus:

**Current Image Display:**
```
┌─────────────────────────────────────────────────────────┐
│  Image (Current)                                        │
│  ┌─────────────┐                                        │
│  │   [Image]   │                                        │
│  │   Preview   │                                        │
│  └─────────────┘                                        │
│                                                         │
│  Image (Replace)                                        │
│  [Choose File] No file chosen                           │
│  ℹ️ Upload an image (optional, max 2MB)                │
└─────────────────────────────────────────────────────────┘
```

---

## 4. Homepage Services Section (`/`)

### Layout Description (Desktop)

**Section Title:**
```
┌─────────────────────────────────────────────────────────┐
│                      خدماتنا                            │
│                   Our Services                          │
└─────────────────────────────────────────────────────────┘
```

**Services Grid (3 columns):**
```
┌─────────────────┐  ┌─────────────────┐  ┌─────────────────┐
│                 │  │                 │  │                 │
│       🩺        │  │      👨‍⚕️       │  │       🚑        │
│                 │  │                 │  │                 │
│  الفحوصات الطبية│  │الاستشارات الطبية│  │     الطوارئ     │
│  Medical Exams  │  │ Consultations   │  │   Emergency     │
│                 │  │                 │  │                 │
│  فحوصات شاملة   │  │ استشارات مع    │  │ خدمة طوارئ على │
│  مع أحدث الأجهزة│  │ أفضل الأطباء   │  │  مدار الساعة   │
│                 │  │                 │  │                 │
└─────────────────┘  └─────────────────┘  └─────────────────┘
```

**Mobile View (1 column):**
```
┌─────────────────┐
│       🩺        │
│  الفحوصات الطبية│
│  فحوصات شاملة...│
└─────────────────┘
┌─────────────────┐
│      👨‍⚕️       │
│الاستشارات الطبية│
│  استشارات مع... │
└─────────────────┘
┌─────────────────┐
│       🚑        │
│     الطوارئ     │
│  خدمة طوارئ...  │
└─────────────────┘
```

---

## 5. Admin Sidebar Menu

### Layout Description

**Sidebar:**
```
┌────────────────────────┐
│   🩺 لوحة الإدارة      │
├────────────────────────┤
│ ⭐ إدارة التقييمات    │
│ 🔔 إدارة الخدمات      │ ← NEW
│ 📊 التقارير الشهرية   │
│                        │
│ 🏠 العودة للموقع      │
└────────────────────────┘
```

**Active State:**
When on `/admin/services`, the "إدارة الخدمات" item is highlighted with blue background.

---

## 6. Success/Error Messages

### Success Message (After Create/Update/Delete)
```
┌─────────────────────────────────────────────────────────┐
│ ✓ تم إنشاء الخدمة بنجاح!                          [×] │
│   Service created successfully!                         │
└─────────────────────────────────────────────────────────┘
```

### Error Message (Validation)
```
┌─────────────────────────────────────────────────────────┐
│ ✗ يرجى تصحيح الأخطاء التالية:                    [×] │
│   - Title (English) field is required                   │
└─────────────────────────────────────────────────────────┘
```

---

## 7. Delete Confirmation Dialog

### Browser Alert
```
┌─────────────────────────────────────────────┐
│  هل أنت متأكد من حذف هذه الخدمة؟            │
│  Are you sure you want to delete this       │
│  service?                                   │
│                                             │
│          [Cancel]  [OK]                     │
└─────────────────────────────────────────────┘
```

---

## 8. Empty State

### No Services Message
```
┌─────────────────────────────────────────────────────────┐
│                                                         │
│           ℹ️ لا توجد خدمات متاحة                       │
│              No services available.                     │
│                                                         │
└─────────────────────────────────────────────────────────┘
```

---

## Color Scheme

### Status Buttons
- **Active (Green):** `#198754` - Bootstrap success
- **Inactive (Gray):** `#6c757d` - Bootstrap secondary

### Action Buttons
- **Edit (Blue):** `#0dcaf0` - Bootstrap info
- **Delete (Red):** `#dc3545` - Bootstrap danger
- **Primary (Blue):** `#0d6efd` - Bootstrap primary

### Icons
- Services icon: `🔔` (fas fa-concierge-bell)
- Edit icon: `✏️` (fas fa-edit)
- Delete icon: `🗑️` (fas fa-trash)
- Add icon: `➕` (fas fa-plus)
- Save icon: `💾` (fas fa-save)

---

## Typography

### Fonts
- **Arabic:** 'Segoe UI' or system default Arabic font
- **English:** 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif

### Font Sizes
- **Page Title (h2):** 32px
- **Card Title (h5):** 20px
- **Body Text:** 16px
- **Small Text:** 14px

---

## Responsive Breakpoints

### Desktop (≥ 768px)
- Services: 3 columns
- Table: Full width
- Forms: 2-column layout

### Tablet (576px - 767px)
- Services: 2 columns
- Table: Horizontal scroll
- Forms: 2-column layout

### Mobile (< 576px)
- Services: 1 column
- Table: Horizontal scroll
- Forms: 1-column layout

---

## Accessibility

### Keyboard Navigation
- Tab through form fields
- Enter to submit
- Esc to close modals

### Screen Reader Support
- Alt text on images
- ARIA labels on buttons
- Form field labels

### Color Contrast
- Text: WCAG AA compliant
- Buttons: Clear contrast ratios

---

## Browser Support

✅ Chrome 90+
✅ Firefox 88+
✅ Safari 14+
✅ Edge 90+
✅ Mobile browsers (iOS Safari, Chrome Mobile)

---

## Animation & Interactions

### Hover Effects
- Buttons: Slight darkening on hover
- Table rows: Light gray background on hover
- Drag handle: Cursor changes to move cursor

### Transitions
- Button state changes: 0.3s ease
- Alert messages: Fade in/out
- Page loads: Smooth rendering

### Drag & Drop
- Visual feedback during drag
- Drop zones highlighted
- Smooth reordering animation

---

## Notes for Developers

1. **RTL Support:** All layouts automatically flip for Arabic (dir="rtl")
2. **Bootstrap 5:** All components use Bootstrap 5 classes
3. **Font Awesome 6:** Icons loaded from CDN
4. **SortableJS:** Drag-drop library loaded from CDN
5. **Responsive:** Mobile-first design approach

---

## Testing UI

Use browser developer tools to:
1. Test responsive breakpoints
2. Check RTL layout (html[dir="rtl"])
3. Verify color contrast
4. Test keyboard navigation
5. Validate form submissions

---

**UI Design Complete** ✅

All components are styled with Bootstrap 5 and follow modern web design principles.

---

© 2024 My Bestad Online Medical Consultations
