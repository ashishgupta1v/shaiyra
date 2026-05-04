# 🗺️ Routes Reference Card - Quick Lookup

## All Application Routes (January 2025)

### 🔴 Red Routes: Authentication (Public)

```
GET  /            → Redirect to /auth/login
GET  /auth/login  → Login Form (Screen1.vue)
     Status: 🟢 Ready
     Access: Anyone
```

### 🟢 Green Routes: Dashboard (Auth Required)

```
GET  /dashboard   → Family Dashboard (Screen2.vue)
     Status: 🟢 Ready for next phase
     Access: Authenticated users only
```

### 🔵 Blue Routes: Public Content (No Auth)

```
GET  /home                    → Home Profile (Screen3.vue)
GET  /life-feed               → Life Feed Timeline (Screen4.vue)
GET  /milestones              → Milestones Gallery (Screen5.vue)
GET  /life-journey-age-4      → Life Journey Snapshot (Screen6.vue)
GET  /achievements            → Educational Achievements (Screen7.vue)
GET  /public-family-tree      → Public Family Tree (Screen13.vue)

     Status: 🟡 Under development
     Access: Public or privacy-controlled
```

### 🟣 Purple Routes: Private Vault (Auth + Family)

```
GET  /family-portal           → Family Portal & Members (Screen9.vue)
GET  /growth-tracker          → Growth Tracking (Screen10.vue)
GET  /wellness-archive        → Wellness Records (Screen11.vue)
GET  /family-tree             → Private Family Tree (Screen8.vue)

     Status: 🟡 Under development
     Access: Authenticated family members only
```

### 🟠 Orange Routes: Legacy & Heritage (Auth + Family)

```
GET  /letters-archive         → Letters & Messages (Screen12.vue)
GET  /future-forward-hub      → Legacy Planning (Screen14.vue)
GET  /archive-export          → Data Export (Screen15.vue)

     Status: 🟡 Under development
     Access: Authenticated family members only
```

---

## Route Properties Matrix

| Route | Component | Public | Auth | Family | Status |
|-------|-----------|--------|------|--------|--------|
| `/` | Redirect | ✅ | ❌ | ❌ | 🟢 Active |
| `/auth/login` | Screen1 | ✅ | ❌ | ❌ | 🟢 Ready |
| `/dashboard` | Screen2 | ❌ | ✅ | ❌ | 🟡 Next Phase |
| `/home` | Screen3 | ✅ | ❌ | ❌ | 🟡 Dev |
| `/life-feed` | Screen4 | ✅ | ❌ | ❌ | 🟡 Dev |
| `/milestones` | Screen5 | ✅ | ❌ | ❌ | 🟡 Dev |
| `/life-journey-age-4` | Screen6 | ✅ | ❌ | ❌ | 🟡 Dev |
| `/achievements` | Screen7 | ✅ | ❌ | ❌ | 🟡 Dev |
| `/family-tree` | Screen8 | ❌ | ✅ | ✅ | 🟡 Dev |
| `/family-portal` | Screen9 | ❌ | ✅ | ✅ | 🟡 Dev |
| `/growth-tracker` | Screen10 | ❌ | ✅ | ✅ | 🟡 Dev |
| `/wellness-archive` | Screen11 | ❌ | ✅ | ✅ | 🟡 Dev |
| `/letters-archive` | Screen12 | ❌ | ✅ | ✅ | 🟡 Dev |
| `/public-family-tree` | Screen13 | ✅ | ❌ | ❌ | 🟡 Dev |
| `/future-forward-hub` | Screen14 | ❌ | ✅ | ✅ | 🟡 Dev |
| `/archive-export` | Screen15 | ❌ | ✅ | ✅ | 🟡 Dev |

---

## Navigation Patterns

### Starting Point
```
http://127.0.0.1:8000
    ↓ (auto-redirect)
/auth/login
```

### After Successful Login
```
/dashboard (main hub)
    ↓ can navigate to any page based on access level
```

