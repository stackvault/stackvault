# stackvault

- dev: http://dev.stackvault.io
- prod: https://stackvault.io

# Setup
* `vagrant up`
* `vagrant ssh`
* `cd /home/vagrant/code/stackvault`
* `php artisan key:generate`
* `npm install`
* `npm run dev`

# Artisan

First: `vagrant ssh; cd code/stackvault`

* `./artisan browsertime:test https://www.google.com`

# Notes for production

* `after.sh`
