# 🗺️ Application Navigation Guide - Page Names & Routes

This document maps all application pages to their actual names, routes, and purposes.

---

## 🚀 Quick Navigation Reference

### After Login
Once you login with any test account, you have access to these pages:

---

## 📱 Phase 1: Foundation & Shell (Authentication)

| Page Name | URL Route | Component | Purpose |
|-----------|-----------|-----------|---------|
| **Secure Login** | `/auth/login` | Screen1.vue | Guardian/family member login portal |
| **Dashboard** | `/dashboard` | Screen2.vue | Main dashboard after authentication |

**Login Credentials**: Use any from DUMMY_CREDENTIALS.md  
**Example**: 
- Email: `guardian@shaiyra.test`
- Password: `password123`

---

## 🏠 Phase 2: Public Narrative (Public & Shared Content)

These pages are publicly accessible or shareable.

| Page Name | URL Route | Component | Purpose |
|-----------|-----------|-----------|---------|
| **Home Profile** | `/home` | Screen3.vue | Child's home page with hero image and bio |
| **Life Feed** | `/life-feed` | Screen4.vue | Chronological timeline of all life events |
| **Milestones** | `/milestones` | Screen5.vue | Gallery view of important milestones |
| **Life Journey Age 4** | `/life-journey-age-4` | Screen6.vue | Curated snapshot at specific age |
| **Achievements** | `/achievements` | Screen7.vue | Educational and personal accomplishments |
| **Public Family Tree** | `/public-family-tree` | Screen13.vue | Genealogical display (public view) |

**Access**: Public (no authentication required for viewing)  
**Note**: Some content may be restricted based on privacy settings

---

## 🔐 Phase 3: Private Vault (Family-Only Content)

These pages require authentication and family membership.

| Page Name | URL Route | Component | Purpose |
|-----------|-----------|-----------|---------|
| **Family Portal** | `/family-portal` | Screen9.vue | Family member directory & management |
| **Growth Tracker** | `/growth-tracker` | Screen10.vue | Height/weight and developmental milestones |
| **Wellness Archive** | `/wellness-archive` | Screen11.vue | Health records and wellness history |
| **Family Tree** | `/family-tree` | Screen8.vue | Private genealogical documentation |

**Access**: Authenticated family members only  
**Note**: Data isolation by family; role-based permissions apply

---

## 📚 Phase 4: Legacy & Heritage Archive

These pages handle long-term archival and succession planning.

| Page Name | URL Route | Component | Purpose |
|-----------|-----------|-----------|---------|
| **Letters Archive** | `/letters-archive` | Screen12.vue | Time-locked messages and letters |
| **Future Forward Hub** | `/future-forward-hub` | Screen14.vue | Legacy planning and succession strategy |
| **Archive & Export** | `/archive-export` | Screen15.vue | Data export and backup functionality |

**Access**: Authenticated family members with appropriate permissions  
**Note**: Legacy features for long-term content preservation

---

## 🔄 Complete User Flow

### 1️⃣ First Visit
```
http://127.0.0.1:8000
    ↓ (Redirects to)
/auth/login
    ↓ (Login form - Screen1.vue)
Enter email: guardian@shaiyra.test
Enter password: password123
Click Login
    ↓ (On success)
```

### 2️⃣ After Authentication
```
/dashboard (Screen2.vue)
    ↓ Can navigate to:
    ├─ /home (public home page)
    ├─ /life-feed (timeline)
    ├─ /milestones (gallery)
    ├─ /family-portal (family management)
    ├─ /growth-tracker (wellness)
    ├─ /wellness-archive (health records)
    ├─ /family-tree (private tree)
    ├─ /letters-archive (legacy)
    └─ /archive-export (data export)
```

### 3️⃣ Public Viewing (No Login)
```
Direct URL to public pages:
    ├─ /home
    ├─ /life-feed
    ├─ /milestones
    ├─ /life-journey-age-4
    ├─ /achievements
    └─ /public-family-tree
```

---

## 🎯 Routes by Purpose

### For Guardians/Parents
- **Dashboard** (`/dashboard`) - Command center
- **Family Portal** (`/family-portal`) - Manage family
- **Growth Tracker** (`/growth-tracker`) - Track development
- **Wellness Archive** (`/wellness-archive`) - Health records
- **Letters Archive** (`/letters-archive`) - Legacy messages

### For Extended Family (Grandparents, Aunts, Uncles)
- **Home Profile** (`/home`) - View child's profile
- **Life Feed** (`/life-feed`) - View timeline
- **Milestones** (`/milestones`) - View achievements
- **Public Family Tree** (`/public-family-tree`) - View genealogy
- **Family Tree** (`/family-tree`) - View private tree (if permitted)

