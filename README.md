# GuardiApp

GuardiApp is a web-based platform built to streamline daycare management by simplifying attendance tracking, parent communication, child development monitoring, and payment administration — all in one place. With GuardiApp, staff can focus on caring and teaching while parents stay informed and at ease.

## Tech Stack

- **Backend**: Laravel 10 (PHP 8.2)
- **Frontend**: Inertia.js + Vue 3 (Composition API) + TypeScript
- **Styling**: Tailwind CSS + Headless UI
- **Authentication**: Laravel Breeze + Sanctum
- **Authorization**: spatie/laravel-permission
- **Database**: PostgreSQL 15
- **Cache**: Redis
- **Build Tool**: Vite
- **Containerization**: Docker + Docker Compose

## Features

- Multi-company and multi-branch architecture
- Role-based access control (owner, admin, branch_manager, teacher, nurse, parent, assistant)
- Kids management with medical information tracking
- Medicine administration tracking
- Polymorphic attendance system
- Soft deletes for data safety
- Server-side rendering (SSR) support

## Prerequisites

- Docker & Docker Compose
- Node.js 18+ & npm (for local development)
- Git

## Installation & Setup

### 1. Clone the repository

\`\`\`bash
git clone https://github.com/alancuevas18/GuardiApp.git
cd GuardiApp
\`\`\`

### 2. Copy environment file

\`\`\`bash
cp .env.example .env
\`\`\`

### 3. Start Docker containers

\`\`\`bash
docker-compose up --build -d
\`\`\`

This will start:
- **app**: PHP-FPM container
- **web**: Nginx web server (accessible at http://localhost:8000)
- **db**: PostgreSQL 15 database
- **redis**: Redis cache server

### 4. Install PHP dependencies

\`\`\`bash
docker-compose exec app composer install
\`\`\`

### 5. Generate application key

\`\`\`bash
docker-compose exec app php artisan key:generate
\`\`\`

### 6. Run database migrations and seeders

\`\`\`bash
docker-compose exec app php artisan migrate --seed
\`\`\`

This will create:
- All database tables
- Roles (owner, admin, branch_manager, teacher, nurse, parent, assistant)
- Demo company "Demo Daycare"
- Demo branch "Main Branch"
- Demo users:
  - Owner: owner@demodaycare.com (password: password)
  - Admin: admin@demodaycare.com (password: password)
  - Teacher: teacher@demodaycare.com (password: password)
- 3 demo kids

### 7. Install Node.js dependencies

\`\`\`bash
npm ci
\`\`\`

### 8. Build frontend assets

For development with hot reload:
\`\`\`bash
npm run dev
\`\`\`

For production build:
\`\`\`bash
npm run build
\`\`\`

### 9. Access the application

Open your browser and navigate to: **http://localhost:8000**

Login with any of the demo users above.

## Development

### Running tests

\`\`\`bash
docker-compose exec app php artisan test
\`\`\`

### Code linting

\`\`\`bash
./vendor/bin/pint
\`\`\`

### Stop containers

\`\`\`bash
docker-compose down
\`\`\`

### Reset database

\`\`\`bash
docker-compose exec app php artisan migrate:fresh --seed
\`\`\`

## Project Structure

\`\`\`
├── app/
│   ├── Http/
│   │   ├── Controllers/     # Resource controllers
│   │   ├── Middleware/      # CheckCompany, CheckBranch
│   │   └── Requests/        # Form request validation
│   ├── Models/              # Eloquent models
│   └── Policies/            # Authorization policies
├── database/
│   ├── migrations/          # Database migrations
│   └── seeders/             # Database seeders
├── docker/                  # Docker configuration files
├── resources/
│   ├── js/
│   │   ├── Components/      # Vue components
│   │   ├── Layouts/         # Layout components
│   │   ├── Pages/           # Inertia pages
│   │   └── app.ts           # Main JS entry point
│   └── views/               # Blade views
├── routes/
│   └── web.php              # Web routes
├── tests/                   # PHPUnit tests
├── docker-compose.yml       # Docker Compose configuration
└── Dockerfile               # Docker image definition
\`\`\`

## Database Schema

### Main Entities

- **companies**: Multi-tenant company structure
- **branches**: Company locations/branches
- **users**: System users with roles and permissions
- **kids**: Children enrolled in the daycare
- **medicine_administrations**: Medicine tracking
- **attendance**: Polymorphic attendance records

## Authorization

The application uses spatie/laravel-permission for role-based access control with the following roles:

- **owner**: Full system access
- **admin**: Company-level administration
- **branch_manager**: Branch-level management
- **teacher**: Teaching and kid management
- **nurse**: Medical administration
- **parent**: View own children
- **assistant**: Support staff access

## API Routes

All routes are protected by authentication middleware. Main resource routes:

- /companies - Company management
- /branches - Branch management
- /kids - Kids management
- /medicine-administrations - Medicine tracking
- /attendance - Attendance management

## Contributing

1. Create a feature branch
2. Make your changes
3. Write/update tests
4. Submit a pull request

## License

This project is licensed under the MIT License - see the LICENSE file for details.
