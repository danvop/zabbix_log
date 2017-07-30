# Syslog
### Простоя визуализация syslog  zabbix_log

Простой мониторинг событий syslog сетевого оборудования. 

Рабочий пример:
[syslog.techamm.com](http://syslog.techamm.com/)

![syslog](https://user-images.githubusercontent.com/5978976/28757896-3257eb1a-75d0-11e7-955d-4778c64aba18.png)

### Установка
1. Настроить запись событий syslog в MySQL
2. Переименовать example.config.php в config.php
3. В config.php ввести параметры доступа к БД
4. > composer install


### Структура БД для теста
```
CREATE TABLE `logs` (
  `host` varchar(32) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  `msg` text,
  `seq` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`seq`),
  KEY `host` (`host`),
  KEY `datetime` (`datetime`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;
```
