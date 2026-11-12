# Global Massage CMS — Laravel Production Deployment

A Laravel 13 + MySQL CMS based on the supplied `index.html` and `dashboard.html` designs. Supports editable landing-page sections, service catalogue and image uploads, order management, settings, and protected admin access.

## Requirements
- PHP 8.3+ (PHP 8.5.x supported) and required Laravel PHP extensions
- Composer 2
- MySQL 8+
- Web server (Nginx/Apache) with document root pointed to `public/`

## Local installation
1. Create a MySQL database and user with least-privilege access.
2. Copy `.env.example` to `.env`; configure `APP_URL`, MySQL credentials, and a unique random `ADMIN_PASSWORD` (at least 20 characters).
3. Install dependencies: `composer install --no-dev --optimize-autoloader` (for local development use `composer install`).
4. Generate the application key: `php artisan key:generate`.
5. Run schema and initial catalogue/content seed: `php artisan migrate --seed`.
6. Create the public storage symlink: `php artisan storage:link`.
7. Ensure `storage/` and `bootstrap/cache/` are writable by the PHP process.
8. Start local server: `php artisan serve`.

## URLs
- Public landing page: `/`
- Admin login: `/admin/login`
- Admin dashboard: `/admin`
- Content manager: `/admin/sections`
- Service catalogue: `/admin/services`

The initial admin email is set by `ADMIN_EMAIL`. The password is set by `ADMIN_PASSWORD` in `.env`; the seeder refuses the known sample password in production. Change the seeded password immediately after first deployment and keep `.env` outside source control.

## Production checklist
1. Set `APP_ENV=production`, `APP_DEBUG=false`, a valid HTTPS `APP_URL`, `SESSION_SECURE_COOKIE=true`, and `SESSION_ENCRYPT=true`.
2. Use a strong unique `APP_KEY` generated once; do not regenerate it on an existing installation.
3. Use dedicated non-root MySQL credentials; restrict database network access.
4. Point Nginx/Apache document root to `public/`; never expose project root, `.env`, `storage`, or `vendor` directly.
5. Enable HTTPS, renew certificates, and redirect HTTP to HTTPS at the web server/load balancer.
6. Run `php artisan migrate --force`, `php artisan storage:link`, `php artisan config:cache`, `php artisan route:cache`, and `php artisan view:cache` during deployment.
7. Use database-backed sessions/cache (migrations included), schedule database and uploaded-media backups, and test restoration.
8. Configure log rotation/centralized monitoring, PHP upload limits, server request limits, and a queue worker if asynchronous jobs are added.
9. Remove public/demo credentials and test login lockout, authorization, upload validation, order submission, and mobile layouts on staging before launch.
10. Keep PHP, Laravel, Composer dependencies, OS packages, and front-end assets updated. Tailwind/Font Awesome/Google Fonts currently load from CDNs; for strict supply-chain control, vendor and pin assets locally.

## Security implemented
- Admin-only account flag and explicit admin authorization middleware on all `/admin` routes.
- No public registration route; admin can change password after login with current-password verification and strong password policy (14+ characters, mixed case, numbers, symbols, uncompromised check).
- Login rate limiting (5 failed attempts per email/IP window), generic credential error, session ID regeneration on login, full session invalidation on logout.
- CSRF protection via Laravel web middleware; escaped Blade output; server-side validation for uploads and order prices.
- Uploads limited to JPEG/PNG/WEBP, image MIME validation, 5 MB maximum, stored on Laravel's public disk with random generated names.
- Security response headers; secure/HTTP-only/SameSite session cookies configured.

Admin password changes are available at `/admin/security`.

## CMS sections
Hero, Tentang Kami, Layanan & Tarif, Add-Ons, Paket Long Time, Kalkulator Booking, and Footer can be edited in **Konten Landing Page**. Editors can update copy, CTA labels/URLs, images, and visibility. Service photos are managed separately in **Kelola Layanan**.

## Important operational notes
This is a production-oriented application baseline, not a substitute for deployment-specific security review. Multi-factor authentication, password-reset email delivery, WAF/CDN policy, antivirus image scanning, and a formal audit log are not bundled; add these if required by your threat model. Verify PHP 8.5 compatibility of the hosting extensions and Composer dependency resolution in CI/staging before production deployment.