### Public Browsing (No Login)
```
/home, /life-feed, /milestones, /life-journey-age-4, 
/achievements, /public-family-tree
```

### Family Portal Access (After Login)
```
/family-portal, /family-tree, /growth-tracker, 
/wellness-archive, /letters-archive, 
/future-forward-hub, /archive-export
```

---

## Middleware Requirements (TBD)

### Current Status (Not yet implemented)
- [ ] `auth` - Verify JWT/session token
- [ ] `family-auth` - Verify family membership
- [ ] `verify-email` - Email verification check
- [ ] `check-permissions` - Role-based access

### Planned Middleware Chain
```
Public Routes:
  GET /home → (no middleware)
  
Auth Routes:
  GET /dashboard → auth middleware
  
Family Routes:
  GET /family-portal → auth + family-auth middleware
```

---

## Testing Each Route

### Test Public Routes (Copy & Paste)
```bash
# In browser or curl
http://127.0.0.1:8000/home
http://127.0.0.1:8000/life-feed
http://127.0.0.1:8000/milestones
```

### Test Auth Routes
```bash
# 1. Login first at
http://127.0.0.1:8000/auth/login
# Email: guardian@shaiyra.test
# Password: password123

# 2. Then visit
http://127.0.0.1:8000/dashboard
http://127.0.0.1:8000/family-portal
```

### Test with Curl (API style)
```bash
# Get login page
curl http://127.0.0.1:8000/auth/login

# Get public page
curl http://127.0.0.1:8000/home

# Get auth-required page (will need token when backend ready)
curl http://127.0.0.1:8000/dashboard
```

---

## Route Naming Convention

### Pattern
- `/phase/feature` for multi-level
- `/feature-name` for flat structure (current)
- All lowercase with hyphens
- Descriptive (not generic)

### Examples
```
✅ Good:     /life-feed, /growth-tracker, /family-portal
❌ Bad:      /screen-1, /page-4, /content-3
```

---

## Common URLs for Development

| Purpose | URL |
|---------|-----|
| Application Home | http://127.0.0.1:8000 |
| Login Page | http://127.0.0.1:8000/auth/login |
| Dashboard | http://127.0.0.1:8000/dashboard |
| Home Profile | http://127.0.0.1:8000/home |
| Vite Dev Server | http://127.0.0.1:5174 |
| PHP Artisan Tinker | `php artisan tinker` |
| Run Tests | `php artisan test` |

---

## Debugging Routes

### View All Routes
```bash
php artisan route:list
```

### Test Specific Route
```bash
php artisan route:list | grep dashboard
```

### Check Route Parameters
```bash
# In Laravel
Route::get(path, [Controller::class, 'action'])->name('route-name');
```

---

## API Routes (Scaffolded, Not Yet Implemented)

### Authentication API
```
POST /api/v1/auth/login
POST /api/v1/auth/logout
POST /api/v1/auth/register
POST /api/v1/auth/refresh-token
```

### Content API
```
GET /api/v1/life-events
GET /api/v1/photos
GET /api/v1/milestones
```

### Family API (Requires Family Auth)
```
GET /api/v1/family-portal/members
POST /api/v1/family-portal/invite
GET /api/v1/growth-charts
```

### Legacy API
```
GET /api/v1/heritage/letters
GET /api/v1/heritage/family-tree
POST /api/v1/heritage/export
```

See `API.md` for full endpoint documentation.

---

## Status Legend

| Symbol | Meaning |
|--------|---------|
| 🟢 | Ready - Can use now |
| 🟡 | In Development - Coming soon |
| 🔴 | Not Started - TBD |
| ❌ | Removed/Deprecated |

---

## Quick Links

- **Documentation**: See `NAVIGATION_GUIDE.md`
- **Credentials**: See `DUMMY_CREDENTIALS.md`
- **Full Changes**: See `CHANGES_SUMMARY.md`
- **Architecture**: See `ARCHITECTURE.md`

---

Last Updated: January 2025
Format: Markdown
Print-Friendly: Yes (use browser print to PDF)
