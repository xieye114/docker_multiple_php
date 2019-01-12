FROM mysql:5.7

# set timezome
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone


COPY ./docker.cnf /etc/mysql/conf.d/docker.cnf
RUN chmod 644 /etc/mysql/conf.d/docker.cnf 

COPY ./mysql-file.cnf /etc/mysql/conf.d/mysql-file.cnf
RUN  chmod 644 /etc/mysql/conf.d/mysql-file.cnf


#COPY ./mysql-file.cnf /etc/mysql/conf.d/mysql-file.cnf
#COPY ./docker.cnf /etc/mysql/conf.d/docker.cnf
#RUN chmod 644 /etc/mysql/conf.d/docker.cnf \
#    && chmod 644 /etc/mysql/conf.d/mysql-file.cnf
	