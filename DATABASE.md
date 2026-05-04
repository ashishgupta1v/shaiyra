# Database Schema - Shaiyra's Heirloom Journal

## Overview

The database uses SQLite for development with plans to scale to MySQL/PostgreSQL. All tables include soft deletes and timestamps for audit trails.

---

## Core Tables (Phase 1)

### users
Stores family member accounts.

```sql
CREATE TABLE users (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NOT NULL,
    date_of_birth DATE NULL,
    phone VARCHAR(20) NULL,
    avatar_url VARCHAR(500) NULL,
    role_id BIGINT NOT NULL,
    status ENUM('active','inactive','archived') DEFAULT 'active',
    last_login_at TIMESTAMP NULL,
    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (role_id) REFERENCES roles(id),
    INDEX (email),
    INDEX (family_id),
    INDEX (deleted_at)
);
```

### families
Represents a family unit.

```sql
CREATE TABLE families (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    child_name VARCHAR(255) NOT NULL,
    child_dob DATE NOT NULL,
    child_gender ENUM('male','female','other') NULL,
    child_bio TEXT NULL,
    family_bio TEXT NULL,
    privacy_level ENUM('public','family','private') DEFAULT 'family',
    profile_image_url VARCHAR(500) NULL,
    hero_image_url VARCHAR(500) NULL,
    settings JSON NULL,
    active BOOLEAN DEFAULT TRUE,
    established_date DATE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    INDEX (child_name),
    INDEX (deleted_at)
);
```

### roles
User role definitions.

```sql
CREATE TABLE roles (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    description VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Seed data
INSERT INTO roles (name, description) VALUES
('admin', 'Full access - Primary account holder'),
('guardian', 'Can view and edit content'),
('extended_family', 'Can view private content only'),
('public_viewer', 'Can only view public content');
```

### permissions
Granular permission definitions.

```sql
CREATE TABLE permissions (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    description VARCHAR(500),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Seed data
INSERT INTO permissions (name, description) VALUES
('view-public', 'View public screens'),
('view-private', 'Access family vault'),
('edit-content', 'Add and modify content'),
('manage-family', 'Add/remove family members'),
('configure-settings', 'Change family settings'),
('export-data', 'Download archives'),
('manage-permissions', 'Assign roles and permissions');
```

### role_permission
Pivot table for role-permission relationships.

```sql
CREATE TABLE role_permission (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    role_id BIGINT NOT NULL,
    permission_id BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE,
    FOREIGN KEY (permission_id) REFERENCES permissions(id) ON DELETE CASCADE,
    UNIQUE KEY (role_id, permission_id)
);
```

---

## Phase 2 Tables: Public Narrative

### milestones
Records important life events.

```sql
CREATE TABLE milestones (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    content TEXT,
    category VARCHAR(100),
    milestone_date DATE NOT NULL,
    is_public BOOLEAN DEFAULT FALSE,
    featured BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    reactions_count INT DEFAULT 0,
    created_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (created_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (milestone_date),
    INDEX (category),
    INDEX (is_public),
    INDEX (deleted_at)
);
```

### photos
Stores photo metadata and references.

```sql
CREATE TABLE photos (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    milestone_id BIGINT NULL,
    filename VARCHAR(255) NOT NULL,
    original_filename VARCHAR(255),
    path VARCHAR(500) NOT NULL,
    thumbnail_path VARCHAR(500),
    caption TEXT,
    alt_text VARCHAR(500),
    file_size_bytes BIGINT,
    width INT,
    height INT,
    mime_type VARCHAR(50),
    is_public BOOLEAN DEFAULT FALSE,
    featured BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    uploaded_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (milestone_id) REFERENCES milestones(id),
    FOREIGN KEY (uploaded_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (milestone_id),
    INDEX (is_public),
    INDEX (created_at),
    INDEX (deleted_at)
);
```

### categories
Content categorization.

```sql
CREATE TABLE categories (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    name VARCHAR(100) NOT NULL,
    slug VARCHAR(100) NOT NULL,
    description VARCHAR(500),
    icon VARCHAR(100),
    color VARCHAR(7),
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    UNIQUE KEY (family_id, slug)
);
```

### favorites
Curated favorites collection.

```sql
CREATE TABLE favorites (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    item_id BIGINT NOT NULL,
    item_type VARCHAR(50) NOT NULL,
    title VARCHAR(255),
    description TEXT,
    featured BOOLEAN DEFAULT FALSE,
    display_order INT DEFAULT 0,
    added_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (added_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (item_id, item_type),
    INDEX (deleted_at)
);
```

### shares
Time-limited share links.

```sql
CREATE TABLE shares (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    token VARCHAR(100) NOT NULL UNIQUE,
    item_id BIGINT,
    item_type VARCHAR(50),
    share_type ENUM('public','link') DEFAULT 'link',
    expires_at TIMESTAMP NOT NULL,
    click_count INT DEFAULT 0,
    created_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (created_by) REFERENCES users(id),
    INDEX (token),
    INDEX (expires_at)
);
```

---

## Phase 3 Tables: Private Vault

### growth_milestones
Development milestone tracking.

```sql
CREATE TABLE growth_milestones (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    category VARCHAR(100),
    milestone_date DATE NOT NULL,
    metric_type VARCHAR(50),
    metric_value DECIMAL(10, 2),
    notes TEXT,
    photos_count INT DEFAULT 0,
    recorded_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (recorded_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (milestone_date),
    INDEX (category),
    INDEX (deleted_at)
);
```

### growth_charts
Physical development measurements.

```sql
CREATE TABLE growth_charts (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    measurement_date DATE NOT NULL,
    height_cm DECIMAL(5, 2),
    weight_kg DECIMAL(5, 2),
    head_circumference_cm DECIMAL(5, 2),
    percentile_height INT,
    percentile_weight INT,
    notes TEXT,
    recorded_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (recorded_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (measurement_date)
);
```

