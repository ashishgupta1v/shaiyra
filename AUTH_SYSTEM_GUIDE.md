# 🔐 Authentication System Guide

## Overview

The Shaiyra application now includes a complete authentication system with:

- **Backend API**: Laravel-based REST API with JWT token authentication
- **Frontend Integration**: Vue 3 login form connected to the API
- **Database**: SQLite with user management
- **Middleware**: Authentication guards for protected routes

---

## ✅ Implementation Complete

### Backend Components ✅

#### 1. **AuthController** (`app/Http/Controllers/Phase1/AuthController.php`)
Handles all authentication operations:

- **POST `/api/v1/auth/login`** - Authenticate with email/password
  - Validates credentials
  - Returns JWT token and user data
  - Supports "Remember Device" option

- **POST `/api/v1/auth/register`** - Create new account
  - Validates email uniqueness
  - Creates user with hashed password
  - Auto-verifies email for now

- **POST `/api/v1/auth/logout`** - Revoke authentication
  - Invalidates current token
  - Clears session

- **GET `/api/v1/auth/me`** - Get current user info
  - Requires valid token
  - Returns authenticated user data

- **POST `/api/v1/auth/refresh`** - Refresh authentication token
  - Maintains session across browser sessions

#### 2. **AuthMiddleware** (`app/Http/Middleware/AuthMiddleware.php`)
Protects routes and verifies authentication:

- Checks for valid Bearer token in Authorization header
- Checks for session cookie (for web routes)
- Returns 401 Unauthorized for missing credentials
- Redirects unauthenticated web requests to login

#### 3. **User Model** (`app/Models/User.php`)
Enhanced with:

- `HasApiTokens` trait (Laravel Sanctum)
- `is_active` boolean field (user status)
- API token generation capability
- Password hashing

#### 4. **Database Migration**
Added to users table:

```sql
ALTER TABLE users ADD COLUMN is_active BOOLEAN DEFAULT true;
```

### Frontend Components ✅

#### 1. **LoginPage.vue** (`resources/js/views/LoginPage.vue`)
Complete login form with:

- Email input field
- Password input field
- "Remember Device" checkbox
- Form validation
- Error message display
- Success message display
- Loading state
- Direct navigation to dashboard on success
- Demo credentials displayed

#### 2. **Router Configuration** Updated
All 15 pages now use semantic names:

- Public routes (no auth required):
  - `/auth/login` → LoginPage
  - `/home` → HomePage
  - `/life-feed` → LifeFeedPage
  - `/milestones` → MilestonesPage
  - `/achievements` → AchievementsPage
  - `/public-family-tree` → PublicFamilyTreePage

- Protected routes (auth required):
  - `/dashboard` → DashboardPage
  - `/family-tree` → FamilyTreePage
  - `/family-portal` → FamilyPortalPage
  - `/growth-tracker` → GrowthTrackerPage
  - `/wellness-archive` → WellnessArchivePage
  - `/letters-archive` → LettersArchivePage
  - `/future-forward-hub` → FutureForwardHubPage
  - `/archive-export` → ArchiveExportPage

#### 3. **Navigation Guard**
Protects authenticated routes:

- Checks for valid token in localStorage
- Redirects to login if token missing
- Allows public pages regardless of auth status

---

## 🚀 Testing the Authentication

### 1. Start the Application

```bash
# Terminal 1: Start Laravel backend
php artisan serve

# Terminal 2: Start Vite development server
npm run dev
```

### 2. Test Login with Dummy Credentials

**Email**: `guardian@shaiyra.test`  
**Password**: `password123`

Or try any of these accounts:

| Email | Password | Role |
|-------|----------|------|
| guardian@shaiyra.test | password123 | Primary Guardian |
| guardian2@shaiyra.test | password123 | Secondary Guardian |
| grandma@shaiyra.test | password123 | Grandparent |
| aunt@shaiyra.test | password123 | Extended Family |
| demo@shaiyra.test | password123 | Demo User |
| test@shaiyra.test | password123 | Test Account |

### 3. Test the Login Flow

