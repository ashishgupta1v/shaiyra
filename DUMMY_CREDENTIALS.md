# 🔐 Dummy Login Credentials - Shaiyra Development

This document provides all test accounts for development and testing purposes.

> ⚠️ **These are development credentials only.** Never use these in production.

---

## Quick Start

**Application URL**: http://127.0.0.1:8000

**Navigate to**: `/auth/login` (or directly go to root which redirects to login)

---

## Test Accounts

All test accounts use the same password: **`password123`**

### 1. Primary Guardian (Admin)
**Role**: Family Admin / Account Owner  
**Email**: `guardian@shaiyra.test`  
**Password**: `password123`  
**Access**: Full access to all features, can manage family members

**Use Case**: 
- Test creating content
- Invite other family members
- Manage family settings
- Access private vault

---

### 2. Secondary Guardian (Co-Parent)
**Role**: Guardian / Co-Admin  
**Email**: `guardian2@shaiyra.test`  
**Password**: `password123`  
**Access**: Edit and view family content (once family auth is implemented)

**Use Case**:
- Test family collaboration
- Edit shared content
- View wellness/growth records
- Manage children's activities

---

### 3. Extended Family (Grandparent)
**Role**: Extended Family  
**Email**: `grandma@shaiyra.test`  
**Password**: `password123`  
**Access**: View-only access to family content (once role-based access is implemented)

**Use Case**:
- Test read-only access
- View life feed and milestones
- See shared photos and events

---

### 4. Extended Family (Aunt)
**Role**: Extended Family  
**Email**: `aunt@shaiyra.test`  
**Password**: `password123`  
**Access**: View-only access to family content (once role-based access is implemented)

**Use Case**:
- Test role-based restrictions
- View public and shared family content

---

### 5. Demo User
**Role**: Generic Demo Account  
**Email**: `demo@shaiyra.test`  
**Password**: `password123`  
**Access**: General testing account

**Use Case**:
- General feature testing
- Public content exploration
- User flow testing

---

### 6. Test User
**Role**: Generic Test Account  
**Email**: `test@shaiyra.test`  
**Password**: `password123`  
**Access**: General testing account

**Use Case**:
- API testing
- Integration testing
- Automated test runs

---

## Login Instructions

### Step 1: Start the Application
```bash
# From project root
composer run dev

# This starts:
# - Laravel server on http://127.0.0.1:8000
# - Vite dev server on http://127.0.0.1:5174
```

### Step 2: Navigate to Login
```
http://127.0.0.1:8000
```

The application will automatically redirect to `/auth/login`

### Step 3: Enter Credentials
- **Email**: Choose any test account from above (e.g., `guardian@shaiyra.test`)
- **Password**: `password123`

### Step 4: Submit
Click "Login" button

---

## Current Implementation Status

✅ **Implemented**:
- Login route (`/auth/login`)
- Vue login component (Screen1.vue)
- User model and factory
- Dummy users seeded to database

⏳ **In Progress**:
- Authentication middleware
- JWT token generation
- Login form validation
- Dashboard redirecting after auth

❌ **Not Yet Implemented**:
- Role-based access control (RBAC)
- Family authorization
- Permission enforcement
- Private vault access restrictions

---

## Seeding Test Data

To create test users in your local database:

```bash
# Run seeders
php artisan db:seed

# Or seed specific seeder
php artisan db:seed --class=DatabaseSeeder
```

**What gets created**:
- 6 test user accounts
- All with `email_verified_at` set (no email verification needed)
- All with status `active`

---

## Resetting Database

If you need to reset and recreate test data:

```bash
# Fresh database with seeds
php artisan migrate:fresh --seed

# This will:
# 1. Drop all tables
# 2. Re-run all migrations
# 3. Run DatabaseSeeder
# 4. Create all 6 test accounts
```

---

## Testing Different Roles

### Current Status
Since RBAC isn't yet implemented, all logged-in users have equal access.

### When RBAC is Implemented
Use these test accounts to verify role-based permissions:

- **Admin Operations**: Use `guardian@shaiyra.test` (Primary Guardian)
- **Collaboration**: Use `guardian@shaiyra.test` + `guardian2@shaiyra.test`
- **Read-Only Access**: Use `grandma@shaiyra.test` (Extended Family)
- **Public Content**: Use any account

---

## API Testing

If testing API endpoints manually with curl:

```bash
# Login and get token
curl -X POST http://127.0.0.1:8000/api/v1/auth/login \
  -H "Content-Type: application/json" \
  -d '{
    "email": "guardian@shaiyra.test",
    "password": "password123"
  }'

# Response will include authentication token
# Use token in subsequent requests:
curl -H "Authorization: Bearer YOUR_TOKEN" \
  http://127.0.0.1:8000/api/v1/life-events
```

---

## Troubleshooting

### "No application encryption key"
```bash
php artisan key:generate
```

### Database not found
```bash
touch database/database.sqlite
php artisan migrate
php artisan db:seed
```

### Users not showing in database
```bash
# Check if seeder ran
php artisan db:seed

# Verify users exist
php artisan tinker
> User::all()
```

### Login fails with "Invalid credentials"
1. Ensure you're using exact email from list above
2. Ensure password is exactly: `password123`
3. Check browser console for errors
4. Check Laravel logs: `storage/logs/`

---

## Page Navigation After Login

Once logged in, you can navigate to:

### Phase 2: Public Content (No Auth Needed)
- `/home` - Home profile
- `/life-feed` - Life feed timeline
- `/milestones` - Milestones gallery
- `/life-journey-age-4` - Life journey at age 4
- `/achievements` - Educational achievements
- `/public-family-tree` - Public family tree

### Phase 3: Private Vault (Auth Required)
- `/dashboard` - Main dashboard
- `/family-portal` - Family member management
- `/family-tree` - Private family tree
- `/growth-tracker` - Growth tracking
- `/wellness-archive` - Wellness records

### Phase 4: Legacy (Auth Required)
- `/letters-archive` - Letters archive
- `/future-forward-hub` - Legacy planning
- `/archive-export` - Data export

---

## Notes

- All passwords default to: **`password123`**
- Change `/password` in `DatabaseSeeder.php` to use different password
- Each account is created with `firstOrCreate()`, so running seeder multiple times is safe
- Accounts are created with verified email addresses (ready to use immediately)

---

Last Updated: January 2025
