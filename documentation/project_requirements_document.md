# Project Requirements Document for "Pondok" Boilerplate

## 1. Project Overview

“Pondok” is a starter Laravel application designed to give developers a jump-start when building web applications. It comes prewired with essential features—authentication, role-based access control, data import/export, rich UI components, real-time notifications, search, media handling, payment integration, and PDF generation. The goal is to eliminate repetitive setup tasks so teams can focus directly on implementing business logic.

We’re building this boilerplate to ensure consistency, speed up development cycles, and leverage best-of-breed packages in the Laravel ecosystem. Success will be measured by how quickly new projects get off the ground, how few setup bugs occur, and how easily additional features (search, payments, file uploads) slot in without re-architecting the foundation.

## 2. In-Scope vs. Out-of-Scope

### In-Scope (First Version)
- Full Laravel 10 setup with Docker (Laravel Sail) and Vite for asset builds
- User authentication (login, registration, password reset)
- Role-Based Access Control (RBAC) via Spatie Permission
- Data import/export via Maatwebsite Excel
- Dynamic interactive components using Livewire & Alpine.js
- Real-time event broadcasting via Pusher/Pusher PHP Server
- Full-text search integration with Meilisearch
- Media management with Spatie MediaLibrary
- Payment processing using Midtrans PHP SDK
- Server-side PDF generation using Barryvdh Laravel Snappy
- Standard folder structure, environment configuration, and sample `.env.example`

### Out-of-Scope (Later Phases)
- Custom business-specific features or domain models
- Mobile or native app wrappers
- Multi-tenant architecture
- Advanced CI/CD pipelines (beyond basic GitHub Actions examples)
- Multi-language localization and translation management
- A dedicated REST or GraphQL API (beyond standard web routes)

## 3. User Flow

A developer grabs the repo, runs `./vendor/bin/sail up -d` to launch Docker containers, copies `.env.example` to `.env`, and runs `php artisan migrate --seed`. They log into the `/login` page, register a new admin user, and assign roles via the UI. From the dashboard, they can navigate: _Users_ for RBAC, _Data Import_ for Excel uploads, and _Media Library_ for file management.

An end user visits the landing page (`/`), signs up, and sees a simple dashboard. They search for items via the Meilisearch bar, upload a profile image, and trigger notifications (e.g., a welcome message via Pusher). If they make a purchase, the Midtrans payment flow opens in a new window, and upon completion, a PDF invoice is generated and emailed as a downloadable link.

## 4. Core Features

- **Authentication & Authorization**: Register, login, reset password; manage roles & permissions with Spatie
- **Excel Import/Export**: Import large datasets; export reports via Maatwebsite Excel
- **Dynamic UI**: Build reactive components and modals with Livewire & Alpine.js
- **Real-Time Notifications**: Broadcast events (e.g., chat, alerts) via Pusher
- **Search**: Full-text, typo-tolerant searching using Meilisearch
- **Media Library**: Upload, convert, and attach files/images to models using Spatie
- **Payment Gateway**: Secure transaction flows with Midtrans SDK
- **PDF Generation**: Render Blade views into PDF documents using Snappy
- **Dockerized Setup**: One-command environment boot via Laravel Sail

## 5. Tech Stack & Tools

- **Backend**: Laravel 10 (PHP 8.2+), Eloquent ORM, MVC pattern
- **Frontend**: Tailwind CSS, Alpine.js, Livewire, Vite
- **Database**: SQLite (default), MySQL/PostgreSQL/MariaDB support
- **Realtime**: Pusher PHP Server package
- **Search**: Meilisearch PHP client
- **Payment**: Midtrans PHP SDK
- **Media**: Spatie Laravel MediaLibrary
- **Excel**: Maatwebsite Excel
- **PDF**: Barryvdh Laravel Snappy (wkhtmltopdf)
- **Containerization**: Laravel Sail (Docker)

## 6. Non-Functional Requirements

- **Performance**: API responses under 200ms; full page loads under 2s on average
- **Scalability**: Design to offload heavy tasks (PDF, Excel import) to queues
- **Security**: OWASP Top 10 compliance; hashed passwords (bcrypt), CSRF/XSS protection
- **Reliability**: ≥99.5% uptime for core services; retry logic for queue jobs
- **Usability**: Clean, responsive UI; accessibility standards (WCAG 2.1 AA)
- **Maintainability**: Follow PSR-12 coding standard; use PHPDoc and type hints

## 7. Constraints & Assumptions

- Must run in Docker via Laravel Sail; developers need Docker installed
- External services require API keys (Pusher, Midtrans, Meilisearch)
- wkhtmltopdf binary must be available in the container for PDF generation
- Assumes a modern browser for Alpine.js and Livewire functionality
- Development and production environments mirror `.env.example` structure

## 8. Known Issues & Potential Pitfalls

- **Excel Imports**: Large files may exhaust memory—mitigate by chunked imports and queue jobs
- **PDF Rendering**: wkhtmltopdf can consume high memory; limit page size or pre-render HTML
- **Realtime Limits**: Pusher free plan rate limits—consider Redis+Laravel WebSockets for scale
- **Search Indexing**: Meilisearch needs background re-indexing when data changes—use observers or queue listeners
- **Environment Drift**: Differences between Sail and production Docker may surface—keep images in sync
- **Payment Callbacks**: Ensure idempotency in transaction handling to avoid double charges


---
This PRD provides a crystal-clear foundation for the AI to generate subsequent technical documents—Tech Stack details, Frontend Guidelines, Backend Structure, App Flow, and more—without ambiguity.