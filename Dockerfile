# Use the official PHP image as the base image
FROM php:latest

# Copy the PHP files to the container's working directory
COPY . /var/www/html

# Install the mysqli extension
RUN docker-php-ext-install mysqli

# Expose port 80 for web traffic
EXPOSE 8082

# Start the PHP development server
CMD ["php", "-S", "0.0.0.0:8082", "-t", "/var/www/html"]
