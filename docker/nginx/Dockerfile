FROM nginx:latest
RUN apt-get update && apt-get install -y unzip zlib1g-dev git curl libmcrypt-dev bcrypt nano man

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /usr/src
RUN mkdir -p web
COPY ./www/web /usr/src/web

#wwRUN PATH=$PATH:/web/vendor/bin:bin


EXPOSE 9000
EXPOSE 80
