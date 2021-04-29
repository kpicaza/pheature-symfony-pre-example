FROM nginx:latest

RUN apt update && apt install openssl -y
RUN openssl req -x509 -nodes -days 365 -newkey rsa:2048  -keyout /etc/nginx/nginx.key -out /etc/nginx/nginx.crt -subj "/C=GB/ST=London/L=London/O=Global Security/OU=IT Department/CN=example.com"

COPY ./nginx.conf /etc/nginx/nginx.conf
COPY ./default.conf /etc/nginx/conf.d/default.conf

RUN usermod -u 1000 www-data
