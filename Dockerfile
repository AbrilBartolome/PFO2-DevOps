# Imagen base con Apache y PHP
FROM php:8.2-apache

# Instalar extensión mysqli (para conectarse a MySQL)
RUN docker-php-ext-install mysqli

# Copiar archivos del proyecto al directorio de Apache
COPY . /var/www/html/

# Habilitar variables de entorno para PHP
ENV DB_SERVER=mysql_devops
ENV DB_USER=****
#Completar con el usuario que corresponda
ENV DB_PASSWORD=****
#Completar con la contraseña que corresponda
ENV DB_NAME=movies
# Exponer puerto 80 para el servidor web
EXPOSE 80
