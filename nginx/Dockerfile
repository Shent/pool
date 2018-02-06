FROM ubuntu:16.04

WORKDIR /src
COPY . /src

RUN DEBIAN_FRONTEND=noninteractive apt-get install -y --no-install-recommends
RUN apt-get update && apt-get install -y nginx
RUN apt-get install nano

ADD nginx.conf /etc/nginx/
ADD yaamp.conf /etc/nginx/sites-available/

RUN ln -s /etc/nginx/sites-available/yaamp.conf /etc/nginx/sites-enabled/yaamp
RUN rm /etc/nginx/sites-enabled/default

RUN echo "upstream php-upstream { server php:9000; }" > /etc/nginx/conf.d/upstream.conf
RUN usermod -u 1000 www-data

ENV DEBIAN_FRONTEND teletype

CMD ["nginx"]

EXPOSE 80
