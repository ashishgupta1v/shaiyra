# Vue Component Architecture - Shaiyra's Heirloom Journal

## Overview

Vue 3 components are organized by development phase. Each screen represents a distinct user journey or state. All components follow the "Professional Elegance" design system using Tailwind CSS with container queries for responsive layouts.

---

## Phase 1: Foundation & Secure Login

### Screen1.vue - Secure Login Portal
**Path**: `resources/js/views/Screen1.vue`  
**Route**: `/phase-1/secure-login`  
**Purpose**: Primary authentication entry point for guardians and family members  
**Features**:
- Email/password login form
- "Remember me" functionality
- Forgot password link
- Sign-up for new families
- Password strength indicator
- Error message display
- Social login options (future)

**State Management**:
```javascript
data() {
  return {
    email: '',
    password: '',
    rememberMe: false,
    isLoading: false,
    error: null,
    showPassword: false
  }
}
```

**API Integration**:
- `POST /api/v1/auth/login` - Submit credentials
- Response includes JWT token (stored in localStorage/secure cookie)
- Automatic redirect to dashboard on success

**Styling Notes**:
- Background: Gradient from soft blue to cream
- Form: Centered card with shadow and rounded corners
- Input fields: Tailwind form-control with focus states
- Button: Primary CTA with hover effects

---

### Screen2.vue - Authenticated Dashboard
**Path**: `resources/js/views/Screen2.vue`  
**Route**: `/phase-1/dashboard`  
**Purpose**: Gateway to all features after authentication  
**Features**:
- Child's profile overview (name, age, photo)
- Quick stats (photos uploaded, milestones recorded)
- Recent activity feed
- Navigation cards to Phase 2/3/4 features
- Account settings access
- Family member list (with roles)

**State Management**:
```javascript
data() {
  return {
    user: null,
    childProfile: {},
    recentActivity: [],
    quickStats: {},
    isLoading: true
  }
}
```

**API Integration**:
- `GET /api/v1/dashboard` - Fetch dashboard data
- `GET /api/v1/child-profile` - Child's current profile
- `GET /api/v1/activity?limit=10` - Recent activity

**Styling Notes**:
- Layout: 2-column grid (left: profile, right: stats/activity)
- Cards: Floating white cards with subtle shadows
- Icons: Heroicons for navigation elements
- Responsive: Stack on mobile, side-by-side on desktop

---

## Phase 2: Public Narrative (Home, Life Feed, Milestones)

### Screen3.vue - Home Dashboard
**Path**: `resources/js/views/Screen3.vue`  
**Route**: `/phase-2/home`  
**Purpose**: Public-facing home showing child's journey highlights  
**Features**:
- Hero image banner with child's photo
- Quick bio/introduction
- Featured milestones carousel
- Latest photos gallery
- "Learn more" call-to-action

**API Integration**:
- `GET /api/v1/life-events?featured=true&limit=5` - Featured milestones
- `GET /api/v1/photos?featured=true&limit=12` - Featured gallery

**Styling Notes**:
- Full-width hero section with overlay text
- Masonry gallery layout using CSS Grid
- Carousel for featured milestones (Swiper.js)

---

### Screen4.vue - Life Feed (Timeline View)
**Path**: `resources/js/views/Screen4.vue`  
**Route**: `/phase-2/life-feed`  
**Purpose**: Chronological timeline of all life events and milestones  
**Features**:
- Vertical timeline with dates
- Filterable by category (birth, first words, achievements, etc.)
- Photos attached to timeline entries
- Expandable detail views
- Infinite scroll pagination
- Comments/reactions (future)

**State Management**:
```javascript
data() {
  return {
    events: [],
    selectedFilter: 'all',
    filters: ['birth', 'first_words', 'achievements', 'travels'],
    isLoading: false,
    hasMore: true,
    page: 1
  }
}
```

**API Integration**:
- `GET /api/v1/life-events?page=1&category=all` - Paginated events
- `GET /api/v1/life-events?category=first_words` - Filtered events

