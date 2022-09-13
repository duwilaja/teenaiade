insert into daily_h select * from daily;
insert into hourly_h select * from hourly;

truncate table daily;
truncate table hourly;

insert into daily (host,ip,ip2,checkdt) select hostid,ip,ip2,date(now()) from hosts;

update daily set trafficin=0,trafficout=0,ping=0,ping2=0,log1=0,log2=0,log3=0;

