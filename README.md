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
