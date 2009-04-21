INSTALL
-------

Just put everything into a directory called 'CG' in your include path. You can use git to do this:

	git clone git@github.com:marcguyer/cheddargetter-client-php.git /path/to/includepath/CG

The 'CG' directory must not exist prior to running the above command.

BASIC USAGE
-----------

If you use an autoloader, you're good.  If not, just require all the files like so:

	<?php
		require('CG/Client.php');
		require('CG/Client/Exception.php');
		require('CG/Response.php');
		require('CG/Response/Exception.php');
	?>

Then, just fire it up:

	<?php
		$client = new CG_Client('https://theurlforcheddargetter.com', 'yourusername', 'yourpassword', 'yourproductcode');
		print_r($client->getCustomers()->toArray());
	?>

DOCUMENTATION
-------------

Check 'em out in docs/index.html

GIT SUBMODULE
-------------

If you're using git to manage your app, you can add this repo as a submodule of your app.  I found a nice tutorial here: http://woss.name/2008/04/09/using-git-submodules-to-track-vendorrails/
