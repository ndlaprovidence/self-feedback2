### SYMFONY     VERSION 4.4.35 ###

![Self-Feedback](https://raw.githubusercontent.com/ndlaprovidence/self-feedback2/main/public/images/image.jpg)

## Description
Self-feedback is an online website software, a PHP web application developed using the Symfony framework (version 5.4.2).
He has for objectif to send opinion to a meal with a commentary and a specifics opinions to different criteria. 
It also aims to be able to retrieve its opinions in various form to analyze them.

Thanks to [Symfony](https://symfony.com/)

## Installation

### 1) Get all source files

- git clone https://github.com/ndlaprovidence/self-feedback2.git
- composer install


### 2) Create database

Copy **.env** file to **.env.local**

Edit line **DATABASE_URL="mysql://user:password@127.0.0.1:5432/feedback"**

Execute command : 
- php bin/console doctrine:database:create
- php bin/console doctrine:migrations:migrate
- php bin/console doctrine:fixtures:load
- php bin/console server:start


### 3) With your web browser open url where server is listening on

For example, with your browser open this page :  http://localhost:8000 and GO !

Here is initial credentials of the admin user.
 - Username : admin
 - Password : admin

Here is initial credentials of the super-admin user.
 - Username : superadmin
 - Password : superadmin
