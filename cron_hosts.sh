#!/bin/sh

SERVICE='/opt/neo/addhosts.sh'
 
if ps ax | grep -v grep | grep $SERVICE > /dev/null
then
    echo "$SERVICE service running"
else
    #echo "$SERVICE is not running"
	/opt/neo/addhosts.sh > /dev/null
fi

SERVICE='/opt/neo/delhosts.sh'
 
if ps ax | grep -v grep | grep $SERVICE > /dev/null
then
    echo "$SERVICE service running"
else
    echo "$SERVICE is not running"
	/opt/neo/delhosts.sh > /dev/null
fi
