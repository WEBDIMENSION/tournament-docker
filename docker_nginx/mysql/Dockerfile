FROM mysql:5.7
# RUN sed -e 's/^ *user *= *mysql$/user = root/' -i /etc/mysql/my.cnf
#MySQL設定ファイルをイメージ内にコピー
COPY my.cnf /etc/mysql/my.cnf
COPY init /docker-entrypoint-initdb.d

#docker runに実行される
 CMD ["mysqld"]
