#!/usr/bin/bash

cd /var/www/html/laravel/node
if [ "$1" = 'start' ]; then
/usr/bin/pm2 start bin/node_server.js
elif [ "$1" = 'stop' ]; then
/usr/bin/pm2 stop bin/node_server.js
fi
