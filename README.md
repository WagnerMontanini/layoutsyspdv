# LayoutSyspdv Library Test

[![Maintainer](http://img.shields.io/badge/maintainer-@wagnermontanini-blue.svg?style=flat-square)](https://twitter.com/wagnermontanini)
[![Source Code](http://img.shields.io/badge/source-wagnermontanini/layoutsyspdv-blue.svg?style=flat-square)](https://github.com/wagnermontanini/layoutsyspdv)
[![PHP from Packagist](https://img.shields.io/packagist/php-v/wagnermontanini/layoutsyspdv.svg?style=flat-square)](https://packagist.org/packages/wagnermontanini/layoutsyspdv)
[![Latest Version](https://img.shields.io/github/release/wagnermontanini/layoutsyspdv.svg?style=flat-square)](https://github.com/wagnermontanini/layoutsyspdv/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)
[![Build](https://img.shields.io/scrutinizer/build/g/wagnermontanini/layoutsyspdv.svg?style=flat-square)](https://scrutinizer-ci.com/g/wagnermontanini/layoutsyspdv)
[![Quality Score](https://img.shields.io/scrutinizer/g/wagnermontanini/layoutsyspdv.svg?style=flat-square)](https://scrutinizer-ci.com/g/wagnermontanini/layoutsyspdv)
[![Total Downloads](https://img.shields.io/packagist/dt/wagnermontanini/layoutsyspdv.svg?style=flat-square)](https://packagist.org/packages/cwagnermontanini/layoutsyspdv)

###### LayoutSyspdv Library is a small set of classes developed for integration with the Syspdv System.

LayoutSyspdv Library é um pequeno conjunto de classes desenvolvidas para integração ao Sistema Syspdv.

### Highlights

- Simple installation (Instalação simples)
- Abstraction of all API methods (Abstração de todos os métodos da API)
- Composer ready and PSR-2 compliant (Pronto para o composer e compatível com PSR-2)

## Installation

Uploader is available via Composer:

```bash
"wagnermontanini/layoutsyspdv": "^1.0"
```

or run

```bash
composer require wagnermontanini/layoutsyspdv
```

## Documentation

###### For details on how to use, see a sample folder in the component directory. In it you will have an example of use for each class. It works like this:

Para mais detalhes sobre como usar, veja uma pasta de exemplo no diretório do componente. Nela terá um exemplo de uso para cada classe. Ele funciona assim:

#### GeraArq:

```php
<?php
require __DIR__ . "/../vendor/autoload.php";

use WagnerMontanini\LayoutSyspdv\GeraLayout;

$geraLayout = new GeraLayout();

$syspdv = $geraLayout->geraLayoutSyspadm([
    ["001"=> "99",
    "002"=> "A"]    
])->geraLayoutSyspaplic([
    ["001"=> "9999",
    "002"=> "A"]    
])->geraLayoutSyspcar([
    ["001"=> "9999999999999999999",
    "002"=> "999999",
    "003"=> "A",
    "004"=> "A",
    "005"=> date("Y-m-d"), //VERIFICAR DATA QUANDO TESTAR
    "006"=> "99999999999999"]    
])->geraLayoutSyspcarac([
    ["001"=> "9999",
    "002"=> "A"]    
])->geraLayoutSyspcfo([
    ["001"=> "99999",
    "002"=> "A",
    "003"=> "A",
    "004"=> "",
    "005"=> "",
    "006"=> "",
    "007"=> "",
    "008"=> "",
    "009"=> "",
    "010"=> "",
    "011"=> "",
    "012"=> "",
    "013"=> "",
    "014"=> "",
    "015"=> "",
    "016"=> "",
    "017"=> "",
    "018"=> "",
    "019"=> ""]    
]);

```

## Contributing

Please see [CONTRIBUTING](https://github.com/wagnermontanini/layoutsyspdv/blob/master/CONTRIBUTING.md) for details.

## Support

###### Security: If you discover any security related issues, please email wagnermontanini@hotmail.com.br instead of using the issue tracker.

Se você descobrir algum problema relacionado à segurança, envie um e-mail para wagnermontanini@hotmail.com.br em vez de usar o rastreador de problemas.

Thank you

## Credits

- [Wagner Montanini](https://github.com/wagnermontanini) (Developer)
- [All Contributors](https://github.com/wagnermontanini/layoutsyspdv/contributors) (This Rock)

## License

The MIT License (MIT). Please see [License File](https://github.com/wagnermontanini/layoutsyspdv/blob/master/LICENSE) for more information.