**Styling Notes**:
- Timeline: Left-aligned vertical line with dots for events
- Cards: Expandable cards with smooth animations
- Filters: Tab-style filter buttons

---

### Screen5.vue - Milestones Gallery
**Path**: `resources/js/views/Screen5.vue`  
**Route**: `/phase-2/milestones`  
**Purpose**: Visual gallery of important milestones with detailed views  
**Features**:
- Grid/Masonry layout toggle
- Category filtering
- Lightbox photo viewer
- Milestone details modal
- Print-friendly layout
- Share buttons

**API Integration**:
- `GET /api/v1/milestones?category=&sort=date` - All milestones
- `GET /api/v1/photos?milestone_id=123` - Photos for milestone

**Styling Notes**:
- Masonry grid: 3 columns on desktop, 2 on tablet, 1 on mobile
- Hover effects: Card elevation and zoom on image
- Modal: Centered overlay with smooth transitions

---

## Phase 2 Utility Screens

### Screen6.vue - Life Journey at Age 4
**Path**: `resources/js/views/Screen6.vue`  
**Route**: `/phase-2/journey-age-4`  
**Purpose**: Curated snapshot of child's life at age 4  
**Features**:
- Age-specific milestones
- Growth metrics (height, weight)
- Photo collage
- Favorite activities
- Friends/classmates (if applicable)

**API Integration**:
- `GET /api/v1/milestones?age=4` - Age-specific milestones
- `GET /api/v1/growth-records?age_at=4` - Growth data at age 4

---

### Screen7.vue - Educational Achievements
**Path**: `resources/js/views/Screen7.vue`  
**Route**: `/phase-2/achievements`  
**Purpose**: Track academic and personal accomplishments  
**Features**:
- Certifications and awards
- School reports/grades
- Skill demonstrations
- Competitions and recognition

**API Integration**:
- `GET /api/v1/achievements` - All achievements
- `GET /api/v1/professional-records` - Education records

---

## Phase 3: Private Vault (Family Portal, Growth Tracker, Wellness)

### Screen9.vue - Family Portal
**Path**: `resources/js/views/Screen9.vue`  
**Route**: `/phase-3/family-portal`  
**Purpose**: Private family collaboration hub (requires authentication)  
**Features**:
- Family member directory
- Add/remove family members
- Role and permission management
- Family-only content
- Private notifications

**State Management**:
```javascript
data() {
  return {
    familyMembers: [],
    currentUser: null,
    permissions: {},
    showInviteModal: false,
    inviteEmail: '',
    selectedRole: 'extended_family'
  }
}
```

**API Integration**:
- `GET /api/v1/family-portal/members` - Family member list
- `POST /api/v1/family-portal/invite` - Send invite
- `DELETE /api/v1/family-portal/members/:id` - Remove member
- `PUT /api/v1/family-portal/members/:id/role` - Update role

**Access Control**:
- Requires authentication (JWT token)
- Verifies family_id in token matches requested resource
- Admin/Guardian role required for member management

---

### Screen10.vue - Growth Tracker
**Path**: `resources/js/views/Screen10.vue`  
**Route**: `/phase-3/growth-tracker`  
**Purpose**: Medical and developmental milestone tracking  
**Features**:
- Height/weight/head circumference measurements
- Percentile charts using growth standards (WHO/CDC)
- Developmental milestones (motor, language, cognitive)
- Vaccination records
- Doctor visit notes
- Growth velocity analysis

**State Management**:
```javascript
data() {
  return {
    measurements: [],
    selectedMetric: 'height',
    chartsData: {},
    isLoading: false
  }
}
```

**API Integration**:
- `GET /api/v1/growth-charts` - Measurement history
- `POST /api/v1/growth-charts` - Add new measurement
- `GET /api/v1/growth-milestones` - Development milestones

**Chart Library**: Chart.js for growth curves  
**Styling Notes**:
- Line chart: Percentile curves with data points
- Color coding: Green (healthy range), yellow (monitor), red (concern)

---

