# Panda

**Panda** is an opinionated Laravel starter kit by **oe2i**, pre-configured with Laravel 13, PHP 8.5, Livewire 4, Flux UI, Tailwind CSS v4, strict static analysis, automated refactoring, and a comprehensive Spatie & Pest ecosystem.

---

## Requirements

- **PHP** `^8.5`
- **Composer** `^2.x`
- **Node.js & npm** (for Vite+, Tailwind CSS v4, and Playwright)
- **Database**: SQLite (default), MySQL, or PostgreSQL
- **Chromium / Playwright** (optional, required for Pest Browser tests, Browsershot, and Spatie Laravel PDF)

---

## Quick Setup (via Composer)

### Option 1: Create a New Project via Composer

```bash
composer create-project oe2i/panda panda
cd panda
```

When creating a project via Composer, `post-root-package-install` and `post-create-project-cmd` automatically:
1. Copy `.env.example` to `.env` (if `.env` does not exist)
2. Run `php artisan key:generate --ansi`
3. Create `database/database.sqlite` (if missing)
4. Run `php artisan migrate --graceful --ansi`

Then install frontend dependencies and build assets:

```bash
npm install
npm run build
```

### Option 2: Clone / Existing Repository Setup

If you cloned the repository directly (`git clone https://github.com/oe2i/panda.git my-app`), run the built-in Composer setup script:

```bash
composer setup
```

This runs:
1. `composer install`
2. Copies `.env.example` to `.env` (if missing)
3. `php artisan key:generate`
4. `php artisan migrate --force`
5. `npm install`
6. `npm run build`

---

## Initialization

After setting up a new project, see [docs/initialization.md](docs/initialization.md) for post-setup initialization steps (publishing Laravel stubs, mail views, and notification templates).

---

## Development

Start the development environment (server, queue/logs, and Vite+ dev server):

```bash
composer dev
```

Or run the frontend dev server / production build individually:

```bash
npm run dev     # Starts Vite+ dev server (vp dev)
npm run build   # Builds production assets (vp build)
```

---

## Included Packages & What They Do

### Core Framework, UI & Routing

| Package | Purpose |
| :--- | :--- |
| **`laravel/framework`** (`^13.17`) | Core Laravel 13 application framework. |
| **`livewire/livewire`** (`^4.1`) | Full-stack reactive UI framework for Laravel without writing custom JavaScript. |
| **`livewire/flux`** (`^2.13.1`) | Official UI component library for Livewire (buttons, modals, forms, tables, etc.). |
| **`livewire/blaze`** (`^1.0`) | High-performance Blade component compiler/optimizer for Livewire & Blade. |
| **`laravel/folio`** (`^1.3`) | Page-based file routing (`resources/views/pages`). |
| **`laravel/prompts`** (`^0.3.27`) | Rich interactive CLI prompts for Artisan commands. |
| **`laravel/tinker`** (`^3.0`) | Interactive REPL for debugging and inspecting the application. |
| **`nunomaduro/essentials`** (`^1.2.0`) | Opinionated Laravel defaults (strict models, immutable dates, auto-eager loading, etc.). |
| **`laravel/chisel`** (`^0.1.0`) | Laravel CLI/scaffolding utility. |
| **`laravel/vet`** (`^0.2.1`) | Supply-chain & dependency integrity verification (`vet.json`). |

### Authentication, Passkeys & Security

| Package | Purpose |
| :--- | :--- |
| **`laravel/fortify`** (`^1.37.2`) | Headless authentication backend (login, registration, 2FA, password reset, email verification). |
| **`laravel/sanctum`** (`^4.0`) | Lightweight API token and SPA authentication. |
| **`@laravel/passkeys`** (`^0.2.0`) | WebAuthn / Passkey authentication support (backed by the included `passkeys` migration). |
| **`spatie/laravel-permission`** (`^8.5`) | Role and permission management (`HasRoles`, Gate integration, `config/permission.php`). |
| **`spatie/laravel-csp`** (`^3.31`) | Content Security Policy (CSP) header management (`config/csp.php`). |

### Data, Queries, Logging & Utilities

