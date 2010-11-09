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
		require('CheddarGetter/Response.php');
		require('CheddarGetter/Response/Exception.php');
	?>

Then, just fire it up:

	<?php
		$client = new CheddarGetter_Client('https://theurlforcheddargetter.com', 'yourusername', 'yourpassword', 'yourproductcode');
		$customers = $client->getCustomers();
		print_r($customers->toArray());
		echo $customers->toJson();
	?>

DOCUMENTATION
-------------

Check 'em out in [http://cheddargetter.com/php-client/docs](http://cheddargetter.com/php-client/docs)

Also, raw API docs are here: [http://cheddargetter.com/developers](http://cheddargetter.com/developers)

