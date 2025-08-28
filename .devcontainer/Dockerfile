# Start from Microsoft’s official PHP 8.2 Dev Container
FROM mcr.microsoft.com/devcontainers/php:8.2

# Install required dependencies
RUN apt-get update && apt-get install -y \
    unixodbc-dev \
    gnupg2 \
    apt-transport-https \
    curl \
    && rm -rf /var/lib/apt/lists/*

# Add Microsoft package repo for ODBC driver
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && \
    curl https://packages.microsoft.com/config/ubuntu/20.04/prod.list \
      | tee /etc/apt/sources.list.d/mssql-release.list

# Install ODBC driver
RUN apt-get update && ACCEPT_EULA=Y apt-get install -y msodbcsql18

# Install SQLSRV + PDO_SQLSRV extensions via PECL
RUN pecl install sqlsrv pdo_sqlsrv && \
    echo "extension=sqlsrv.so" > /usr/local/etc/php/conf.d/sqlsrv.ini && \
    echo "extension=pdo_sqlsrv.so" > /usr/local/etc/php/conf.d/pdo_sqlsrv.ini
