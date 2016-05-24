# PiCamServer
Putting a RasPi Camera on the Internet of Things!

Instructions:
-Set up Pi normally (Raspbian)
-Install Apache Webserver & PHP
-Download Zip & Unzip or Git Clone into /var/www/html/PiCamServer
-Make folder "pics" with 775 (777?) permissions
-Set $password in passHandler.php to your desired password
-Move our "index.html" into /var/www/html
-Start Webserver
-Start PHP
-Go to IP of the pi in browser of computer on the same network
