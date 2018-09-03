Steps to install and run: 
1) use composer file in project to setup Symfony; 

2) use cmd to navigate to repository folder; 

3) run following command: 
php bin/console doctrine:schema:update --force

4) start buiilt-in server by running: 
php bin/console server:start
URL by default is 127.0.0.1:8000/, keep in mind port should not be skipped. 
