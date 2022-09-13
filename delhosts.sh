#!/bin/bash
# Program name: delhosts.sh
#date

mysql -pBismillah3x corenms -e"select hostname from devices" --silent --raw > /opt/neo/core/dhosts.txt

cat /opt/neo/core/dhosts.txt |  while read output
do
	#echo "$output"
	#/opt/neo/core/delhost.php "$output" > /dev/null
	mysql -pBismillah3x tniad -e"update hosts set snmp='1' where ip='$output'" > /dev/null
done
