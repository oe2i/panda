# Commit Convention

Panda uses a structured commit format to keep git history readable and easy to map to `CHANGELOG.md`.

## Format

```text
<type>(<scope>): <short summary>

- Optional detail or itemized change 1
- Optional detail or itemized change 2
```

- **`<type>`**: Required. One of the types listed below.
- **`(<scope>)`**: Optional. The area affected (e.g., `auth`, `release`, `composer`, `ui`, `readme`).
- **`<short summary>`**: Required. Concise imperative summary in lowercase.
- **Body**: Optional blank line followed by itemized bullet points (`- ...`) or a short explanation.

## Commit Types

| Type | Description |
| :--- | :--- |
| `feature` | A new feature or capability |
| `bugfix` | A standard bug fix during development |
| `hotfix` | An urgent fix applied directly to production |
| `patch` | A small, targeted adjustment or minor fix |
| `refactor` | Code restructuring without changing behavior |
| `perf` | Performance improvements |
| `chore` | Build tasks, dependencies, configs, tooling, or housekeeping |
| `routine` | Recurring maintenance (e.g., `vet:trust`, dependency bumps) |
| `release` | Version bumps, changelogs, or release tagging |
| `ci` | CI/CD workflows and pipeline changes |
| `build` | Build system, Vite, Docker, or asset bundling changes |
| `docs` | Documentation changes (`README.md`, `docs/`, PHPDoc) |
| `test` | Adding or updating tests |
| `style` | Formatting, linting, or style fixes (no logic change) |
| `revert` | Reverting a previous commit |

## Setup Commit Template

To automatically load `.gitmessage` when running `git commit`:

```bash
git config commit.template .gitmessage
```