### Screen11.vue - Wellness Archive
**Path**: `resources/js/views/Screen11.vue`  
**Route**: `/phase-3/wellness-archive`  
**Purpose**: Health records and wellness history  
**Features**:
- Illness/injury logs
- Medication history
- Allergy information
- Nutrition tracking
- Sleep patterns
- Mental health notes

**State Management**:
```javascript
data() {
  return {
    wellnessRecords: [],
    recordType: 'health',
    recordTypes: ['health', 'nutrition', 'sleep', 'behavior', 'vaccination'],
    isLoading: false
  }
}
```

**API Integration**:
- `GET /api/v1/wellness-records?type=health` - Wellness history by type
- `POST /api/v1/wellness-records` - Add record
- `PUT /api/v1/wellness-records/:id` - Update record
- `DELETE /api/v1/wellness-records/:id` - Delete record

**Privacy Notes**:
- No export without permission
- Encrypted at rest in database
- Audit trail for all access

---

### Screen8.vue - Family Tree (Phase 3 Private View)
**Path**: `resources/js/views/Screen8.vue`  
**Route**: `/phase-3/family-tree-private`  
**Purpose**: Private genealogical documentation (Phase 3 preview)  
**Features**:
- Interactive family tree diagram
- Add/edit family members
- Multiple generations
- Relationship definitions
- Private notes and bios

**API Integration**:
- `GET /api/v1/family-tree` - Full family tree
- `POST /api/v1/family-tree/member` - Add member
- `PUT /api/v1/family-tree/member/:id` - Update member

---

## Phase 4: Legacy & Heritage Archive

### Screen12.vue - Letters Archive
**Path**: `resources/js/views/Screen12.vue`  
**Route**: `/phase-4/letters-archive`  
**Purpose**: Curated archive of letters and messages with time-lock functionality  
**Features**:
- List of all letters
- Letter details modal with full text
- Scheduled reveal dates (time-locked letters)
- Encryption toggle
- Print-friendly formatting
- Search by author or date

**State Management**:
```javascript
data() {
  return {
    letters: [],
    selectedLetter: null,
    filterStatus: 'all',
    searchQuery: '',
    isLoading: false
  }
}
```

**API Integration**:
- `GET /api/v1/heritage/letters` - All letters
- `GET /api/v1/heritage/letters/:id` - Letter detail
- `POST /api/v1/heritage/letters` - Add letter (admin only)
- `GET /api/v1/heritage/letters/:id/verify-access` - Check time-lock status

**Encryption Notes**:
- Letters stored encrypted in database
- Decryption key only available after reveal date
- Server-side validation of current date vs reveal date

---

### Screen13.vue - Public Family Tree
**Path**: `resources/js/views/Screen13.vue`  
**Route**: `/phase-4/family-tree`  
**Purpose**: Public genealogical display with generational layout  
**Features**:
- Interactive tree diagram (d3.js or similar)
- Multiple generations display
- Photo galleries per family member
- Historical information
- Relationship descriptions

**API Integration**:
- `GET /api/v1/heritage/family-tree` - Public tree data

**Visualization Library**: D3.js or Vis.js for tree layout

---

### Screen14.vue - Future Forward Hub
**Path**: `resources/js/views/Screen14.vue`  
**Route**: `/phase-4/future-forward`  
**Purpose**: Legacy planning and succession strategy  
**Features**:
- Legacy executor information
- Access succession plan
- Digital inheritance instructions
- Important document references
- Timeline for future access

**API Integration**:
- `GET /api/v1/heritage/legacy-settings` - Legacy plan overview
- `GET /api/v1/heritage/legal-documents` - Document list

---

### Screen15.vue - Archive & Export
**Path**: `resources/js/views/Screen15.vue`  
**Route**: `/phase-4/archive-export`  
**Purpose**: Data export and backup functionality  
**Features**:
- Download options (PDF, JSON, ZIP)
- Select what to include
- Scheduled automatic backups
- Export history
- Archive to cold storage

