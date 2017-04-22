<?php
/**
 * An interface of simple cache
 *
 * @package axy\scahce-icache
 * @author Oleg Grigoriev <go.vasac@gmail.com>
 * @license https://github.com/axypro/scahce-icache/blob/master/LICENSE MIT
 * @link https://github.com/axypro/scache-icache repository
 * @link https://packagist.org/packages/axy/scache-icache composer package
 * @uses PHP7.1+
 */

declare(strict_types=1);

namespace axy\scache\icache;

if (!is_file(__DIR__.'/vendor/autoload.php')) {
    throw new \LogicException('Please: composer install');
}

require_once(__DIR__.'/vendor/autoload.php');