### wellness_records
Health and wellness data.

```sql
CREATE TABLE wellness_records (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    record_date DATE NOT NULL,
    type ENUM('health','nutrition','sleep','behavior','vaccination') NOT NULL,
    data JSON NOT NULL,
    notes TEXT,
    temperature DECIMAL(4, 1),
    recorded_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (recorded_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (record_date),
    INDEX (type)
);
```

### family_tree
Genealogical structure.

```sql
CREATE TABLE family_tree (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    person_id BIGINT NOT NULL,
    full_name VARCHAR(255) NOT NULL,
    date_of_birth DATE,
    date_of_death DATE NULL,
    gender ENUM('male','female','other'),
    relationship_to_child VARCHAR(100),
    generation_level INT,
    bio TEXT,
    photo_url VARCHAR(500),
    parent_id BIGINT NULL,
    display_order INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (parent_id) REFERENCES family_tree(id),
    INDEX (family_id),
    INDEX (relationship_to_child),
    INDEX (deleted_at)
);
```

### annotations
Private family notes.

```sql
CREATE TABLE annotations (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    item_id BIGINT NOT NULL,
    item_type VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    is_private BOOLEAN DEFAULT TRUE,
    created_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (created_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (item_id, item_type)
);
```

### notifications
Family alerts and updates.

```sql
CREATE TABLE notifications (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    user_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    type VARCHAR(50),
    related_item_id BIGINT NULL,
    related_item_type VARCHAR(50) NULL,
    is_read BOOLEAN DEFAULT FALSE,
    read_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (user_id) REFERENCES users(id),
    INDEX (family_id),
    INDEX (user_id),
    INDEX (is_read),
    INDEX (created_at)
);
```

---

## Phase 4 Tables: Legacy & Transition

### archives
Long-term content archival.

```sql
CREATE TABLE archives (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    archive_date DATE NOT NULL,
    version INT DEFAULT 1,
    status ENUM('draft','published','locked') DEFAULT 'draft',
    storage_path VARCHAR(500),
    file_size_bytes BIGINT,
    checksum VARCHAR(64),
    is_verified BOOLEAN DEFAULT FALSE,
    created_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (created_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (status),
    INDEX (deleted_at)
);
```

### letters
Letters and messages archive.

```sql
CREATE TABLE letters (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    from_name VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    letter_date DATE NOT NULL,
    scheduled_reveal_date DATE NULL,
    is_encrypted BOOLEAN DEFAULT FALSE,
    encryption_key_hash VARCHAR(64) NULL,
    is_read BOOLEAN DEFAULT FALSE,
    read_at TIMESTAMP NULL,
    created_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (created_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (scheduled_reveal_date),
    INDEX (deleted_at)
);
```

### professional_records
Career and education tracking.

```sql
CREATE TABLE professional_records (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    title VARCHAR(255) NOT NULL,
    category VARCHAR(100),
    record_date DATE,
    details JSON,
    achievements TEXT,
    certifications TEXT,
    documents_count INT DEFAULT 0,
    created_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (created_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (category)
);
```

### legacy_settings
Legacy planning configuration.

```sql
CREATE TABLE legacy_settings (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    executor_id BIGINT NULL,
    time_lock_date DATE NULL,
    access_plan JSON,
    succession_plan JSON,
    legal_documents_path VARCHAR(500) NULL,
    backup_enabled BOOLEAN DEFAULT TRUE,
    backup_frequency VARCHAR(50) DEFAULT 'monthly',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (executor_id) REFERENCES users(id)
);
```

### exports
Export history and tracking.

```sql
CREATE TABLE exports (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    family_id BIGINT NOT NULL,
    job_id VARCHAR(100) NOT NULL UNIQUE,
    format VARCHAR(50),
    status ENUM('pending','processing','completed','failed') DEFAULT 'pending',
    file_path VARCHAR(500) NULL,
    file_size_bytes BIGINT NULL,
    expires_at TIMESTAMP,
    error_message TEXT NULL,
    requested_by BIGINT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    completed_at TIMESTAMP NULL,
    
    FOREIGN KEY (family_id) REFERENCES families(id),
    FOREIGN KEY (requested_by) REFERENCES users(id),
    INDEX (family_id),
    INDEX (status),
    INDEX (expires_at)
);
```

---

## Indexes Strategy

### High-Frequency Queries
- `family_id` on all family-related tables
- `deleted_at` for soft delete filters
- `created_at` for chronological ordering
- `is_public` for access control filtering

### Date-Based Queries
- `milestone_date`, `record_date`, `letter_date` for range queries

### Foreign Keys
- All relationships indexed for JOIN performance

---

## Relationships Overview

```
families (1) ──┬── (Many) users
               ├── (Many) milestones
               ├── (Many) photos
               ├── (Many) growth_milestones
               ├── (Many) wellness_records
               ├── (Many) family_tree
               └── (Many) letters

users (1) ──── (Many) milestones (created_by)
            ├── (Many) photos (uploaded_by)
            ├── (Many) annotations (created_by)
            └── (Many) notifications

milestones (1) ──── (Many) photos
               ├── (Many) annotations
               └── (Many) shares
```

---

## Performance Considerations

1. **Partitioning**: Partition photos by year for large installations
2. **Archival**: Archive old records to separate tables after 5 years
3. **Cache**: Cache frequently accessed data (roles, permissions)
4. **Query Optimization**: Use eager loading to prevent N+1 queries

---

## Migration Notes

- Laravel migrations handle schema creation
- Seeders populate initial roles and permissions
- Backup strategy required before scaling
