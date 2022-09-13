update propinsi set tot=(select count(*) from hosts where hosts.group4=propinsi.prop),
ok=(select count(*) from hosts join daily on hosts.hostid=daily.host 
where hosts.group4=propinsi.prop and (daily.ping+daily.ping2+daily.log1+daily.log2+daily.log3>0));

update kodam set tot=(select count(*) from hosts where hosts.group2=kodam.kodamid),
ok=(select count(*) from hosts join daily on hosts.hostid=daily.host 
where hosts.group2=kodam.kodamid and (daily.ping+daily.ping2+daily.log1+daily.log2+daily.log3>0));


