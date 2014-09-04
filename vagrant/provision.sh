#!/bin/bash

# Add epel repo
#sudo rpm -Uvh http://dl.fedoraproject.org/pub/epel/7/x86_64/e/epel-release-7-1.noarch.rpm
sudo rpm -Uvh http://dl.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm
# Install Apache and PHP (and any needed extensions).
sudo yum install -y git httpd php php-mbstring php-pdo

# Adjust apache's settings for which addresses/ports it does/doesn't listen on.
sudo sed -i "s/#Listen 80/Listen 80/g" /etc/httpd/conf/httpd.conf
sudo sed -i "s/#ServerName www.example.com:80/ServerName portable-cms.local/g" /etc/httpd/conf/httpd.conf

# Turn off Apache's EnableSendfile option (for information on why, see
# "http://www.geoffmcqueen.com/2011/08/12/solved-apache-serving-corrupted-files-via-virtualbox-vboxfs-shares/").
# This may only be necessary for VirtualBox VM's running on a Windows host.
sudo sed -i "s/#EnableSendfile off/EnableSendfile off/g" /etc/httpd/conf/httpd.conf

# Add hosts entries (preventing duplicates by first removing them if they're
# already there).
sudo sed -i "s/127.0.0.1 portable-cms.local//g" /etc/hosts
sudo echo "127.0.0.1 portable-cms.local" >> /etc/hosts

# Copy the conf file to where Apache will find it.
sudo cp /vagrant/vagrant/vhost-portable-cms.conf /etc/httpd/conf.d/

# Adjust the mode settings on that conf file.
sudo chmod 644 /etc/httpd/conf.d/vhost-portable-cms.conf

# Make sure Apache is configured to start automatically and is
# running.
sudo chkconfig httpd on
sudo service httpd restart
