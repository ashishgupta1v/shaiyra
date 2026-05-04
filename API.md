# API Documentation - Shaiyra's Heirloom Journal

## API Overview

**Base URL**: `http://localhost:8000/api/v1`  
**API Version**: 1.0  
**Content-Type**: `application/json`  
**Authentication**: Bearer Token (JWT via Laravel Sanctum)

---

## Authentication

### Login
Authenticate a family member and receive an access token.

**Endpoint**: `POST /auth/login`

**Request**:
```json
{
  "email": "parent@example.com",
  "password": "secure_password"
}
```

**Response** (200 OK):
```json
{
  "success": true,
  "data": {
    "token": "1|NXZ9W...",
    "user": {
      "id": 1,
      "name": "Parent Name",
      "email": "parent@example.com",
      "role": "admin",
      "family_id": 1
    },
    "family": {
      "id": 1,
      "name": "Gupta Family",
      "child_name": "Shaiyra"
    }
  }
}
```

**Error** (401 Unauthorized):
```json
{
  "success": false,
  "error": {
    "code": "AUTH_001",
    "message": "Invalid credentials"
  }
}
```

---

### Register
Create a new family account.

**Endpoint**: `POST /auth/register`

**Request**:
```json
{
  "family_name": "Gupta Family",
  "child_name": "Shaiyra",
  "parent_name": "Rajesh Gupta",
  "email": "parent@example.com",
  "password": "secure_password",
  "password_confirmation": "secure_password"
}
```

**Response** (201 Created):
```json
{
  "success": true,
  "data": {
    "token": "1|NXZ9W...",
    "user": { ... },
    "message": "Family account created successfully"
  }
}
```

---

### Logout
Invalidate the current authentication token.

**Endpoint**: `POST /auth/logout`  
**Auth**: Required (Bearer Token)

**Response** (200 OK):
```json
{
  "success": true,
  "message": "Logged out successfully"
}
```

---

## PHASE 1: Foundation & Shell

### Family Setup

#### Get Family Info
Retrieve current family configuration.

**Endpoint**: `GET /family`  
**Auth**: Required

**Response**:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "name": "Gupta Family",
    "child_name": "Shaiyra",
    "established_date": "2023-10-15",
    "members_count": 4
  }
}
```

#### Configure Family
Set up family details during onboarding.

**Endpoint**: `POST /family/setup`  
**Auth**: Required

**Request**:
```json
{
  "family_name": "Gupta Family",
  "child_name": "Shaiyra",
  "child_dob": "2021-03-15",
  "privacy_level": "family",
  "notifications_enabled": true
}
```

#### Get Family Members
List all family members and their roles.

**Endpoint**: `GET /family/members`  
**Auth**: Required

**Response**:
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "name": "Rajesh Gupta",
      "email": "rajesh@example.com",
      "role": "admin",
      "status": "active",
      "joined_date": "2023-10-15"
    }
  ]
}
```

#### Add Family Member
Invite a new family member.

**Endpoint**: `POST /family/members`  
**Auth**: Required

**Request**:
```json
{
  "email": "grandmother@example.com",
  "name": "Meera Gupta",
  "role": "guardian"
}
```

---

## PHASE 2: Public Narrative

### Milestones

#### List Milestones
Get paginated milestone list (public or filtered by auth).

**Endpoint**: `GET /milestones`

**Query Parameters**:
- `page`: Page number (default: 1)
- `per_page`: Results per page (default: 15)
- `category`: Filter by category
- `from_date`: Start date filter
- `to_date`: End date filter

