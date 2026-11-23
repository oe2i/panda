# CI & Push Workflow

Panda splits quality checks between local development and GitHub Actions so `spartan` stays fast to iterate on while `main` and releases remain protected.

## Local Push to `spartan`

Use the custom Composer script to run the full local CI suite before pushing to `spartan`:

```bash
composer push:spartan
```

This runs:
1. `composer ci:check` (`php artisan config:clear`, `pint --test`, `rector --dry-run`, `phpstan analyse`, and `php artisan test`)
2. `git push origin spartan` (only if all checks pass)

## GitHub Actions CI

[`.github/workflows/ci.yml`](../.github/workflows/ci.yml) runs automatically on:
- **Tag / release pushes** (`v*`)
- **Pull requests** targeting `main`

It executes the critical checks (`composer types:check` and `php artisan test`) on PHP 8.5 and Node.js 22.
