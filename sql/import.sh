#!/bin/bash

docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-04-24-market_history.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-04-27-settings.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-05-11-coins.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-05-15-benchmarks.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-05-23-bookmarks.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-06-01-notifications.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-06-04-bench_chips.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2016-11-23-coins.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2017-02-05-benchmarks.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2017-03-31-earnings_index.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2017-05-accounts_case_swaptime.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2017-06-payouts_coinid_memo.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2017-09-notifications.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2017-10-bookmarks.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2017-11-segwit.sql
docker exec -i mysql mysql -umysql_user -pmysql_pw mysql_database < 2018-01-stratums_ports.sql
