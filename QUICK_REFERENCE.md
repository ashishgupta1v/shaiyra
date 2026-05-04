# Quick Reference Guide - Getting Started with Shaiyra Development

## 📚 Documentation Reading Order

### For Quick Overview (15 minutes)
1. **COMPLETION_SUMMARY.md** - What's been accomplished
2. **ROADMAP.md** (first section) - The 4 phases at a glance

### For Strategic Understanding (30 minutes)
1. **ROADMAP.md** - Full strategic roadmap
2. **ARCHITECTURE.md** - How components connect

### For Implementation Ready (1 hour)
1. All above, plus:
2. **DATABASE.md** - Data model reference
3. **COMPONENTS.md** - Frontend organization
4. **IMPLEMENTATION_GUIDE.md** - Decisions and reasoning

---

## 🎯 By Role - What to Read

### Product Manager / Stakeholder
- **Start with**: ROADMAP.md
- **Then**: COMPLETION_SUMMARY.md
- **Reference**: ARCHITECTURE.md (for explaining to non-technical people)

### Backend Developer
- **Start with**: DATABASE.md
- **Then**: ARCHITECTURE.md
- **Then**: IMPLEMENTATION_GUIDE.md (Section 4: Educational Walkthrough)
- **Reference**: API.md (in api.php file with inline comments)

### Frontend Developer
- **Start with**: COMPONENTS.md
- **Then**: ARCHITECTURE.md
- **Then**: ROADMAP.md
- **Reference**: resources/js/router/index.js (to see current route structure)

### Tech Lead / Architect
- **Start with**: IMPLEMENTATION_GUIDE.md
- **Then**: ARCHITECTURE.md
- **Then**: DATABASE.md
- **Reference**: ROADMAP.md (for team communication)

### New Team Member
- **Day 1**: ROADMAP.md + ARCHITECTURE.md (2 hours)
- **Day 2**: IMPLEMENTATION_GUIDE.md Section 4 (1 hour)
- **Day 3**: Role-specific docs (DATABASE.md or COMPONENTS.md)

---

## 🚀 Quick Start for Development

### Setting Up Locally (already done ✅)
```bash
# Install dependencies
composer install
npm install --legacy-peer-deps

# Create .env and database
cp .env.example .env
php artisan key:generate
touch database/database.sqlite

# Run migrations
php artisan migrate

# Start dev server
composer run dev
```

### First PR Checklist
- [ ] Read ROADMAP.md to understand which phase you're working on
- [ ] Read ARCHITECTURE.md to understand data flow
- [ ] Check DATABASE.md for relevant tables
- [ ] Check COMPONENTS.md for component patterns
- [ ] Follow naming conventions from IMPLEMENTATION_GUIDE.md
- [ ] Update documentation if you change architecture
- [ ] Test both frontend and backend changes

---

## 📁 Project File Structure

```
shaiyra/
├── 📄 ROADMAP.md .................... Phase breakdown and strategy
├── 📄 ARCHITECTURE.md ............... System design and data flow
├── 📄 DATABASE.md ................... Schema and relationships
├── 📄 COMPONENTS.md ................. Vue components catalog
├── 📄 IMPLEMENTATION_GUIDE.md ........ Decisions and education
├── 📄 COMPLETION_SUMMARY.md ......... What's been done
├── 📄 QUICK_REFERENCE.md ............ This file
│
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Phase1/ (TO CREATE)
│   │   │   ├── Phase2/ (TO CREATE)
│   │   │   ├── Phase3/ (TO CREATE)
│   │   │   └── Phase4/ (TO CREATE)
│   └── Models/ (TO CREATE - User, Family, etc.)
│
├── routes/
│   ├── web.php ...................... Web routes (SPA mount)
│   └── api.php ...................... REST API endpoints (NEW)
│
├── resources/js/
│   ├── router/
│   │   └── index.js ................. Vue routes (RESTRUCTURED)
│   ├── views/
│   │   ├── Screen1.vue .............. Phase 1: Login
│   │   ├── Screen2.vue .............. Phase 1: Dashboard
│   │   ├── Screen3-5.vue ............ Phase 2: Public features
│   │   ├── Screen6-8.vue ............ Phase 2: Journey snapshots
│   │   ├── Screen9-11.vue ........... Phase 3: Private vault
│   │   └── Screen12-15.vue .......... Phase 4: Legacy
│   └── components/ (TO REORGANIZE - Phase 1-4 subfolders)
│
├── database/
│   ├── migrations/ .................. DB structure (TO CREATE - Phase 1-4)
│   ├── factories/ ................... Test data generators
│   └── database.sqlite .............. Local database file
│
└── tests/ ........................... Unit and feature tests
```

