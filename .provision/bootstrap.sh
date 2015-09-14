#!/usr/bin/env bash

# set up nginx server
sudo cp /vagrant/.provision/nginx/nginx.conf /etc/nginx/conf/nginx.conf
sudo chmod 644 /etc/nginx/conf/nginx.conf
sudo service nginx restart

