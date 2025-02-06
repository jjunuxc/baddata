# IA!!!!!
echo
echo
echo "-=-=-=-[ I.A ]-=-=-=-"
echo 
echo 

# start and configure psql server
/etc/init.d/postgresql start
sudo -u postgres psql -c "CREATE DATABASE insecure"
sudo -u postgres psql -c "ALTER USER postgres PASSWORD 'postgres'"
sudo -u postgres psql -f /app/setup.sql insecure

# start cron
/etc/init.d/cron start

# start apache server
/usr/sbin/apache2ctl -D FOREGOUND

# stayin alive
/bin/bash -c 'while [[ 1 ]]; do sleep 60; done';
