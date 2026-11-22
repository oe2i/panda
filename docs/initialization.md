# Project Initialization

After creating a new project from **Panda**, run the following initialization steps to customize core Laravel templates:

## 1. Publish Laravel Stubs

Publish Laravel's default class/file stubs (`stubs/`) so you can customize generated models, controllers, migrations, tests, and more:

```bash
php artisan stub:publish
```

## 2. Publish Mail Views

Publish Laravel's Markdown mail templates (`resources/views/vendor/mail`) for custom email styling and layout:

```bash
php artisan vendor:publish --tag=laravel-mail
```

## 3. Publish Notification Views

Publish Laravel's notification templates (`resources/views/vendor/notifications`):

```bash
php artisan vendor:publish --tag=laravel-notifications
```
