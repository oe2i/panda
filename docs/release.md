# Release Management

Panda includes an automated semver release script at [`scripts/release.php`](../scripts/release.php), exposed via Composer as `composer release`.

## Prerequisites

- Releases can only be created from the configured main branch (`$allowedBranch = 'main'` in [`scripts/release.php`](../scripts/release.php)).
- Ensure your working tree is clean and your changes are committed and pushed to `main`.

## Usage

```bash
composer release -- patch   # v1.0.0 -> v1.0.1 (or none -> v0.0.1)
composer release -- minor   # v1.0.1 -> v1.1.0 (or none -> v0.1.0)
composer release -- major   # v1.1.0 -> v2.0.0 (or none -> v1.0.0)
```

## How It Works

1. Verifies the current git branch matches `$allowedBranch` (`main` by default).
2. Reads the latest git tag (`git describe --tags --abbrev=0`). If no tags exist yet, the first release starts at `v1.0.0`.
3. Increments the `major`, `minor`, or `patch` segment for subsequent releases.
4. Creates an annotated git tag (`git tag -a vX.Y.Z -m "Release vX.Y.Z"`).
5. Pushes the tag to `origin` (`git push origin vX.Y.Z`).
6. For `minor` and `major` bumps, creates a GitHub Release (`gh release create vX.Y.Z --generate-notes`). Requires the [GitHub CLI (`gh`)](https://cli.github.com/) to be installed and authenticated.

## Configuration

To change the allowed release branch (for example, if your default branch is `master` or `spartan`), update `$allowedBranch` at the top of [`scripts/release.php`](../scripts/release.php):

```php
$allowedBranch = 'main';
```
