# Security Guidelines for "pondok" Laravel Application

This document provides security best practices and architectural guidelines tailored for the **pondok** repository, a Laravel boilerplate featuring authentication, RBAC, file handling, real-time features, search, payments, and PDF generation.

## 1. Security by Design

- Integrate security reviews at every sprint: design, implementation, testing, and deployment.  
- Adopt threat modeling to identify risks in each new feature (e.g., file uploads, search indexing, payment flows).  
- Keep security simple: favor Laravel’s built-in protections over custom implementations when possible.

## 2. Authentication & Access Control

- **Password Policies**: Enforce minimum length (≥12 chars), complexity, and rotation. Use [bcrypt](https://laravel.com/docs/8.x/hashing) or Argon2 with unique salts.  
- **Spatie Permission**:  
  - Define clear roles and permissions in `config/permission.php`.  
  - Implement [Gates and Policies](https://laravel.com/docs/8.x/authorization#policies) for model-level checks.  
- **Session Management**:  
  - Configure `session.lifetime` and `session.expire_on_close=true` in `.env`.  
  - Regenerate session IDs on login (`Auth::loginUsingId`, `session()->regenerate()`).  
  - Secure cookies: set `SESSION_SECURE_COOKIE=true`, `SESSION_HTTP_ONLY=true`, `SESSION_SAME_SITE=strict`.
- **Multi-Factor Authentication (MFA)**: Plan for optional MFA via packages (e.g., [Laravel Fortify](https://github.com/laravel/fortify) or Google Authenticator).

## 3. Input Validation & Output Encoding

- **Form Request Validation**: Use Laravel Form Requests (`php artisan make:request`) to centralize and sanitize inputs (e.g., numeric, date, enum checks).  
- **Prevent SQL/NoSQL Injection**: Always use Eloquent or query builder parameter binding. Avoid raw queries when possible.  
- **File Uploads** (`spatie/laravel-medialibrary`):  
  - Validate MIME types, extensions, and file sizes in upload form requests.  
  - Store uploads outside `public/` or use signed URLs.  
  - Scan files with antivirus or third-party services before persisting.  
- **Excel Import/Export** (`maatwebsite/excel`):  
  - Use import DTOs to whitelist allowed columns.  
  - Reject unexpected cell formats to avoid CSV injection.  
- **Template & XSS Protection**:  
  - Always escape output in Blade (`{{ }}`) or use `@verbatim`.  
  - For Livewire/Alpine.js, avoid injecting raw HTML from user input; if needed, sanitize with `strip_tags` or a library like [HTMLPurifier].

## 4. Data Protection & Privacy

- **Transport Encryption**: Enforce HTTPS site-wide. Redirect HTTP to HTTPS at the webserver level and set `
  HSTS` headers (`Strict-Transport-Security: max-age=31536000; includeSubDomains`).  
- **Secrets Management**:  
  - Do **not** commit `.env` with real credentials.  
  - Store sensitive API keys (Midtrans, Meilisearch, Pusher) in a secrets manager (e.g., AWS Secrets Manager, Laravel Vault integration).  
- **Encryption at Rest**:  
  - Encrypt database backups and file storage (S3 with SSE).  
  - Use Laravel’s built-in [Encryptable Eloquent attributes](https://laravel.com/docs/8.x/encryption) for PII.  
- **Logging & Error Handling**:  
  - Do not log PII or raw stack traces in production logs.  
  - Customize `app/Exceptions/Handler.php` to render generic error pages.  
  - Mask sensitive fields (`password`, `credit_card_number`) in logs by configuring `dontFlash` in `app/Http/Middleware/TrimStrings.php`.

## 5. API & External Service Security

- **Rate Limiting & Throttling**: Use Laravel’s `RateLimiter` for critical endpoints (login, payment callbacks).  
- **CORS**: Configure `config/cors.php` to allow only trusted origins for API and real-time connections.  
- **Midtrans Payment Callbacks**:  
  - Validate payload signatures (HMAC) on incoming webhooks.  
  - Enforce HTTPS for callback URLs.  
- **Pusher & Meilisearch**:  
  - Rotate and scope API keys with minimal privileges.  
  - Use channel authorization on the server (e.g., `Broadcast::channel`) and validate user permissions.  
- **Excel & PDF Endpoints**:  
  - Protect generation routes behind authorization policies.  
  - Stream large files instead of loading into memory to avoid DoS.

## 6. Web Application Security Hygiene

- **CSRF Protection**: Enabled by default in Laravel; ensure state-changing routes use `@csrf`.  
- **Security Headers** (`app/Http/Middleware/SecureHeaders.php` or via server):  
  - Content-Security-Policy: restrict scripts/styles to self or vetted CDNs.  
  - X-Frame-Options: DENY or SAMEORIGIN.  
  - X-Content-Type-Options: nosniff.  
  - Referrer-Policy: no-referrer-when-downgrade.  
- **Cookie Security**: As noted in sessions, ensure `Secure`, `HttpOnly`, `SameSite=strict`.  
- **Subresource Integrity (SRI)**: When loading Alpine.js or external scripts, include integrity attributes to detect tampering.

## 7. Infrastructure & Configuration Management

- **Laravel Sail (Docker)**:  
  - Do not run containers as root.  
  - Bind internal ports to localhost, publish only necessary ports.  
- **Server Hardening**:  
  - Disable unused services in production images.  
  - Keep OS, PHP, Composer dependencies up to date with security patches.  
- **TLS Configuration**: Use only TLS ≥1.2, strong cipher suites; disable SSLv3/TLS1.0/1.1 in webserver config.
- **Environment Separation**: Maintain distinct `.env` and secrets per environment (dev, staging, prod). Use configuration caching (`php artisan config:cache`) in production.

## 8. Dependency Management

- **Composer & NPM Lockfiles**: Commit `composer.lock` and `package-lock.json` (or `yarn.lock`) to ensure deterministic builds.  
- **Vulnerability Scanning**: Integrate tools like `sensiolabs/security-checker` or `npm audit` in CI to detect known CVEs.  
- **Minimal Footprint**: Remove unused packages (e.g., if Excel or Pusher isn’t used) to reduce attack surface.  
- **Third-Party Reviews**: Vet each major package for maintenance activity, open issues, and security advisories before upgrading.

---

By following these guidelines, you will establish a robust, defense-in-depth security posture for the **pondok** Laravel boilerplate. Regularly review and update configurations as dependencies and threat landscapes evolve.