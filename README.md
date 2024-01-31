# Laravel Object Helper

A convenient utility for Laravel 5.5 and above, designed to effortlessly transform arrays and JSON strings into object form.

## Getting Started

### Installation

Install the package through Composer:

```bash
composer require kfoobar/laravel-object
```

This command adds the Laravel Object Helper to your project, making it ready for use.

## Usage

### Basic Conversion
To convert an array or JSON string into an object, use:

```php
$object = Obj::make(['foo' => 'bar']);
```

This basic usage converts the provided input into an object, streamlining data handling within your Laravel application.

### Error Handling

By default, the method returns `null` if the input cannot be converted into an object. For stricter error handling, pass `true` as the second argument. This triggers an exceptio

```php
$object = Obj::make($data, true);
```

This approach is beneficial in environments where fail-fast error handling is preferred, ensuring that conversion issues are immediately flagged and can be addressed.

## Contributing

Your contributions are highly appreciated! Whether it's through submitting bug reports, offering new features, or improving documentation, your help makes a difference.

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.
