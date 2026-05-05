Synchronise two directories.
============================

This repository provides recursive directory synchronisation in PHP. It can copy files from a source directory to a destination directory, remove destination files that no longer exist in the source, and create symbolic links.

The package can be used directly from PHP code or through the `vendor/bin/sync` command line script. In WebEngine applications it is normally used by the build system to move client-side files into the public `www/` directory.

***

<a href="https://github.com/PhpGt/Sync/actions" target="_blank">
	<img src="https://badge.status.php.gt/sync-build.svg" alt="Build status" />
</a>
<a href="https://app.codacy.com/gh/PhpGt/Sync" target="_blank">
	<img src="https://badge.status.php.gt/sync-quality.svg" alt="Code quality" />
</a>
<a href="https://app.codecov.io/gh/PhpGt/Sync" target="_blank">
	<img src="https://badge.status.php.gt/sync-coverage.svg" alt="Code coverage" />
</a>
<a href="https://packagist.org/packages/PhpGt/Sync" target="_blank">
	<img src="https://badge.status.php.gt/sync-version.svg" alt="Current version" />
</a>
<a href="http://www.php.gt/sync" target="_blank">
	<img src="https://badge.status.php.gt/sync-docs.svg" alt="PHP.GT/Sync documentation" />
</a>

## Example usage

```php
use GT\Sync\DirectorySync;
use GT\Sync\SyncException;

$source = "/var/www/example.com";
$destination = "/var/backup/example.com";

try {
	$sync = new DirectorySync($source, $destination);
	$sync->exec(DirectorySync::COMPARE_FILEMTIME);
}
catch(SyncException $exception) {
	fwrite(STDERR, "Error performing sync: " . $exception->getMessage());
	exit(1);
}

echo "Sync complete!" . PHP_EOL;
echo "Changed: " . count($sync->getCopiedFilesList());
echo "Deleted: " . count($sync->getDeletedFilesList());
echo "Skipped: " . count($sync->getSkippedFilesList());
```

Features
--------

+ Directory synchronisation using PHP filesystem functions.
+ Selective sync through glob matches (only sync js files within script directory with `/script/**/*.js`).
+ Get statistics of copied/deleted/skipped files after sync execution.
+ Create symbolic links from source files or directories to destination paths.

# Proudly sponsored by

[JetBrains Open Source sponsorship program](https://www.jetbrains.com/community/opensource/)

[![JetBrains logo.](https://resources.jetbrains.com/storage/products/company/brand/logos/jetbrains.svg)](https://www.jetbrains.com/community/opensource/)