**Response**:
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "title": "First Smile",
      "description": "Shaiyra's first real smile",
      "date": "2021-04-10",
      "category": "development",
      "photos_count": 3,
      "is_public": true
    }
  ],
  "pagination": {
    "total": 45,
    "per_page": 15,
    "current_page": 1,
    "last_page": 3
  }
}
```

#### Create Milestone
Record a new milestone.

**Endpoint**: `POST /milestones`  
**Auth**: Required

**Request**:
```json
{
  "title": "First Steps",
  "description": "Shaiyra took her first steps today!",
  "date": "2023-10-15",
  "category": "development",
  "is_public": true,
  "tags": ["milestone", "development"]
}
```

---

### Photos

#### Upload Photo
Upload a new photo to a milestone.

**Endpoint**: `POST /photos`  
**Auth**: Required  
**Content-Type**: `multipart/form-data`

**Request**:
```
file: <binary image data>
milestone_id: 1
caption: "First steps photo"
is_public: true
```

**Response** (201 Created):
```json
{
  "success": true,
  "data": {
    "id": 1,
    "url": "/storage/photos/2023/10/photo-abc123.jpg",
    "thumbnail_url": "/storage/photos/2023/10/photo-abc123-thumb.jpg",
    "milestone_id": 1,
    "caption": "First steps photo"
  }
}
```

---

### Public Profile & Feed

#### Get Public Profile
Retrieve the public-facing profile.

**Endpoint**: `GET /public/profile`

**Response**:
```json
{
  "success": true,
  "data": {
    "child_name": "Shaiyra Gupta",
    "introduction": "Capturing favorites at every age",
    "current_age_months": 34,
    "profile_image": "https://...",
    "favorites_count": 12,
    "photos_count": 145,
    "last_updated": "2023-10-20"
  }
}
```

#### Get Feed
Retrieve chronological timeline of public milestones.

**Endpoint**: `GET /feed`

**Query Parameters**:
- `page`: Page number
- `category`: Filter category

**Response**:
```json
{
  "success": true,
  "data": [
    {
      "id": 1,
      "type": "milestone",
      "title": "First Smile",
      "date": "2021-04-10",
      "photos": [...],
      "reactions": { "likes": 5 }
    }
  ]
}
```

---

## PHASE 3: Private Vault

### Growth Tracker

#### Record Growth Milestone
Log a development milestone.

**Endpoint**: `POST /growth/milestone`  
**Auth**: Required

**Request**:
```json
{
  "title": "First Word",
  "description": "Said 'mama' clearly",
  "date": "2023-10-15",
  "category": "speech",
  "metrics": {
    "weight_kg": 14.5,
    "height_cm": 85
  }
}
```

**Response**:
```json
{
  "success": true,
  "data": {
    "id": 1,
    "recorded_by": "Rajesh Gupta",
    "created_at": "2023-10-20T10:30:00Z"
  }
}
```

#### Get Growth Charts
Retrieve visualization data for growth progress.

**Endpoint**: `GET /growth/charts`  
**Auth**: Required

**Response**:
```json
{
  "success": true,
  "data": {
    "height_chart": {
      "labels": ["Jan", "Feb", "Mar", ...],
      "datasets": [
        {
          "label": "Height (cm)",
          "data": [75, 77, 79, ...]
        }
      ]
    },
    "weight_chart": { ... },
    "milestones_by_category": { ... }
  }
}
```

---

### Wellness Tracking

#### Record Wellness Data
Log health and wellness information.

**Endpoint**: `POST /wellness/record`  
**Auth**: Required

**Request**:
```json
{
  "type": "health",
  "date": "2023-10-20",
  "data": {
    "temperature": 37.2,
    "notes": "Mild cold symptoms"
  }
}
```

---

### Family Tree

#### Get Family Tree
Retrieve genealogical data.

**Endpoint**: `GET /family-tree`  
**Auth**: Required

**Response**:
```json
{
  "success": true,
  "data": {
    "generations": [
      {
        "level": 0,
        "members": [
          {
            "id": 1,
            "name": "Vikram Gupta",
            "relationship": "paternal_grandfather"
          }
        ]
      }
    ]
  }
}
```

---

## PHASE 4: Legacy & Transition

### Letters Archive

#### Create Letter
Write and save a letter for Shaiyra.

**Endpoint**: `POST /legacy/letters`  
**Auth**: Required

**Request**:
```json
{
  "title": "Letter on Your 5th Birthday",
  "from": "Rajesh Gupta",
  "content": "My dearest Shaiyra...",
  "date": "2023-10-15",
  "scheduled_reveal_date": "2026-03-15",
  "is_encrypted": true
}
```

---

### Export Data

#### Generate Export
Create an archive export in desired format.

**Endpoint**: `POST /legacy/export`  
**Auth**: Required

**Request**:
```json
{
  "format": "pdf",
  "include": ["milestones", "photos", "letters", "growth_data"],
  "date_range": {
    "from": "2021-03-15",
    "to": "2023-10-20"
  }
}
```

**Response**:
```json
{
  "success": true,
  "data": {
    "job_id": "export-12345",
    "status": "processing",
    "estimated_time": 120,
    "message": "Export is being prepared..."
  }
}
```

#### Check Export Status
Monitor export generation progress.

**Endpoint**: `GET /legacy/export/status/{jobId}`  
**Auth**: Required

**Response**:
```json
{
  "success": true,
  "data": {
    "job_id": "export-12345",
    "status": "completed",
    "download_url": "/storage/exports/export-12345.pdf",
    "file_size_mb": 250,
    "expires_at": "2023-10-27"
  }
}
```

---

## Error Handling

### Standard Error Response
```json
{
  "success": false,
  "error": {
    "code": "ERR_001",
    "message": "Error description",
    "details": "Additional context"
  }
}
```

### Common Error Codes
- `AUTH_001`: Invalid credentials
- `AUTH_002`: Token expired
- `AUTH_003`: Unauthorized access
- `VALID_001`: Validation failed
- `NOTFOUND_001`: Resource not found
- `PERM_001`: Insufficient permissions
- `SERVER_001`: Internal server error

---

## Rate Limiting

- **Public endpoints**: 100 requests/hour per IP
- **Authenticated endpoints**: 1000 requests/hour per user
- **File uploads**: 10 files/hour per user

---

## Pagination

Query parameters:
- `page`: Current page (default: 1)
- `per_page`: Results per page (default: 15, max: 100)

Response includes:
```json
{
  "pagination": {
    "total": 150,
    "per_page": 15,
    "current_page": 1,
    "last_page": 10,
    "from": 1,
    "to": 15
  }
}
```

---

## Filtering & Searching

### Date Range Filter
```
GET /milestones?from_date=2023-01-01&to_date=2023-12-31
```

### Category Filter
```
GET /milestones?category=development
```

### Search
```
GET /feed/search?q=first%20steps
```

---

## Related Documentation

- [ROADMAP.md](./ROADMAP.md) - Development phases
- [ARCHITECTURE.md](./ARCHITECTURE.md) - System design
- [DATABASE.md](./DATABASE.md) - Database schema
