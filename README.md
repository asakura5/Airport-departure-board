# Airport departure board

This was made to run on a system with Apache and PHP. I used php 8 and linux but should run with other options. Good results have also been reported with lighhttpd and php 7.3. Ensure you have php-curl installed (see here how to install it: https://stackoverflow.com/questions/6382539/call-to-undefined-function-curl-init)

Don´t forget to get your https://airlabs.co/ API key and insert it in api.php.

Free version of API requests limit per month is 1000 but you can request double that by email (the procedure is explained on the automated email you receive upon registration). With 2000 requests per month you have to control yourself: in the worst case scenario (which is a 31-day month) you can only make 64 requests per day or 2 requests per hour or 1 request every 30 minutes.

Once you copy these files to your root folder (/var/www/html), you can enter your IP address and /base.php and something should show up. (Check to see if php curl extension is installed if browser screen shows something but remains blank)

You can set the number of rows that show up on the arrivals and departures lists at the top of the base.php file. This will allow you to set the results list to the size of your screen.

You can change the selection of airports in the list using the settings.php file referring to the aptlist file for the supported airport name and corresponding code

--START
NOTE : this code does NOT work on a computer that runs Lighttpd 1.4/PHP 7.4. Use Apache 2/PHP 7.4 for best results.

Since the Apache 2 process runs under 'www-data' identity, it is necessary to change owner/group of the directory which contains the code. You do this in a terminal like this :
cd /var/www/html
sudo chown -R www-data:www-data ./filename
This allows the settings.php page to modify the 'settings' file to reflect the airport chosen by the user. If the 'settings' file were owned by root, it would be impossible for the Apache 2 process to update this file.

It is a good idea, for those who want to work on the code locally, to put their normal user (pi) in the www-data group. Just do this in a terminal :
sudo usermod -a -G www-data pi
Close the session, then re-open it (sudo systemctl reload apache2).


For more information: https://supertechman.blogspot.com/2022/06/raspberry-pi-based-airport-arrivals-and.html
