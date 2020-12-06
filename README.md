# faker-acceptlanguage
[![Latest Stable Version](https://poser.pugx.org/taavi/faker-acceptlanguage/v)](//packagist.org/packages/taavi/faker-acceptlanguage)
[![Total Downloads](https://poser.pugx.org/taavi/faker-acceptlanguage/downloads)](//packagist.org/packages/taavi/faker-acceptlanguage)
[![License](https://poser.pugx.org/taavi/faker-acceptlanguage/license)](//packagist.org/packages/taavi/faker-acceptlanguage)

This package provides a Faker provider that can be used to generate sample `Accept-Language` HTTP headers.

## Installing

### Install the package from composer
```shell
composer require taavi/faker-acceptlanguage
```

### Use
```php
use Faker\Factory;
use Taavi\FakerAcceptLanguage\AcceptLanguageFakerProvider;

$faker = Factory::create();
$faker->addProvider(new AcceptLanguageFakerProvider($faker));

echo $faker->acceptLanguage;
```

## License
* MIT
