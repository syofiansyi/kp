# Menggunakan image PHP 7.1 resmi dengan Apache
FROM php:5.6-apache

# Instal ekstensi PHP yang diperlukan
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Mengatur direktori kerja di dalam kontainer
WORKDIR /var/www/html

# Menyalin seluruh kode proyek ke dalam kontainer
COPY . /var/www/html

# Menyiapkan file konfigurasi Apache untuk CodeIgniter
RUN a2enmod rewrite
COPY ./apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Mengatur hak akses
RUN chown -R www-data:www-data /var/www/html

# Expose port 80 untuk mengakses aplikasi
EXPOSE 80
