# Commmands from the video

**This file is designed to facilitate understanding for the video and eventual cut-paste for code chunks appearing in the video for "1 Pioneer or Basic Level" of the book "Defining a testing automation strategy for a P.O. with CODECEPTION_ & WordPress"**


```diff
+ BOOK

Book #2

Defining a testing automation strategy for a P.O 
with CODECEPTION_ & WordPress 
(The continuous learning trilogy Book 2)

https://github.com/bflaven/book-defining-testing-strategy-agile-po-codeception

https://www.amazon.com/dp/B0864VS2Y6/


+ ENVIRONMENT

- local LAMP
MAMP Download

- access to localhost
http://localhost/ or http://127.0.0.1/

- access to phpMyAdmin
http://localhost/phpMyAdmin/

- editor 1
Sublime Text Download
https://www.sublimetext.com/

- editor 2
Visual Studio Code Download
https://code.visualstudio.com/download


+ WP

- CMS
Worpresss Download
https://wordpress.org/download/

- 1 -  create a custom URL
# add for the testing session for the video
127.0.0.1 codecept2.mydomain.priv


- 2 -  install WP
--- mysql
dbname: demo_cp_test_site
root:root

--- mysite
demo_cp_test_site
admin:admin
admin@test.com



+ WORKING CODECEPTION (CP)

- CODECEPTION (CP)
Codeception Install
https://codeception.com/install

--- cd /Applications/MAMP/htdocs/wordpress/
- cd /Applications/MAMP/htdocs/wordpress-demo


--- url: http://codecept.mydomain.priv/wordpress
- url: http://codecept2.mydomain.priv/wordpress-demo/


- with phar
php codecept.phar g:cest acceptance First


- with composer
php vendor/bin/codecept g:cest acceptance First

```


