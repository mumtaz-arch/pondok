# Backend Structure Document for "pondok"

This document outlines the backend setup for the "pondok" Laravel boilerplate. It covers how the system is built, how it stores data, how it exposes APIs, where it runs, and how it stays secure and healthy.

## 1. Backend Architecture

### Overall Design
The backend follows the standard Laravel MVC (Model–View–Controller) pattern:

- **Models** handle data and business logic (via Eloquent ORM).
- **Controllers** receive HTTP requests, talk to models, and return responses.
- **Views** (Blade templates) render HTML when needed, though much of the UI is handled via Livewire/Alpine components.

Laravel service providers and a well-structured `config/` directory bootstrap application services and third-party packages.

### Key Frameworks & Patterns
- **Laravel** (PHP 8.2+): Core framework offering routing, authentication, queues, caching, and storage abstractions.
- **Livewire + Alpine.js**: Build reactive, component-based UIs without writing much JavaScript.
- **Vite**: Fast asset bundler for compiling and hot-reloading CSS/JS during development.
- **Spatie Packages**: Well-maintained solutions for permissions and media management.

### Scalability, Maintainability & Performance
- **Service Abstractions**: Filesystems, queues, and mail drivers can swap between local, Redis, S3, etc., without code changes.
- **Queues**: Support for database, Redis, Beanstalkd, AWS SQS allows offloading long tasks (email, Excel exports, PDF generation).
- **Caching**: Laravel cache layer (e.g., Redis or file cache) speeds up repeated data lookups.
- **Modular Code**: Blade views, Livewire components, and Laravel’s folder conventions keep code organized and easy to extend.

## 2. Database Management

### Database Technology
- **Type**: Relational (SQL)
- **Default**: SQLite for quick local setup
- **Production Support**: MySQL, MariaDB, PostgreSQL, SQL Server

### Data Structure & Access
- **Migrations** define tables in `database/migrations/`.
- **Eloquent Models** expose relationships, scopes, and helper methods.
- **Factories & Seeders** allow rapid test and demo data generation.

### Data Management Practices
- **Environment Configuration**: `.env` holds database credentials—never committed to source control.
- **Backups**: Use built-in database dump tools or managed snapshots (e.g., RDS snapshots) in production.
- **Migrations & Rollbacks**: Version control schema changes and easily revert if needed.

## 3. Database Schema

Below is an overview of the core SQL tables. The actual `*.sql` or migration files live under `database/migrations/`.

### Core Tables (Human-Readable)
- **users**: Stores user credentials and profile info (name, email, password, timestamps).
- **password_resets**: Tracks password-reset tokens.
- **roles**: Lists all user roles (e.g., "admin", "editor").
- **permissions**: Defines fine-grained actions (e.g., "post.create").
- **model_has_roles**: Maps users to roles.
- **model_has_permissions**: Maps users directly to extra permissions.
- **role_has_permissions**: Maps roles to permissions.
- **failed_jobs**: Captures failed queue jobs.
- **jobs**: (If using database queue) holds pending jobs.

### Sample SQL Schema (PostgreSQL)
```sql
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) UNIQUE NOT NULL,
  email_verified_at TIMESTAMP NULL,
  password VARCHAR(255) NOT NULL,
  remember_token VARCHAR(100),
  created_at TIMESTAMP NOT NULL,
  updated_at TIMESTAMP NOT NULL
);

CREATE TABLE roles (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) UNIQUE NOT NULL,
  guard_name VARCHAR(50) NOT NULL,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);

CREATE TABLE permissions (
  id SERIAL PRIMARY KEY,
  name VARCHAR(255) UNIQUE NOT NULL,
  guard_name VARCHAR(50) NOT NULL,
  created_at TIMESTAMP,
  updated_at TIMESTAMP
);

-- Pivot tables for roles/permissions
CREATE TABLE model_has_roles (
  role_id INTEGER NOT NULL REFERENCES roles(id) ON DELETE CASCADE,
  model_type VARCHAR(255) NOT NULL,
  model_id INTEGER NOT NULL,
  PRIMARY KEY(role_id, model_id, model_type)
);

CREATE TABLE role_has_permissions (
  permission_id INTEGER NOT NULL REFERENCES permissions(id) ON DELETE CASCADE,
  role_id INTEGER NOT NULL REFERENCES roles(id) ON DELETE CASCADE,
  PRIMARY KEY(permission_id, role_id)
);

CREATE TABLE model_has_permissions (
  permission_id INTEGER NOT NULL REFERENCES permissions(id) ON DELETE CASCADE,
  model_type VARCHAR(255) NOT NULL,
  model_id INTEGER NOT NULL,
  PRIMARY KEY(permission_id, model_id, model_type)
);

CREATE TABLE password_resets (
  email VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  created_at TIMESTAMP NULL
);

CREATE TABLE jobs (
  id SERIAL PRIMARY KEY,
  queue VARCHAR(255) NOT NULL,
  payload TEXT NOT NULL,
  attempts INTEGER NOT NULL,
  reserved_at INTEGER,
  available_at INTEGER NOT NULL,
  created_at INTEGER NOT NULL
);

CREATE TABLE failed_jobs (
  id SERIAL PRIMARY KEY,
  uuid VARCHAR(255) NOT NULL,
  connection TEXT NOT NULL,
  queue TEXT NOT NULL,
  payload TEXT NOT NULL,
  exception TEXT NOT NULL,
  failed_at TIMESTAMP NOT NULL
);
```  

