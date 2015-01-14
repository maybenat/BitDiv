create database BITDIV;
use BITDIV;
create table QUANDL (symbol char(6), date date, open decimal(18,4),
high decimal(18, 4), low decimal (18,4), close decimal(18,4), volume int, exdividend int, splitratio decimal(4,2),
constraint BITDIV_pk primary key (symbol, date))

select * from QUANDL