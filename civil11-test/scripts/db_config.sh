#!/bin/bash

# To avoid prompt for user credentials
export DEBIAN_FRONTEND=noninteractive
apt-get -q -y install mysql-server

# mysql -u root -Bse "create database YOUR_DATABASE_NAME;"
mysql -u root -Bse "create database che01;"

cd ../src/database

# Replace "che01"  with your database name 
# Replace "che01.sql" file with your file
# Note: If you have more than one .sql file repeat below command w.r.t to database and file name

mysql -u root che01<che01.sql