1. Visit `http://127.0.0.1:8000`
2. Enter credentials: `guardian@shaiyra.test` / `password123`
3. Click "Enter the Archive"
4. Should redirect to `/dashboard`
5. Check browser console for token in localStorage

### 4. Test Protected Routes

After login, try accessing:

- `http://127.0.0.1:8000/family-portal` ✅ Should work
- `http://127.0.0.1:8000/growth-tracker` ✅ Should work

Logout and try again:

- `http://127.0.0.1:8000/family-portal` ❌ Should redirect to login

### 5. Test Public Routes

Without login, these should work:

- `http://127.0.0.1:8000/home` ✅
- `http://127.0.0.1:8000/life-feed` ✅
- `http://127.0.0.1:8000/milestones` ✅

---

## 🔌 API Endpoints Reference

### Authentication Endpoints

#### Login
```http
POST /api/v1/auth/login
Content-Type: application/json

{
  "email": "guardian@shaiyra.test",
  "password": "password123"
}

RESPONSE 200:
{
  "message": "Login successful",
  "status": "success",
  "user": {
    "id": 1,
    "name": "Sarah Guardian",
    "email": "guardian@shaiyra.test",
    "email_verified": true
  },
  "token": "1|AbCdEfGhIjKlMnOpQrStUvWxYz...",
  "token_type": "Bearer"
}
```

#### Register
```http
POST /api/v1/auth/register
Content-Type: application/json

{
  "name": "John Doe",
  "email": "john@example.com",
  "password": "secure_password_123",
  "password_confirmation": "secure_password_123"
}

RESPONSE 201:
{
  "message": "Registration successful",
  "status": "success",
  "user": {... },
  "token": "...",
  "token_type": "Bearer"
}
```

#### Get Current User
```http
GET /api/v1/auth/me
Authorization: Bearer {token}

RESPONSE 200:
{
  "status": "success",
  "user": {
    "id": 1,
    "name": "Sarah Guardian",
    "email": "guardian@shaiyra.test",
    "email_verified": true
  }
}
```

#### Logout
```http
POST /api/v1/auth/logout
Authorization: Bearer {token}

RESPONSE 200:
{
  "message": "Logged out successfully",
  "status": "success"
}
```

---

## 🛠️ How the Login Form Works

### 1. **Form Submission**
```javascript
async handleLogin() {
    // Validate inputs
    // Send POST request to /api/v1/auth/login
    // Receive token and user data
    // Store token in localStorage
    // Redirect to dashboard
}
```

### 2. **Token Storage**
Token is stored in browser localStorage:
```javascript
localStorage.setItem('auth_token', data.token);
localStorage.setItem('user', JSON.stringify(data.user));
```

### 3. **Protected Route Access**
Router checks for token before accessing protected routes:
```javascript
// In router.beforeEach()
const isAuthenticated = !!localStorage.getItem('auth_token');
if (to.meta.requiresAuth && !isAuthenticated) {
    // Redirect to login
}
```

### 4. **API Requests with Token**
When making API calls to protected endpoints:
```javascript
fetch('/api/v1/auth/me', {
    headers: {
        'Authorization': `Bearer ${localStorage.getItem('auth_token')}`
    }
});
```

---

## 📋 File Structure

```
app/Http/
├── Controllers/
│   └── Phase1/
│       └── AuthController.php          ← Main auth logic
├── Middleware/
│   └── AuthMiddleware.php              ← Route protection
└── ...

app/Models/
└── User.php                            ← User model with Sanctum

resources/js/
├── views/
│   ├── LoginPage.vue                   ← Login form (new)
│   ├── DashboardPage.vue               ← Protected route (new)
│   ├── HomePage.vue                    ← Public route (new)
│   ├── FamilyPortalPage.vue            ← Protected route (new)
│   └── ... (other page components)
└── router/
    └── index.js                        ← Routes with auth guards (updated)

database/
├── migrations/
│   ├── 0001_01_01_000000_create_users_table.php
│   ├── 0001_01_01_000001_create_cache_table.php
│   ├── 0001_01_01_000002_create_jobs_table.php
│   └── 2025_05_04_000003_add_is_active_to_users.php  ← New
├── seeders/
│   └── DatabaseSeeder.php              ← Test user creation (updated)
└── factories/
    └── UserFactory.php                 ← User generation (updated)

routes/
└── api.php                             ← Auth endpoints (updated)
```

