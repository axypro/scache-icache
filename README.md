# axy/scache-icache

An interface of simple cache.

[![Latest Stable Version](https://img.shields.io/packagist/v/axy/scache-icache.svg?style=flat-square)](https://packagist.org/packages/axy/scache-icache)
[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%207.1-8892BF.svg?style=flat-square)](https://php.net/)
[![License](https://poser.pugx.org/axy/scache-icache/license)](LICENSE)

It is "interface" package.
For use add to `composer.json`:

```
"require": {
  "axy/scache-icache": "0.1",
  "axy/scache-icache-implementation": "0.1"
}
```

And add a package that provides `axy/scache-icache-implementation` and implements `axy\scache\icache\ICahce`.
For example, `axy/scache-dir`.

## `ICache`

This interface defines the follow methods:

* `set(mixed $key, $value [, ?int $expire = null]): void`
* `get(mixed $key [, ?int $expire [, mixed $default]]): mixed`
* `delete(mixed $key): void`

Set, get and delete a value from the cache by a key.

### Atomicity of operations

This package does not state anything about this.
This is decided by the implementation.

### Value

Return values must be of the same type as when installing.
You can distinguish between NULL-value and non-existing by the argument `$default` of `get()`. 

The interface does not guarantee correct work with objects (keep class and internal state). 

### Key

A key can be any type.

The interface does not guarantee correct work with objects.
Different objects with same properties is same key or not?
Same object in different times with other property value is same key or not?

### Expire

`expire` is timestamp.

The value can be associated with expire at `set()`. 

Or `expire` can be used in `get()`.
For example, we have template files.
At a request, we parse necessary template and cache the result.
Next time we take it from the cache.
But if template file was modified after the cache item then cache is expired.

Also, there may be other limits depending on the implementation.
For example, after a commit to the production, all cache values older this time are expired.

### Garbage collection

The interface does not state anything about garbage collection.

Also if `get()` finds an existing but expired cache item it not guaranteed that the item will be deleted.
But does not forbid it. 
