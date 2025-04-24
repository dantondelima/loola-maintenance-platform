FROM php:8.4-cli-alpine

WORKDIR /app

RUN docker-php-ext-install pdo pdo_mysql
RUN apk --no-cache update && \
    apk --no-cache add shadow bash && \
    chsh -s /bin/bash && \
     echo 'export PS1="\[\033[01;32m\]\u@\h\[\033[00m\]:\[\033[01;34m\]\w\[\033[00m\]\$ "' >> /root/.bashrc


COPY --from=composer /usr/bin/composer /usr/local/bin/composer

COPY ["docker-entrypoint.sh", "/usr/local/bin"]
ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