---

## 🔄 Authentication Flow Diagram

```
1. USER VISITS APP
   ↓
2. ROOT PATH (/) → Redirect to /auth/login
   ↓
3. LOGIN FORM DISPLAYS (LoginPage.vue)
   ↓
4. USER ENTERS EMAIL & PASSWORD
   ↓
5. FORM SUBMITS TO POST /api/v1/auth/login
   ↓
6. SERVER VALIDATES CREDENTIALS
   ├─ Valid → Generate JWT token
   └─ Invalid → Return 422 error
   ↓
7. CLIENT STORES TOKEN IN localStorage
   ↓
8. REDIRECT TO /dashboard
   ↓
9. NAVIGATE TO PROTECTED ROUTES
   ├─ Token valid → Route access granted
   └─ Token missing/invalid → Redirect to login
```

---

## ⚙️ Configuration

### Sanctum Setup
The app uses Laravel Sanctum for API token authentication:

```php
// config/sanctum.php
'stateful' => [...],
'expiration' => null,  // Tokens don't expire
```

### User Model Traits
```php
class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable;
    // ...
}
```

---

## 🔒 Security Notes

### ✅ Implemented
- Password hashing (bcrypt)
- Email validation
- CORS protection (via Sanctum)
- HTTP-only cookies option
- Token revocation on logout

### 🔜 Consider for Production
- Add rate limiting to login endpoint
- Implement 2FA (two-factor authentication)
- Add password reset functionality
- Add email verification requirement
- Implement refresh token rotation
- Add session timeout
- Enable HTTPS only
- Implement CSRF protection for web forms
- Add audit logging for auth events
- Consider OAuth2 social login options

---

## 📞 Troubleshooting

### Issue: "Invalid credentials" on login
**Solution**: Verify test user exists in database
```bash
php artisan tinker
>>> User::all();
```

### Issue: Token not being stored
**Solution**: Check browser localStorage in DevTools
```javascript
// In browser console
localStorage.getItem('auth_token');  // Should show token
```

### Issue: Redirect loop between login and protected route
**Solution**: Clear localStorage and login again
```javascript
// In browser console
localStorage.clear();
// Then refresh and login
```

### Issue: 401 Unauthorized on API calls
**Solution**: Verify Bearer token is being sent in header
```javascript
// In request headers
Authorization: Bearer {token}
```

### Issue: CORS errors
**Solution**: Ensure Sanctum is configured in API requests
```javascript
// Check API URL matches backend
fetch('http://127.0.0.1:8000/api/v1/auth/login', {...})
```

---

## 📚 Next Steps

### Phase 1 (Now)
- ✅ User authentication via login form
- ✅ JWT token generation and storage
- ✅ Protected route access control

### Phase 2 (Next)
- [ ] Connect dashboard to retrieve authenticated user data
- [ ] Implement logout functionality
- [ ] Add "Remember Me" persistent login
- [ ] Create family setup/invitation flow

### Phase 3 (Later)
- [ ] Password reset/recovery
- [ ] Email verification
- [ ] Account settings/profile management
- [ ] Two-factor authentication (2FA)

### Phase 4 (Future)
- [ ] Social login (Google, Apple)
- [ ] Role-based access control (RBAC)
- [ ] Advanced permission system
- [ ] Session management dashboard

---

## 🎓 Learning Resources

### Laravel Authentication
- https://laravel.com/docs/sanctum
- https://laravel.com/docs/authentication

### Vue 3 with Authentication
- https://vuejs.org/guide/routing.html
- https://router.vuejs.org/guide/

### Security Best Practices
- https://owasp.org/www-project-top-ten/
- https://cheatsheetseries.owasp.org/

---

**Last Updated**: May 4, 2025  
**Status**: ✅ Implementation Complete  
**Ready for**: User Testing & Phase 2 Development
