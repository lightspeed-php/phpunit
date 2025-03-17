--TEST--
Methods can be ignored for code coverage using an attribute
--INI--
pcov.directory=tests/end-to-end/code-coverage/ignore-method-using-attribute/src/
--SKIPIF--
<?php declare(strict_types=1);
require __DIR__ . '/../../_files/skip-if-requires-code-coverage-driver.php';
--FILE--
<?php declare(strict_types=1);
$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--bootstrap';
$_SERVER['argv'][] = __DIR__ . '/ignore-method-using-attribute/src/CoveredClass.php';
$_SERVER['argv'][] = '--coverage-filter';
$_SERVER['argv'][] = __DIR__ . '/ignore-method-using-attribute/src';
$_SERVER['argv'][] = '--coverage-text';
$_SERVER['argv'][] = __DIR__ . '/ignore-method-using-attribute/tests';
$_SERVER['argv'][] = '--cache-directory';
$_SERVER['argv'][] = __DIR__ . '/ignore-method-using-attribute/cache';

require_once __DIR__ . '/../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);
--CLEAN--
<?php declare(strict_types=1);
require __DIR__ . '/../../_files/delete_directory.php';

delete_directory(__DIR__ . '/ignore-method-using-attribute/cache');
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

Runtime: %s

.                                                                   1 / 1 (100%)

Time: %s, Memory: %s MB

OK (1 test, 1 assertion)


Code Coverage Report:
  %s

 Summary:
  Classes: 100.00% (1/1)
  Methods: 100.00% (1/1)
  Lines:   100.00% (1/1)

PHPUnit\TestFixture\IgnoreMethodUsingAttribute\CoveredClass
  Methods: 100.00% ( 1/ 1)   Lines: 100.00% (  1/  1)