---

## 🔑 Key Concepts

### 4 Phases
1. **Phase 1**: Authentication and dashboard (Weeks 1-4)
2. **Phase 2**: Public life feed and milestones (Weeks 5-8)
3. **Phase 3**: Private family vault and wellness (Weeks 9-12)
4. **Phase 4**: Legacy archive and heritage (Weeks 13-16)

### Naming Conventions

**Routes**:
```javascript
/phase-1/secure-login   // Phase 1 features
/phase-2/home           // Phase 2 features
/phase-3/family-portal  // Phase 3 features
/phase-4/family-tree    // Phase 4 features
```

**Controllers**:
```php
app/Http/Controllers/Phase1/AuthController
app/Http/Controllers/Phase2/LifeEventsController
app/Http/Controllers/Phase3/FamilyPortalController
app/Http/Controllers/Phase4/HeritageController
```

**Components**:
```
resources/js/components/phase-1-auth/LoginForm.vue
resources/js/components/phase-2-public/LifeTimeline.vue
resources/js/components/phase-3-vault/FamilyPortal.vue
resources/js/components/phase-4-legacy/LettersArchive.vue
```

**API Endpoints**:
```
POST /api/v1/auth/login
GET /api/v1/life-events
GET /api/v1/family-portal/members
GET /api/v1/heritage/family-tree
```

---

## ⚙️ Architecture in One Diagram

```
┌─────────────────────────────────────────────────────────────┐
│                    User Browser                             │
│  (Loads Vue.js SPA from http://127.0.0.1:8000)             │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│              Vite Dev Server (5174)                         │
│  (Hot Module Replacement for Vue components)               │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│         Vue Router (Client-Side Routing)                    │
│  /phase-1/secure-login ──┐                                 │
│  /phase-2/home       ────┼──▶ Load Screen*.vue component   │
│  /phase-3/family-portal ─┘                                 │
└────────────────────┬────────────────────────────────────────┘
                     │ (HTTP Request to /api/v1/...)
                     ▼
┌─────────────────────────────────────────────────────────────┐
│         Laravel API Router (routes/api.php)                │
│  /api/v1/auth/login ──────────────▶ Phase1\AuthController │
│  /api/v1/life-events ─────────────▶ Phase2\EventController│
│  /api/v1/family-portal/members ───▶ Phase3\FamilyController│
│  /api/v1/heritage/family-tree ────▶ Phase4\HeritageController│
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│    Middleware Layer (Authentication, Authorization)         │
│  ├─ auth (JWT/Session check)                               │
│  ├─ family-auth (Family membership check)                  │
│  └─ legacy-access (Legacy access check)                    │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│    Controller Layer (Business Logic)                        │
│  ├─ Phase1/AuthController (handle login/logout/register)   │
│  ├─ Phase2/LifeEventsController (get life events)         │
│  ├─ Phase3/FamilyController (manage family)                │
│  └─ Phase4/HeritageController (archive/letters)            │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│     Eloquent Model Layer (Database ORM)                     │
│  ├─ User model (queries users table)                       │
│  ├─ Milestone model (queries milestones table)            │
│  ├─ WellnessRecord model (queries wellness_records table) │
│  └─ Letter model (queries letters table)                   │
└────────────────────┬────────────────────────────────────────┘
                     │
                     ▼
┌─────────────────────────────────────────────────────────────┐
│  SQLite Database (database/database.sqlite)                │
│  ├─ users, families, roles, permissions (Phase 1)         │
│  ├─ milestones, photos, shares (Phase 2)                  │
│  ├─ growth_charts, wellness_records, family_tree (Phase 3)│
│  └─ archives, letters, exports (Phase 4)                  │
└─────────────────────────────────────────────────────────────┘
```