| Package | Purpose |
| :--- | :--- |
| **`spatie/laravel-data`** (`^4.23`) | Typed DTOs, request validation, and data transformation (`config/data.php`). |
| **`spatie/laravel-query-builder`** (`^7.3`) | Build Eloquent queries from API request filters, sorts, and includes (`config/query-builder.php`). |
| **`spatie/laravel-activitylog`** (`^5.1`) | Log user and model activity to the database (`config/activitylog.php`). |
| **`spatie/laravel-sluggable`** (`^6.0`) | Automatic URL-friendly slug generation for Eloquent models (`config/sluggable.php`). |
| **`spatie/laravel-translatable`** (`^6.15`) | Store and retrieve JSON-based multi-language model attributes. |
| **`spatie/laravel-backup`** (`^10.5`) | Automated database and file backups (`config/backup.php`). |
| **`spatie/laravel-pdf`** (`^2.14`) | Generate PDFs from Blade views using Chromium/Browsershot. |
| **`spatie/browsershot`** (`^5.5`) | Headless Chrome/Chromium wrapper for screenshots and PDFs. |
| **`spatie/simple-excel`** (`^3.11`) | Fast, low-memory Excel (`.xlsx`) and CSV import/export. |

### Developer Experience, Testing & Code Quality (`require-dev`)

| Package | Purpose |
| :--- | :--- |
| **`pestphp/pest`** (`^5.3`) | Primary testing framework, bundled with `arch`, `browser`, `faker`, `laravel`, `livewire`, `profanity`, `stressless`, and `type-coverage` plugins. |
| **`larastan/larastan`** (`^3.15`) | PHPStan static analysis for Laravel, configured at `level: max` in `phpstan.neon`. |
| **`laravel/pint`** (`^1.27`) | Opinionated PHP code formatter (`pint.json` using the `laravel` preset). |
| **`rector/rector`** (`^2.8`) & **`driftingly/rector-laravel`** (`^2.7`) | Automated PHP & Laravel code upgrades and refactoring (`rector.php`). |
| **`peckphp/peck`** (`^0.3.0`) | Spell-checking and typo detection for code, comments, and filenames (`peck.json`). |
| **`laravel/boost`** (`^2.2`) | AI coding assistant MCP server, guidelines, and skills (`boost.json`). |
| **`fruitcake/laravel-debugbar`** (`^4.4`) | In-browser debugging toolbar for queries, routes, views, and performance. |
| **`laravel/pail`** (`^1.2.5`) | Real-time CLI log tailing (`php artisan pail`). |
| **`laravel/pao`** (`^1.0.6`) | Laravel developer tooling utility. |
| **`laravel/sail`** (`^1.53`) | Docker-based local development environment. |
| **`roave/security-advisories`** | Prevents installing dependencies with known security vulnerabilities. |

---

## Secondary & Maintenance Commands

### Code Quality, Linting & Testing

Run the full CI check suite (config clear, Pint + Rector dry-run, PHPStan, and Pest tests):

```bash
composer test
# or
composer ci:check
```

Individual quality checks and fixers:

```bash
composer lint               # Auto-fix code with Rector and Pint
composer lint:check         # Check formatting & refactoring without modifying files
composer types:check        # Run PHPStan (level: max)
composer test:type-coverage # Verify 100% type coverage with Pest
vendor/bin/peck             # Run spell-check / typo detection
vendor/bin/pint --dirty     # Format only modified PHP files
```

### Running Specific Tests

```bash
php artisan test --compact
php artisan test --compact --filter=YourTestName
vendor/bin/pest tests/Feature/ExampleTest.php
```

### Browser & PDF Prerequisites (Playwright / Browsershot)

If you use **Pest Browser tests**, **Spatie Browsershot**, or **Spatie Laravel PDF**, install Playwright's Chromium binary:

```bash
npx playwright install chromium
```

### Package Initialization & Publishing

Most package configurations and migrations are **already published** in this starter kit (`config/activitylog.php`, `config/backup.php`, `config/csp.php`, `config/data.php`, `config/fortify.php`, `config/permission.php`, `config/query-builder.php`, `config/sanctum.php`, `config/sluggable.php`, plus `boost.json`, `peck.json`, `phpstan.neon`, `pint.json`, `rector.php`, and `vet.json`).

