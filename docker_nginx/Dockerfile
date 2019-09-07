FROM nginx:latest

ADD ./site.conf /etc/nginx/conf.d/default.conf
ADD ./ssl/server.crt /etc/nginx/server.crt
ADD ./ssl/server.key /etc/nginx/server.key

RUN mkdir /root/logs
RUN chmod 755 -R /root
RUN chmod 400 /etc/nginx/server.key

EXPOSE 443
CMD ["nginx", "-g", "daemon off;"]