**State Management**:
```javascript
data() {
  return {
    exportFormat: 'pdf',
    selectedItems: [],
    isExporting: false,
    exportHistory: [],
    backupSchedule: 'monthly'
  }
}
```

**API Integration**:
- `POST /api/v1/heritage/export` - Create export job
- `GET /api/v1/heritage/exports` - Export history
- `GET /api/v1/heritage/export/:jobId/status` - Export status polling

---

## Shared Component Library

### Layout Components

**AppLayout.vue** - Main application wrapper
- Navigation sidebar/header
- Footer with links
- Toast notifications container
- Modal container

**AuthLayout.vue** - Login/registration pages
- Centered form layout
- Minimal navigation

**PublicLayout.vue** - Public pages
- Simplified header
- Social sharing buttons
- Footer with links

### Form Components

**FormInput.vue** - Text input with validation
**FormSelect.vue** - Dropdown selection
**FormDate.vue** - Date picker
**FormFile.vue** - File upload with preview
**FormCheckbox.vue** - Checkbox group

### Display Components

**Timeline.vue** - Vertical event timeline
**GalleryGrid.vue** - Masonry photo gallery
**MilestoneCard.vue** - Individual milestone card
**FamilyMemberCard.vue** - Family member profile card
**ActivityFeed.vue** - Recent activity list

### Utility Components

**LoadingSpinner.vue** - Loading indicator
**EmptyState.vue** - No data message
**Modal.vue** - Generic modal wrapper
**Tooltip.vue** - Hover tooltips
**Breadcrumb.vue** - Navigation breadcrumbs

---

## Component Composition Pattern

All components follow this structure:

```vue
<template>
  <!-- Main content area -->
  <div class="container mx-auto px-4 py-8">
    <!-- Component content -->
  </div>
</template>

<script>
export default {
  name: 'ScreenName',
  components: {
    // Sub-components
  },
  props: {},
  data() {
    return {
      // Reactive state
    }
  },
  computed: {
    // Computed properties
  },
  methods: {
    // Component methods
  },
  mounted() {
    // Initialization
  }
}
</script>

<style scoped>
/* Component-specific styles */
</style>
```

---

## Styling Guidelines

### Tailwind Classes Used

**Colors** (Professional Elegance Palette):
- Primary: `blue-600` (trust, reliability)
- Secondary: `indigo-500` (sophistication)
- Accent: `amber-500` (warmth, archives)
- Neutral: `slate-100` to `slate-800` (text and backgrounds)
- Success: `green-500` (confirmations)
- Error: `red-500` (alerts)

**Typography**:
- Headings: `font-bold text-2xl md:text-3xl`
- Subheadings: `font-semibold text-lg`
- Body: `text-base text-slate-700`
- Small text: `text-sm text-slate-600`

**Spacing**:
- Consistent 8px grid (4, 8, 12, 16, 24, 32, 48px)
- Container padding: `px-4 py-8` (mobile), `px-8 py-12` (desktop)

**Container Queries**:
```css
@container (min-width: 400px) {
  /* Tablet layouts */
}
@container (min-width: 768px) {
  /* Desktop layouts */
}
```

---

## Props Documentation

All props follow these conventions:

```javascript
props: {
  // Required props
  itemId: {
    type: Number,
    required: true
  },
  // Optional props with defaults
  isEditable: {
    type: Boolean,
    default: false
  },
  // Array/Object props
  items: {
    type: Array,
    default: () => []
  }
}
```

---

## Event Emission

Components emit events for parent-child communication:

```javascript
// Child component
this.$emit('update:itemId', newValue);
this.$emit('delete', id);
this.$emit('save', {data: updatedData});

// Parent template
<ChildComponent 
  :item-id="id"
  @update:itemId="handleUpdate"
  @delete="handleDelete"
  @save="handleSave"
/>
```

---

## Future Improvements

1. **Component Documentation**: Storybook for UI component catalog
2. **Accessibility**: ARIA labels and keyboard navigation
3. **Testing**: Unit tests for all components (Vitest)
4. **Performance**: Lazy loading non-critical components
5. **i18n**: Multi-language support
