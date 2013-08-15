Put all the folders in /Indexer/ in the root of your web directory
Add /indexer/indexer1239538.php to the end your DirectoryIndex line in your httpd.conf
For file uploading to work, you have to change serveral lines in you php.ini
	upload_max_filesize = 25M
	post_max_size = 25M
	memory_limit = 128M
Add the following to your httpd.conf
	<Directory /var/www/public/>
		php_flag engine off
		AddType 'text/plain' .php .html
		Options -FollowSymLinks -execCGI
		AddHandler cgi-script .php .php3 .php4 .phtml .pl .py .jsp .asp .htm .shtml .sh .cgi
	</Directory>


make sure you look in settings.php and change those to your liking
