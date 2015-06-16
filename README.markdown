# Install

## Via Composer

1. [Get Composer](https://getcomposer.org/)
2. [Learn Composer](https://getcomposer.org/doc/00-intro.md)
3. Define the requirement in your project `composer.json` file:
```json
"require": {
	"cheddargetter/client": "*"
}
```
4. Run `composer install` from your command line.
5. Make sure you either have the cUrl extension installed in your PHP build or
Zend_Http_Client (ZF1) is available via autoload. Our `composer.json` only
suggests these packages but one or the other is required unless you build your
own HTTP adapter (see below).

## As a Git submodule

`git clone git://github.com/marcguyer/cheddargetter-client-php.git
/path/to/includepath/CheddarGetter`

The 'CheddarGetter' directory must not exist prior to running the above
command.

## Just download it, geez

[Download](https://github.com/marcguyer/cheddargetter-client-php/archive/master.zip)
and unzip the files and put them in a directory called
/path/to/includepath/CheddarGetter

# Basic Usage

## Instantiate the Client Object

```php
<?php
	$client = new CheddarGetter_Client(
		'https://[theurlforcheddargetter.com]',
		'[yourusername]',
		'[yourpassword]',
		'[yourproductcode]'
	);
?>
```

## Create a Customer

```php
<?php
  $data = array(
    'code'      => 'EXAMPLE_CUSTOMER',
    'firstName' => 'Example',
    'lastName'  => 'Customer',
    'email'     => 'example_customer@example.com',
    'subscription' => array(
      'planCode'      => 'THE_PLAN_CODE',
      'ccFirstName'   => 'Example',
      'ccLastName'    => 'Customer',
      'ccNumber'      => '4111111111111111',
      'ccExpiration'  => '04/2011'
    )
  );

  $customer = $client->newCustomer($data);
	print_r($customer->toArray());
	echo $customer->toJson();
?>
```

## Get a Customer

```php
<?php
	$customer = $client->getCustomer('EXAMPLE_CUSTOMER');
	print_r($customer->toArray());
	echo $customer->toJson();
?>
```

## Error Handling

`CheddarGetter_Client` throws `CheddarGetter_Client_Exception` containing the error information.

`CheddarGetter_Response` throws `CheddarGetter_Response_Exception` containing the error information.

If the CheddarGetter API returns an error document, a `CheddarGetter_Response_Exception` is thrown. This can happen during the normal course of operation and the error data in the exception should be presented to the user or handled according to your specs. Here's a quick and dirty example:

```php
<?php
$data = array(
  'code'      => 'EXAMPLE_CUSTOMER',
  'firstName' => 'Example',
  'lastName'  => 'Customer',
  'email'     => 'example_customer@example.com',
  'subscription' => array(
    'planCode' => 'A_PAID_PLAN',
    'ccFirstName'   => 'Example',
    'ccLastName'        => 'Customer',
    'ccNumber'      => '4111111111111111',
    'ccExpiration'  => '04/2011'
  )
);
try {
	$customer = $client->newCustomer($data);
	// under some circumstances, the customer is created but
	// contains an embedded error that needs to be handled
	$customer->handleEmbeddedErrors();
} catch (CheddarGetter_Response_Exception $re) {
  die($re->getCode() . '-' . $re->getAuxCode() . ': ' . $re->getMessage());
}
?>
```

More information about errors is available in the [Error Handling knowledge base article](http://support.cheddargetter.com/kb/api-8/error-handling). You can and should test by [simulating the possible errors](http://support.cheddargetter.com/kb/api-8/error-handling#simulation).

# Advanced Usage

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
		'[yourusername]',
		'[yourpassword]',
		'[yourproductcode]',
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

# Contributing

## Writing code

Pull requests are welcome! Please fork us, write and issue a pull request.
[Learn more about contributing to open source projects via GitHub](https://guides.github.com/activities/contributing-to-open-source/)

## Asking questions

### Support Forum

The best way to ask questions is via the
[CheddarGetter Support Forum](http://support.cheddargetter.com/).

### GitHub Issues

You're also welcome to open a
[new issue](https://github.com/marcguyer/cheddargetter-client-php/issues/new)
if your inquiry is of a technical nature or you think you've found a bug.

# Documentation

Check 'em out in the /docs directory or as hosted on GitHub:
[http://marcguyer.github.io/cheddargetter-client-php/](http://marcguyer.github.io/cheddargetter-client-php/)

Also, raw API docs are here: [http://cheddargetter.com/developers](http://cheddargetter.com/developers)
