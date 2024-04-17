FROM debian:latest
RUN apt update && apt install -y nginx

COPY ./warmweb/ /var/www/html

RUN rm /etc/nginx/sites-enabled/default
RUN echo "server {" > /etc/nginx/conf.d/default.conf && \
echo "    listen 52001;" >> /etc/nginx/conf.d/default.conf && \
echo "    location / {" >> /etc/nginx/conf.d/default.conf && \
echo "        root /var/www/html;" >> /etc/nginx/conf.d/default.conf && \
echo "        index index.html index.htm;" >> /etc/nginx/conf.d/default.conf && \
echo "    }" >> /etc/nginx/conf.d/default.conf && \
echo "}" >> /etc/nginx/conf.d/default.conf

EXPOSE 52001

CMD ["nginx", "-g", "daemon off;"]
