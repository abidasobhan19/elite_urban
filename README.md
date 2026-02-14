# LandPro Realty (Laravel)

Single-page property website focused on land sales, with an admin panel to:
- add/edit/delete property listings (land, flat, house, commercial, other)
- upload property image and video
- configure Facebook Pixel ID
- capture checkout leads and view them date-wise

## Features

- Public homepage: `/`
  - single-page style land listing showcase
  - Facebook Pixel auto-injected when configured
- Checkout / lead form: `/checkout`
  - collects leads (name, phone, email, type, budget, message)
  - stores leads in database
- Admin panel: `/admin/login`
  - dashboard with quick stats
  - property CRUD + media uploads
  - date-filtered lead list and date-wise summary
  - Pixel settings page

## Default Admin Login

Seeded from env:
- `ADMIN_EMAIL` (default: `admin@example.com`)
- `ADMIN_PASSWORD` (default: `password123`)

## Local Setup

1. Install dependencies
```bash
composer install
```

2. Configure env
```bash
cp .env.example .env
php artisan key:generate
```

3. Create DB + run migrations + seed
```bash
php artisan migrate --seed
```

4. Enable public storage for uploads
```bash
php artisan storage:link
```

5. Run app
```bash
php artisan serve
```

## Vercel Deployment Notes

- `vercel.json` + `api/index.php` are included for Laravel on Vercel.
- Use an external database (MySQL/PostgreSQL) in production.
- Vercel filesystem is ephemeral; local disk uploads are not persistent.
  - For production media uploads, use S3-compatible storage and set:
    - `FILESYSTEM_DISK=s3`
    - AWS/S3 env vars in Vercel project settings.

## Main Routes

- `/` public land sales page
- `/checkout` lead capture page
- `/admin/login` admin auth
- `/admin/dashboard`
- `/admin/properties`
- `/admin/leads`
- `/admin/settings/pixel`