> Note: Additional tables (media library, notifications, cache) are created by their respective migrations when used.

## 4. API Design and Endpoints

This boilerplate supports both web routes (Blade/Livewire) and API routes. Below are typical RESTful endpoints you can build on:

### Authentication Endpoints
- **POST /api/login**: User logs in, returns auth token or session cookie
- **POST /api/register**: Create new user
- **POST /api/logout**: Invalidate session or token
- **POST /api/password/email**: Send reset link
- **POST /api/password/reset**: Reset password

### User & Role Management
- **GET /api/users**: List users (admin only)
- **GET /api/users/{id}**: Get user details
- **PUT /api/users/{id}**: Update user data
- **DELETE /api/users/{id}**: Remove user
- **GET /api/roles**: List roles
- **PUT /api/users/{id}/roles**: Assign roles to a user

### Data & Media
- **POST /api/export**: Trigger Excel export
- **POST /api/import**: Upload and import Excel
- **GET /api/media**: List media files
- **POST /api/media**: Upload new file

### Real-Time & Notifications
- **GET /api/notifications**: Fetch notifications
- **POST /api/notifications/read**: Mark as read

### Search
- **GET /api/search?q={query}**: Full-text search via Meilisearch

> All API routes live in `routes/api.php` and use Laravel’s middleware (auth:sanctum or auth:api) to secure them.

## 5. Hosting Solutions

### Development Environment
- **Laravel Sail (Docker)**: Local containers for PHP, MySQL/Postgres, Redis, MailHog, etc.
- **Vite Dev Server**: Hot-reloads frontend assets.

### Production Environment Options
- **Cloud VPS**: DigitalOcean, Linode, or AWS EC2, using Docker Compose or manual PHP/Nginx setup.
- **Managed Laravel Hosting**: Laravel Forge, Envoyer, or Vapor (serverless with AWS Lambda).
- **Platform-as-a-Service**: Heroku, AWS Elastic Beanstalk.

**Benefits**:
- **Scalability**: Easily add more instances behind a load balancer.
- **Reliability**: Managed databases and auto-scaling groups.
- **Cost-Effectiveness**: Pay-as-you-go or fixed VPS pricing.

## 6. Infrastructure Components

- **Load Balancer**: Distributes traffic across multiple app servers (e.g., AWS ELB).
- **Caching**: Redis or Memcached for session and query caching.
- **Queue System**: Redis or database driver with Laravel Horizon for monitoring (optional).
- **CDN**: CloudFront, Cloudflare, or BunnyCDN to serve assets and media quickly.
- **Object Storage**: Amazon S3 or DigitalOcean Spaces for user uploads and backups.
- **SSL/TLS**: Let’s Encrypt or ACM for HTTPS.

All these parts work together so that static assets load fast, background jobs don’t block users, and your application scales smoothly under heavy traffic.

## 7. Security Measures

- **Authentication & Authorization**: Laravel’s auth system with session cookies or API tokens (Sanctum), plus Spatie’s role/permission layer for RBAC.
- **Data Encryption**:
  - HTTPS for data in transit.
  - Laravel encryption for sensitive values (e.g., `APP_KEY`).
- **Input Validation & Sanitization**: Form Request classes to validate payloads and prevent injection attacks.
- **CSRF Protection**: Enabled by default for web routes.
- **Rate Limiting**: Throttle API endpoints to prevent abuse.
- **Environment Secrets**: Store credentials in `.env`, never commit them.
- **Regular Security Updates**: Keep Laravel and all packages up to date.

## 8. Monitoring and Maintenance

- **Logging**: Monolog via Laravel—logs to files, syslog, or external services (Papertrail, Loggly).
- **Error Tracking**: Integrate Sentry or Bugsnag.
- **Performance Monitoring**: Use New Relic, Blackfire, or Laravel Debugbar (in staging).
- **Health Checks**: Simple `/health` route to verify the app is running.
- **Backups & Migrations**:
  - Automated DB backups (cron or managed service).
  - Zero-downtime deployments with queued migrations.
- **Dependency Updates**: Regularly run `composer update` and `npm update`, test in staging.

## 9. Conclusion and Overall Backend Summary

The "pondok" boilerplate provides a solid, scalable, and maintainable foundation for building Laravel web applications. It leverages:

- A proven MVC architecture with Eloquent for data.
- Modern front-end integration (Livewire, Alpine.js, Vite).
- Robust third-party packages for permissions, media, search, real-time, and payments.
- Flexible hosting and infrastructure components that ensure reliability, security, and performance.

With this setup, developers can focus on implementing business features, knowing that the core backend structure is well organized, secure, and ready for growth.