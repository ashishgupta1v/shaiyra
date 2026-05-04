# Architecture Overview - Shaiyra's Heirloom Journal

## System Architecture

```
┌─────────────────────────────────────────────────────────────┐
│                     CLIENT LAYER (Vue 3)                    │
├─────────────────────────────────────────────────────────────┤
│  Router  │  Views  │  Components  │  State Management       │
│ (Vue-Router) │ (Pages) │ (Reusable)  │  (Composition API)   │
└──────────────────────────┬──────────────────────────────────┘
                           │
                    (HTTP REST API)
                           │
┌──────────────────────────▼──────────────────────────────────┐
│                    API LAYER (Laravel)                      │
├─────────────────────────────────────────────────────────────┤
│  Routes  │  Controllers  │  Services  │  Middleware         │
│  (v1)    │   (Logic)     │  (Business)│  (Auth, CORS)       │
└──────────────────────────┬──────────────────────────────────┘
                           │
┌──────────────────────────▼──────────────────────────────────┐
│                   BUSINESS LAYER                            │
├─────────────────────────────────────────────────────────────┤
│  Models  │  Repositories  │  Services  │  Events            │
└──────────────────────────┬──────────────────────────────────┘
                           │
┌──────────────────────────▼──────────────────────────────────┐
│                   DATA LAYER                                │
├─────────────────────────────────────────────────────────────┤
│  SQLite Database  │  File Storage  │  Cache (Redis/Memcached)
└─────────────────────────────────────────────────────────────┘
```

## Directory Structure

```
shaiyra/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   └── AuthController.php
│   │   │   ├── Phase1_Foundation/
│   │   │   │   ├── FamilyController.php
│   │   │   │   └── SettingsController.php
│   │   │   ├── Phase2_Narrative/
│   │   │   │   ├── MilestoneController.php
│   │   │   │   ├── PhotoController.php
│   │   │   │   └── FeedController.php
│   │   │   ├── Phase3_PrivateVault/
│   │   │   │   ├── ArchiveController.php
│   │   │   │   ├── FamilyTreeController.php
│   │   │   │   ├── GrowthController.php
│   │   │   │   └── WellnessController.php
│   │   │   └── Phase4_Legacy/
│   │   │       ├── LettersController.php
│   │   │       ├── LegacyController.php
│   │   │       └── ExportController.php
│   │   ├── Middleware/
│   │   │   ├── VerifyFamilyAccess.php
│   │   │   └── LogActivity.php
│   │   └── Requests/
│   │       └── [Validation requests]
│   ├── Models/
│   │   ├── User.php
│   │   ├── Family.php
│   │   ├── Role.php
│   │   ├── Milestone.php
│   │   ├── Photo.php
│   │   ├── GrowthRecord.php
│   │   ├── WellnessRecord.php
│   │   └── [Other models]
│   ├── Services/
│   │   ├── AuthService.php
│   │   ├── MilestoneService.php
│   │   ├── PhotoService.php
│   │   └── [Business logic services]
│   └── Events/
│       ├── MilestoneCreated.php
│       └── [Other events]
│
├── routes/
│   ├── api.php (API routes)
│   ├── web.php (Web routes)
│   └── phase-routes/
│       ├── phase1-auth.php
│       ├── phase2-narrative.php
│       ├── phase3-vault.php
│       └── phase4-legacy.php
│
├── resources/
│   ├── js/
│   │   ├── app.js
│   │   ├── bootstrap.js
│   │   ├── router/
│   │   │   └── index.js
│   │   ├── views/
│   │   │   ├── Phase1_Foundation/
│   │   │   │   ├── SecureLogin.vue (Screen1)
│   │   │   │   ├── FamilyDashboard.vue (Screen2)
│   │   │   │   └── Settings.vue (Screen3)
│   │   │   ├── Phase2_Narrative/
│   │   │   │   ├── HomeProfile.vue (Screen4)
│   │   │   │   ├── LifeFeed.vue (Screen5)
│   │   │   │   ├── FavoritesShowcase.vue (Screen6)
│   │   │   │   └── MilestoneGallery.vue (Screen7)
│   │   │   ├── Phase3_PrivateVault/
│   │   │   │   ├── FamilyTree.vue (Screen8)
│   │   │   │   ├── FamilyPortal.vue (Screen9)
│   │   │   │   ├── GrowthTracker.vue (Screen10)
│   │   │   │   └── WellnessArchive.vue (Screen11)
│   │   │   ├── Phase4_Legacy/
│   │   │   │   ├── RefinedArchive.vue (Screen12)
│   │   │   │   ├── LettersArchive.vue (Screen13)
│   │   │   │   ├── ProfessionalHub.vue (Screen14)
│   │   │   │   └── LegacySettings.vue (Screen15)
│   │   │   └── Screen*.vue (Current screens)
│   │   └── components/
│   │       ├── Shared/
│   │       ├── Phase1/
│   │       ├── Phase2/
│   │       ├── Phase3/
│   │       └── Phase4/
│   └── views/
│       └── welcome.blade.php
│
├── database/
│   ├── migrations/
│   │   ├── 0001_users_table.php
│   │   ├── 0002_families_table.php
│   │   ├── phase2_milestones.php
│   │   ├── phase3_growth.php
│   │   └── phase4_legacy.php
│   ├── seeders/
│   │   └── DatabaseSeeder.php
│   └── database.sqlite
│
├── config/
│   ├── app.php
│   ├── auth.php
│   ├── database.php
│   └── [Standard Laravel config]
│
├── storage/
│   ├── app/
│   │   ├── photos/
│   │   ├── documents/
│   │   └── exports/
│   └── logs/
│
├── ROADMAP.md
├── ARCHITECTURE.md (this file)
├── API.md
└── [Other docs]
```

