#!/bin/sh

mysql -pBismillah3x tniad < /var/www/html/tniad/cron/daily_update_before.sql

php /var/www/html/tniad/bgproc_ping.php 0 100

mysql -pBismillah3x tniad < /var/www/html/tniad/cron/daily_update_after.sql

#mysql -padmin12345 tniad < /var/www/html/tniad/cron/daily_update_complete.sql

