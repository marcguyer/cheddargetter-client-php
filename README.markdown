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
		print_r($client->getCustomers()->toArray());
	?>

DOCUMENTATION
-------------

Check 'em out in docs/index.html

GIT SUBMODULE
-------------

This is the coolest thing ever (lately): If you're using git to manage your app, you can add this repo as a submodule of your app.  I found a nice tutorial here: http://woss.name/2008/04/09/using-git-submodules-to-track-vendorrails/
