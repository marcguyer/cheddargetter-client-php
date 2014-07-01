# INSTALL

## Via Composer

1. [Get Composer](https://getcomposer.org/)
2. [Learn Composer](https://getcomposer.org/doc/00-intro.md)
3. Define the requirement in your project `composer.json` file:
```json
"require": {
	"cheddar-getter/client": "*"
}
```
4. Run `composer install` from your command line.
5. Make sure you either have the cUrl extension installed in your PHP build or
Zend_Http_Client (ZF1) is available via autoload. Our `composer.json` only
suggests these packages but one or the other is required unless you build your
own HTTP adapter (see below).

## Manually

Just put everything into a directory called 'CheddarGetter' in your include
path.

### As a Git submodule

`git clone git://github.com/marcguyer/cheddargetter-client-php.git
/path/to/includepath/CheddarGetter`

The 'CheddarGetter' directory must not exist prior to running the above
command.

### Just download it, geez

[Download](https://github.com/marcguyer/cheddargetter-client-php/archive/master.zip)
and unzip the files and put them in a directory called
/path/to/includepath/CheddarGetter

# BASIC USAGE

```php
<?php
	$client = new CheddarGetter_Client(
		'https://[theurlforcheddargetter.com]',
		'[yourusername]',
		'[yourpassword]',
		'[yourproductcode]'
	);
	$customers = $client->getCustomers();
	print_r($customers->toArray());
	echo $customers->toJson();
?>
```

# ADVANCED USAGE

The adapter pattern (thanks to
[https://github.com/stof](https://github.com/stof)) is used so you can specify
your own http adapter and/or super globals access adapter. The default built-in
adapters use cUrl for http communication, and super globals are accessed
directly. Also included are Zend Framework compatible adapters. If you've
created an adapter of your own that should be included, just send us a pull
request from your fork. Here's an example using a custom HTTP adapter:

```php
<?php
	$client = new CheddarGetter_Client(
		'https://theurlforcheddargetter.com',
		'yourusername',
		'yourpassword',
		'yourproductcode',
		new MyHTTPAdapter()
	);
	$customers = $client->getCustomers();
	print_r($customers->toArray());
	echo $customers->toJson();
?>
```

## Specify a custom HTTP adapter

```php
<?php
	CheddarGetter_Client::setHttpClient(
		new MyCustomClient()
	);
?>
```

## Specify a custom super globals access adapter

```php
<?php
	CheddarGetter_Client::setRequestAdapter(
		new MyCustomAdapter()
	);
?>
```

# CONTRIBUTING

## Asking questions

### Support Forum

The best way to ask questions is via the
[CheddarGetter Support Forum](http://support.cheddargetter.com/).

### GitHub Issues

You're also welcome to open a
[new issue](https://github.com/marcguyer/cheddargetter-client-php/issues/new)
if your inquiry is of a technical nature.

## Writing code

Pull requests are welcome! Please fork us, write and issue a pull request.
[Learn more about contributing to open source projects via GitHub](https://guides.github.com/activities/contributing-to-open-source/)

# DOCUMENTATION

Check 'em out in the /docs directory or as hosted on GitHub:
[http://marcguyer.github.io/cheddargetter-client-php/docs/](http://marcguyer.github.io/cheddargetter-client-php/docs/)

Also, raw API docs are here: [http://cheddargetter.com/developers](http://cheddargetter.com/developers)
