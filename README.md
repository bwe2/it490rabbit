# it490rabbit
## Install apache2
Install Mysql server/client
##install PHP7
```
sudo apt-get install php7.0 php-amqp php7.0-mysql-server git
sudo apt-get install php7.0 libapache2-mod-php7.0
sudo apt-get install php-amqp 
```
## install Git
git clone https://github.com/bwe2/it490rabbit.git
## Symbolic link - 
```
cd /etc/php/7.0/cli/conf.d
sudo ln -s /etc/php/mods-available/amqp.ini
cd /etc/php/7.0/apache2/conf.d
sudo ln -s /etc/php/mods-available/amqp.ini
```
## create database 
called it490
create table name student
run the php testRabbitMQServer.php
run the php testRabbitMQServerLog.php
Go to localhost/Fake.html
