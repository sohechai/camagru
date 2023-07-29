# Utilisez l'image officielle de PHP 7.4 FPM
FROM php:7.4-fpm

# Installez les dépendances requises pour PDO PostgreSQL
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

# Définissez le répertoire de travail dans le conteneur
WORKDIR /var/www/html