## Technology Stack

### Backend
- **Framework**: Laravel 13
- **Language**: PHP 8.3
- **Database**: SQLite (dev), can scale to MySQL/PostgreSQL
- **API**: RESTful with JSON responses
- **Authentication**: Laravel Sanctum (tokens)
- **File Storage**: Local disk or S3-compatible storage

### Frontend
- **Framework**: Vue 3 (Composition API)
- **Build Tool**: Vite
- **Router**: Vue Router 4
- **Styling**: Tailwind CSS 3 + Custom Design System
- **HTTP Client**: Axios
- **Icons**: Material Symbols

### Development Tools
- **Package Manager**: Composer (PHP), npm (Node)
- **Testing**: PHPUnit, Vitest
- **Linting**: PHP-CS-Fixer, ESLint
- **Version Control**: Git

---

## Authentication Flow

```
1. User Visits Login (Screen1)
   ↓
2. Enters Email + Password
   ↓
3. POST /api/v1/auth/login
   ↓
4. Laravel validates credentials
   ↓
5. Returns JWT/Bearer Token
   ↓
6. Frontend stores token in localStorage/sessionStorage
   ↓
7. All subsequent requests include Authorization header
   ↓
8. Middleware verifies token & user's family access
   ↓
9. Route guard checks user's role/permissions
   ↓
10. User gains access to appropriate screens
```

## Authorization & Roles

```
Roles:
┌─────────────────┬──────────────────┬─────────────┐
│ Role            │ Permissions      │ Access      │
├─────────────────┼──────────────────┼─────────────┤
│ Admin/Parent    │ All features     │ Full access │
│ Guardian        │ View + Edit      │ Private     │
│ Extended Family │ View only        │ Private     │
│ Public Visitor  │ None             │ Public      │
└─────────────────┴──────────────────┴─────────────┘

Permission Matrix:
- view-public: Access public screens
- view-private: Access family vault
- edit-content: Add/modify content
- manage-family: Add/remove members
- configure-settings: Change family settings
- export-data: Download archives
```

## Data Flow for Each Phase

### Phase 1: Login (From Screen1 to Screen2)
```
User Input (Screen1)
  ↓
POST /api/v1/auth/login {email, password}
  ↓
AuthController::login()
  ↓
User Model validation
  ↓
Token generation
  ↓
Return {token, user, family}
  ↓
Router guards check token
  ↓
Screen2 Dashboard loads with user context
```

### Phase 2: View Milestone (Screen5)
```
Screen5 mounts
  ↓
useEffect: fetch /api/v1/public/milestones
  ↓
MilestoneController::index()
  ↓
Query Milestone model with auth checks
  ↓
Return paginated milestones with photos
  ↓
Frontend caches in state
  ↓
Components render timeline
```

### Phase 3: Log Growth (Screen10)
```
User fills growth form (Screen10)
  ↓
POST /api/v1/private/growth/milestone {data}
  ↓
GrowthController::store()
  ↓
GrowthService::recordMilestone()
  ↓
Validate permissions & save to DB
  ↓
Fire MilestoneCreated event
  ↓
Event triggers family notifications
  ↓
Return success + updated chart data
```