### For Public Visitors / Friends
- **Home Profile** (`/home`) - View shared content
- **Life Feed** (`/life-feed`) - Browse timeline
- **Milestones** (`/milestones`) - View photo galleries
- **Achievements** (`/achievements`) - View accomplishments
- **Public Family Tree** (`/public-family-tree`) - View genealogy

---

## 🔐 Access Control Matrix

| Page | Public | Auth Required | Family Auth | Notes |
|------|--------|---------------|-------------|-------|
| Secure Login | ✅ | ❌ | ❌ | Anyone can access |
| Dashboard | ❌ | ✅ | ❌ | Logged-in users only |
| Home Profile | ✅ | ❌ | ❌ | Public or privacy-controlled |
| Life Feed | ✅ | ❌ | ❌ | Shows public events only |
| Milestones | ✅ | ❌ | ❌ | Shows public milestones |
| Life Journey Age 4 | ✅ | ❌ | ❌ | Public snapshot |
| Achievements | ✅ | ❌ | ❌ | Public achievements |
| Public Family Tree | ✅ | ❌ | ❌ | Limited genealogy view |
| Family Portal | ❌ | ✅ | ✅ | Family members only |
| Family Tree | ❌ | ✅ | ✅ | Private genealogy |
| Growth Tracker | ❌ | ✅ | ✅ | Family-only medical data |
| Wellness Archive | ❌ | ✅ | ✅ | Health records (private) |
| Letters Archive | ❌ | ✅ | ✅ | Legacy messages |
| Future Forward Hub | ❌ | ✅ | ✅ | Succession planning |
| Archive & Export | ❌ | ✅ | ✅ | Data export |

---

## 🧭 Testing Each Page

### How to Test a Page

1. **Public Pages** (No login needed)
   ```
   Direct URL: http://127.0.0.1:8000/home
   ```

2. **Authenticated Pages** (Login required)
   ```
   1. Login at /auth/login
   2. Navigate to page (e.g., /dashboard)
   ```

3. **Family-Only Pages** (Login + family membership required)
   ```
   1. Login as guardian@shaiyra.test
   2. Navigate to /family-portal
   3. (When RBAC implemented, test with extended family accounts)
   ```

---

## 🔗 Related Pages

### Navigation Between Pages

**From Dashboard**, you can typically navigate to:
- Family Portal (manage family)
- Growth Tracker (wellness data)
- Wellness Archive (health history)
- Public content pages

**From Public Pages**, you can:
- View shared content
- Access public family tree
- View milestones and achievements
- (Login to access family features)

---

## 📋 Page Features Summary

### Security/Login
- **Screen1** (Secure Login): Form validation, password hashing, JWT/session management

### Content Management
- **Screen3** (Home): Hero banner, bio, featured content
- **Screen4** (Life Feed): Timeline, filtering, pagination
- **Screen5** (Milestones): Gallery, lightbox, sorting

### Family Features
- **Screen9** (Family Portal): Member list, invitations, role management
- **Screen10** (Growth Tracker): Charts, measurements, percentiles
- **Screen11** (Wellness): Health logs, nutrition, sleep tracking

### Legacy/Heritage
- **Screen12** (Letters): Time-locked messages, encryption
- **Screen14** (Future Forward): Succession planning, executor info
- **Screen15** (Archive & Export): Backup, data export

---

## 🎨 Theme & Styling

All pages follow the **"Professional Elegance"** design system:
- **Primary Color**: Blue (trust, reliability)
- **Secondary Color**: Indigo (sophistication)
- **Accent Color**: Amber (warmth)
- **Backgrounds**: Soft neutrals (cream, light gray)
- **Responsive**: Mobile-first with container queries

---

## ⚙️ Development Tips

### Add a New Page

1. Create component in `resources/js/views/`
2. Add route to `resources/js/router/index.js`:
   ```javascript
   { 
     path: '/new-page', 
     component: () => import('../views/NewPage.vue'), 
     name: 'new-page-name',
     meta: { public: true } // or requiresAuth: true
   }
   ```
3. Add navigation link in parent pages
4. Document in QUICK_REFERENCE.md and this file

### Change a Route Path
1. Update path in `router/index.js`
2. Update link references in components
3. Update this documentation
4. Update QUICK_REFERENCE.md

---

## 📱 URL Patterns

- **Public pages**: Flat URLs (`/home`, `/milestones`)
- **Authenticated pages**: Mostly flat (`/dashboard`, `/family-portal`)
- **Legacy pages**: Grouped (`/letters-archive`, `/future-forward-hub`)

---

Last Updated: January 2025
