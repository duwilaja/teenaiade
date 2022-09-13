update daily set ip=(select max(ip) from hosts where hosts.hostid=daily.host),ip2=(select max(ip2) from hosts where hosts.hostid=daily.host);


insert into daily (host,ip,ip2,checkdt) select hostid,ip,ip2,date(now()) from hosts where hostid not in (select host from daily);


update daily set trafficin=0,trafficout=0,ping=0,ping2=0,log1=0,log2=0,log3=0 where ping is null;



