INSTALL
-------

Just put everything into a directory called 'CheddarGetter' in your include path. You can use git to do this:

	git clone git://github.com/marcguyer/cheddargetter-client-php.git /path/to/includepath/CheddarGetter

The 'CheddarGetter' directory must not exist prior to running the above command.

Or, if you don't use git, just download all the files and put them in a directory called /path/to/includepath/CheddarGetter

BASIC USAGE
-----------

If you use an autoloader, you're good.  If not, just require all the files like so:

	<?php
		require('CheddarGetter/Client.php');
		require('CheddarGetter/Client/Exception.php');
		require('CheddarGetter/Client/AdapterInterface.php');
		require('CheddarGetter/Client/CurlAdapter.php');
		require('CheddarGetter/Response.php');
		require('CheddarGetter/Response/Exception.php');
		require('CheddarGetter/Http/AdapterInterface.php');
		require('CheddarGetter/Http/NativeAdapter.php');
	?>

Then, just fire it up:

	<?php
		$client = new CheddarGetter_Client('https://theurlforcheddargetter.com', 'yourusername', 'yourpassword', 'yourproductcode');
		$customers = $client->getCustomers();
		print_r($customers->toArray());
		echo $customers->toJson();
	?>

ADVANCED USAGE
--------------

This wrapper uses a adapter pattern (thanks to [https://github.com/stof](https://github.com/stof)) so you can specify your own http adapter and super globals access adapter.  The default built-in adapter uses cUrl for http communication and direct access to super globals.  Also included are Zend Framework compatible adapters.  If you've created an adapter of your own that should be included, just send us a pull request from your fork.  Here's an example using the ZF1 adapter:

	<?php
		$client = new CheddarGetter_Client('https://theurlforcheddargetter.com', 'yourusername', 'yourpassword', 'yourproductcode', new CheddarGetter_Client_ZendAdapter());
		$customers = $client->getCustomers();
		print_r($customers->toArray());
		echo $customers->toJson();
	?>

If you'd like to use your own (or any built-in) adapter for accessing request params and super globals and setting cookies, you can specify the adapter:

	<?php
		CheddarGetter_Client::setRequestAdapter(new CheddarGetter_Http_ZendAdapter());
	?>

DOCUMENTATION
-------------

Check 'em out in [http://cheddargetter.com/php-client/docs](http://cheddargetter.com/php-client/docs)

Also, raw API docs are here: [http://cheddargetter.com/developers](http://cheddargetter.com/developers)