If you need to publish additional configs/assets or re-initialize a package:

- **Spatie Laravel PDF** (config not published by default):
  ```bash
  php artisan vendor:publish --tag="laravel-pdf-config"
  ```
- **Livewire** (publish config or assets):
  ```bash
  php artisan livewire:publish --config
  php artisan livewire:publish --assets
  ```
- **Laravel Folio** (if re-installing/registering `FolioServiceProvider`):
  ```bash
  php artisan folio:install
  ```
- **Laravel Fortify** (if re-publishing Fortify resources):
  ```bash
  php artisan fortify:install
  ```
- **Laravel Sanctum** (if setting up API routes & Sanctum):
  ```bash
  php artisan install:api
  ```
- **Nunomaduro Essentials** (publish config if customizing defaults):
  ```bash
  php artisan vendor:publish --tag="essentials-config"
  ```
- **Spatie Packages** (re-publish configs/migrations if needed):
  ```bash
  php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
  php artisan vendor:publish --provider="Spatie\Activitylog\ActivitylogServiceProvider"
  php artisan vendor:publish --provider="Spatie\Backup\BackupServiceProvider"
  php artisan vendor:publish --tag="csp-config"
  php artisan vendor:publish --tag="data-config"
  php artisan vendor:publish --tag="query-builder-config"
  php artisan vendor:publish --tag="sluggable-config"
  ```
- **Laravel Boost** (update AI guidelines, MCP config, and skills):
  ```bash
  php artisan boost:install
  ```
- **Laravel Sail** (initialize Docker environment):
  ```bash
  php artisan sail:install
  ./vendor/bin/sail up -d
  ```
- **Laravel Vet** (verify dependency integrity against `vet.json`, or trust all currently installed packages):
  ```bash
  ./vendor/bin/vet
  composer vet:trust   # Re-records all packages currently in vendor/ into vet.json (vet --fresh)
  ```
- **Pest / Peck / Rector** (already initialized; re-init only if resetting):
  ```bash
  ./vendor/bin/pest --init
  ./vendor/bin/peck --init
  ```

### Package-Specific Artisan Commands

- **Database & Migrations** (includes Users, Cache, Jobs, Passkeys, Two-Factor Auth, Sanctum Personal Access Tokens, Spatie Permissions, and Activity Log):
  ```bash
  php artisan migrate
  ```
- **Clear / Rebuild Caches**:
  ```bash
  php artisan optimize:clear
  ```
- **Tail Application Logs**:
  ```bash
  php artisan pail
  ```
- **Backup Database & Files** (Spatie Backup):
  ```bash
  php artisan backup:run
  ```
- **Inspect Folio Routes**:
  ```bash
  php artisan folio:list
  ```
- **Docker / Sail** (if using Sail instead of local PHP):
  ```bash
  php artisan sail:install
  ./vendor/bin/sail up -d
  ```
- **Laravel Boost** (if updating AI guidelines/skills):
  ```bash
  php artisan boost:install
  ```

---

## Release Management

Panda includes an automated semver release script ([`scripts/release.php`](scripts/release.php)) that creates and pushes annotated git tags from `main`:

```bash
composer release -- patch   # v1.0.0 -> v1.0.1 (first release: v1.0.0)
composer release -- minor   # v1.0.1 -> v1.1.0 (first release: v1.0.0)
composer release -- major   # v1.1.0 -> v2.0.0 (first release: v1.0.0)
```

See [docs/release.md](docs/release.md) for full setup, branch guard configuration, and behavior details.

---

## Changelog

See [CHANGELOG.md](CHANGELOG.md) for a history of notable changes, grouped by `Added`, `Changed`, `Deprecated`, `Removed`, `Fixed`, and `Security`.

---

## Author

- **Anthony Osawere** — Software Engineer
  - Website: [www.osawere.com](https://www.osawere.com)
  - Email: `anthony@osawere.com`
  - Social: [@osawereao](https://dev-null.sh/@osawereao)

## Organization
- **Oe2i™**
  - Website: [oe2i.com](https://oe2i.com)
  - Email: `hi@oe2i.com`
  - Social: `@oe2ihq`

