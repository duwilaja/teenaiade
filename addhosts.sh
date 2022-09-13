#!/bin/bash
# Program name: addhosts.sh
#date

mysql -pBismillah3x tniad -e"select concat(ip,' ',community,' v2c 161') from hosts where community<>'' and (snmp<>'1' or snmp is null)" --silent --raw > /opt/neo/ahosts.txt

cat /opt/neo/ahosts.txt |  while read output
do
	strarray=($output)
	#echo ${strarray[0]}
	#echo ${strarray[1]}
	#echo ${strarray[2]}
    /opt/neo/core/addhost.php ${strarray[0]} ${strarray[1]} ${strarray[2]} ${strarray[3]} > /dev/null
done