---

## 🎓 Educational Resources in Documentation

### In IMPLEMENTATION_GUIDE.md Section 4

1. **Why Phase-Based Organization?**
   - Strategic phases make dependencies visible
   - Alternative: Feature-type organization (rejected)
   - Consequence: Team can work phase-by-phase

2. **Why Semantic API Routes?**
   - Routes document business intent, not HTTP methods
   - Alternative: RESTful resource-centric (rejected)
   - Consequence: API is self-documenting

3. **Why Soft Deletes?**
   - Enable data recovery and audit trails
   - Alternative: Hard deletes with audit logs (rejected)
   - Consequence: Every table has `deleted_at` column

4. **Why Role-Based Access Control?**
   - Fine-grained permissions enable future compliance
   - Alternative: Simple hierarchy checks (rejected)
   - Consequence: Scalable permission system

5. **Why SQLite for Development?**
   - Zero setup; developers run locally without Docker
   - Alternative: PostgreSQL from start (rejected)
   - Consequence: Fast development; trivial migration to Postgres

6. **Why Phase-Specific Controllers?**
   - Enable team scaling and independent testing
   - Alternative: Single Controllers folder (rejected)
   - Consequence: Clear ownership and independent deployments

7. **Why Table Prefix Strategy?**
   - Sequential ordering is unambiguous globally
   - Alternative: Timestamp-based (Laravel default, rejected)
   - Consequence: Crystal clear migration order

---

## 🔗 Common Tasks

### Add a New Feature to Phase 2
1. Add new route to `routes/api.php` under Phase 2 section
2. Create controller in `app/Http/Controllers/Phase2/`
3. Create Vue component in `resources/js/components/phase-2-public/`
4. Update router in `resources/js/router/index.js`
5. Reference DATABASE.md for which tables to query

### Add New User Role
1. Add role to `roles` table via migration
2. Add permissions to `permissions` table
3. Create role_permission mappings
4. Update auth middleware to check role
5. Reference DATABASE.md for relationship structure

### Create Database Migration
1. Run: `php artisan make:migration create_[table]_table`
2. Follow naming in DATABASE.md for schema
3. Use `family_id` foreign key on all content tables
4. Add `deleted_at` for soft deletes
5. Add indexes on frequently queried columns

---

## 🐛 Debugging Tips

**"Which phase should this feature be in?"**
→ Check ROADMAP.md: section lists all features per phase

**"What data does this endpoint return?"**
→ Check API.md (in inline comments of routes/api.php) or COMPONENTS.md

**"How does authentication work?"**
→ Check ARCHITECTURE.md: "Authentication Flow" section

**"Why is this table structured this way?"**
→ Check DATABASE.md: explains design decisions

**"Which developer should handle this task?"**
→ Check ROADMAP.md: identifies phase owner

---

## 📞 Support Resources

- **Architecture Questions**: See ARCHITECTURE.md
- **Data Model Questions**: See DATABASE.md
- **Component Questions**: See COMPONENTS.md
- **Decision Rationale**: See IMPLEMENTATION_GUIDE.md
- **Project Overview**: See ROADMAP.md + COMPLETION_SUMMARY.md

---

## ✅ Status Check

- [x] Roadmap documented
- [x] Architecture designed
- [x] Database schema designed
- [x] API scaffolded
- [x] Router restructured
- [x] Documentation comprehensive
- [ ] Controllers implemented (NEXT)
- [ ] Migrations created (NEXT)
- [ ] Authentication working (NEXT)
- [ ] Phase 2 features (TBD)

---

Last Updated: January 2025
Documentation Version: 1.0
