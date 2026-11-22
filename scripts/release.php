<?php

declare(strict_types=1);

$allowedBranch = 'main';
$currentBranch = trim((string) shell_exec('git rev-parse --abbrev-ref HEAD'));

if ($currentBranch !== $allowedBranch) {
    fwrite(STDERR, "Releases can only be created from '{$allowedBranch}' (currently on '{$currentBranch}').\n");
    exit(1);
}

$bump = $argv[1] ?? null;

if (! in_array($bump, ['major', 'minor', 'patch'], true)) {
    fwrite(STDERR, "Usage: composer release -- <major|minor|patch>\n");
    exit(1);
}

$latestTag = trim((string) shell_exec('git describe --tags --abbrev=0 2>NUL'));

if ($latestTag === '') {
    $major = 0;
    $minor = 0;
    $patch = 0;
} else {
    $version = ltrim($latestTag, 'v');
    $parts = explode('.', $version);

    if (count($parts) !== 3 || ! ctype_digit($parts[0]) || ! ctype_digit($parts[1]) || ! ctype_digit($parts[2])) {
        fwrite(STDERR, "Latest tag '{$latestTag}' is not a valid semver tag (expected vX.Y.Z).\n");
        exit(1);
    }

    $major = (int) $parts[0];
    $minor = (int) $parts[1];
    $patch = (int) $parts[2];
}

match ($bump) {
    'major' => [$major++, $minor = 0, $patch = 0],
    'minor' => [$minor++, $patch = 0],
    'patch' => $patch++,
};

$newTag = "v{$major}.{$minor}.{$patch}";

echo "Bumping {$bump}: " . ($latestTag !== '' ? $latestTag : 'none') . " -> {$newTag}\n";

passthru("git tag -a {$newTag} -m \"Release {$newTag}\"", $tagExit);
if ($tagExit !== 0) {
    fwrite(STDERR, "Failed to create git tag {$newTag}.\n");
    exit($tagExit);
}

passthru("git push origin {$newTag}", $pushExit);
if ($pushExit !== 0) {
    fwrite(STDERR, "Failed to push git tag {$newTag}.\n");
    exit($pushExit);
}

echo "Released {$newTag} successfully.\n";
