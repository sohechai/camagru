# Use the official Nginx image as a base image
FROM nginx:latest

# Remove the default Nginx configuration
RUN rm /etc/nginx/conf.d/default.conf

# Copiez le fichier de configuration Nginx
COPY /nginx/default.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/

RUN chmod -R 766 /var/www/
RUN chown -R nginx:nginx /var/www/
