FROM mysql:latest

COPY features.sql /docker-entrypoint-initdb.d/01-features.sql
COPY password-type.cnf /etc/mysql/conf.d/password-type.cnf
