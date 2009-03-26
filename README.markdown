INSTALL
-------

Just put everything into a directory called 'CG' in your include path.  If you use an autoloader, you're good.  If not, just require all the files like so:

	<?php
		require('CG/Client.php');
		require('CG/Client/Exception.php');
		require('CG/Response.php');
		require('CG/Response/Exception.php');
	?>
	
Basic usage: 

	<?php
		$client = new CG_Client('https://theurlforcheddargetter.com', 'yourusername', 'yourpassword', 'yourproductcode');
		print_r($client->getCustomers()->toArray());
	?>

DOCUMENTATION
-------------

Check 'em out in docs/index.html