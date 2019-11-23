@echo Importing database please wait...

@echo off

c:\xampp\mysql\bin\mysql -u root -e "DROP DATABASE IF EXISTS db_inventory";
c:\xampp\mysql\bin\mysql -u root -e "CREATE DATABASE IF NOT EXISTS db_inventory";
c:\xampp\mysql\bin\mysql -u root -D db_inventory < database.sql

@echo Importing database done...

PAUSE
