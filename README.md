# The Arms Locker
## Limited Resource Management

The Arms Locker attempts to solve a simple problem: "Who has what?". Whether you are managing IP addresses on a static network or books you've loaned to friends, you can use The Arms Locker to track who has what.

## Install & Use

Installing is simple. You just need the /web-app hosted in any webserver
supporting PHP 5.2.1. If you wish to use SQlite you can use the provided
database in /web-db/default.sdb. Otherwise the code is only limited by
the databases supported by the PHP PDO implementation.

## Installing on a Ubuntu LAMP Server

* Install Ubuntu Server
* Select during installation to set the server up as a LAMP server
* `sudo apt-get install git-core`
* `sudo apt-get install php5-sqlite`
* `cd /var/www`
* `sudo git clone http://github.com/leighmcculloch/thearmslocker.git`
* Change your `/etc/apache2/sites-available/default` so that instead of pointing to `/var/www` for the document root, it points to `/var/www/thearmslocker/web-app/`.
* `sudo /etc/init.d/apache2 restart`
* You should be up and running :)

## License

The Arms Locker at it's current revision is licensed under the MIT
License.
