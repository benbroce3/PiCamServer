# PiCamServer
Putting a RasPi Camera on the Internet of Things!

Instructions:
<ol>
	<li>Set up Pi normally (Raspbian)</li>
	<li>Install Apache Webserver & PHP</li>
	<li>Download Zip & Unzip or Git Clone into /var/www/html/PiCamServer</li>
	<li>Make folder "pics" with 775 (777?) permissions</li>
	<li>Set $password in passHandler.php to your desired password</li>
	<li>Move our "index.html" into /var/www/html</li>
	<li>Start Webserver</li>
	<li>Start PHP</li>
	<li>Go to IP of the pi in browser of computer on the same network</li>
</ol>

Implement for named localhost (ex. "picam" vs "192.168.0.236")
https://blog.gaya.ninja/articles/faking-a-top-level-domain-name-for-local-development-with-apache/



-flash img to sd card
-expand filesystem
-


_____________________


-get latest jessie
-overclock to "high"
-remove unnecessary programs
-configure to liking
-install apache2 & php5 (see raspberrypi.org doc)
-remove the /var/www/html folder
-git clone into /var/www/PiCamServer
-git fetch & git pull
-create folder "/var/www/PiCamServer/pics" with 777 (-R) permissions
-in /etc/apache2/sites-available/000-default.conf :
	-change documentRoot to /var/www/PiCamServer
	-after documentroot, put:
	
	DirectoryIndex index.php index.html
	<Directory />
		Options FollowSymLinks
		AllowOverride None
	</Directory>
	<Directory /var/www/PiCamServer>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Order allow,deny
		allow from all
	</Directory>
-change ip in vidstream to your pi???
-