### Phase 4: Export Archive (Screen15)
```
User selects export options (Screen15)
  ↓
POST /api/v1/legacy/export {format, dateRange}
  ↓
ExportController::generate()
  ↓
ExportService::buildArchive()
  ↓
Collect data from all tables
  ↓
Format to PDF/JSON/ZIP
  ↓
Store in storage/exports/
  ↓
Return download link
```

---

## State Management Strategy

### Global State (Composition API)
```javascript
// stores/auth.js
- currentUser (User object)
- isAuthenticated (Boolean)
- userRole (String)
- token (String)

// stores/family.js
- currentFamily (Family object)
- familyMembers (Array)
- familyPermissions (Object)

// stores/content.js
- cachedMilestones (Array)
- currentMilestone (Object)
- filters (Object)
```

### Local Component State
- Form inputs & validation
- UI state (modals, filters, etc.)
- Component-specific data

---

## Performance Optimization

### Frontend
- Code splitting by phase (lazy loading)
- Image lazy loading with intersection observer
- Caching strategies (localStorage, sessionStorage)
- Minification & gzip compression
- CDN for static assets

### Backend
- Database indexing on frequently queried columns
- Query optimization with eager loading
- API response pagination
- Cache layer (Redis) for expensive queries
- Rate limiting on public endpoints

---

## Security Implementation

### Phase 1: Authentication Security
- Bcrypt password hashing
- HTTPS/TLS enforcement
- CSRF tokens on forms
- Session timeout (15 min)
- Failed login attempt tracking

### Phase 2: Public Content Security
- Role-based view filtering
- Time-limited share tokens (24-72 hours)
- IP whitelisting option
- Public/private flag enforcement

### Phase 3: Private Vault Security
- Encryption at rest (sensitive data)
- Audit logging for all access
- Two-factor authentication option
- End-to-end encryption for letters

### Phase 4: Legacy Security
- Archive integrity checksums
- Multi-signature for critical changes
- Time-locked access (executor pattern)
- Backup encryption

---

## API Versioning

```
Current Version: v1

Endpoint Pattern: /api/v1/{resource}/{action}

Example:
GET    /api/v1/milestones - List
GET    /api/v1/milestones/{id} - Single
POST   /api/v1/milestones - Create
PUT    /api/v1/milestones/{id} - Update
DELETE /api/v1/milestones/{id} - Delete

Future Versioning:
/api/v2/ - Next major version
Maintains backward compatibility for 2+ versions
```

---

## Error Handling Strategy

### HTTP Status Codes
- 200: Success
- 201: Created
- 204: No content
- 400: Bad request
- 401: Unauthorized
- 403: Forbidden
- 404: Not found
- 422: Validation error
- 500: Server error

### Error Response Format
```json
{
  "success": false,
  "error": {
    "code": "AUTH_001",
    "message": "Invalid credentials",
    "details": "Email or password incorrect"
  }
}
```

---

## Testing Strategy

### Unit Tests
- Model validation
- Service business logic
- API response formats

### Integration Tests
- Full API endpoint testing
- Database transaction handling
- Authentication flows

### E2E Tests
- User journey across phases
- Critical feature workflows
- Permission enforcement

---

## Deployment Architecture

```
Development
  ↓
Testing
  ↓
Staging (Production-like)
  ↓
Production

Deployment Tools:
- Laravel Envoy or GitHub Actions for CI/CD
- Database migrations via artisan
- Environment-specific configs (.env)
```

---

## Monitoring & Logging

### Logging
- API request/response logging
- Authentication events
- Database query logging (dev)
- Error/exception tracking

### Monitoring
- Application uptime
- API response times
- Database performance
- User activity metrics

---

## Scalability Considerations

### Current Setup (Single Server)
- SQLite with one concurrent writer limit
- Local file storage

### Future Scaling
1. **Database**: Migrate to MySQL/PostgreSQL
2. **Storage**: Move to S3 or similar CDN
3. **Cache**: Redis cluster
4. **API**: Horizontal scaling with load balancer
5. **Frontend**: Static site generation + CDN
6. **Workers**: Job queue for background tasks

---

## Documentation References

- [ROADMAP.md](./ROADMAP.md) - Development phases and timeline
- [API.md](./API.md) - Complete API documentation
- [DATABASE.md](./DATABASE.md) - Database schema and relationships
- [COMPONENTS.md](./COMPONENTS.md) - Vue component guide
- [SECURITY.md](./SECURITY.md) - Security policies and procedures
