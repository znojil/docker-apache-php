FROM php:8.2.0-fpm-alpine AS base

RUN apk update --no-cache && apk upgrade --no-cache
RUN apk add --no-cache supervisor

FROM base as build

RUN apk add --no-cache $PHPIZE_DEPS linux-headers

# Dependencies
RUN apk add --no-cache \
	c-client \
	ca-certificates \
	freetds \
	freetype \
	gettext \
	gmp \
	icu-libs \
	imagemagick \
	imap \
	libffi \
	libgmpxx \
	libintl \
	libjpeg-turbo \
	libpng \
	libpq \
	librdkafka \
	libssh2 \
	libstdc++ \
	libtool \
	libxpm \
	libxslt \
	libzip \
	lz4-libs \
	make \
	tidyhtml \
	tzdata \
	unixodbc \
	vips \
	yaml \
	zstd-libs

# Development dependencies
RUN apk add --no-cache --virtual .build-deps \
	autoconf \
	bzip2-dev \
	cmake \
	curl-dev \
	freetds-dev \
	freetype-dev \
	g++ \
	gcc \
	gettext-dev \
	git \
	gmp-dev \
	icu-dev \
	imagemagick-dev \
	imap-dev \
	krb5-dev \
	libc-dev \
	libjpeg-turbo-dev \
	libpng-dev \
	librdkafka-dev \
	libssh2-dev \
	libwebp-dev \
	libxml2-dev \
	libxpm-dev \
	libxslt-dev \
	libzip-dev \
	lz4-dev \
	openssl-dev \
	pcre-dev \
	pkgconf \
	postgresql-dev \
	tidyhtml-dev \
	unixodbc-dev \
	vips-dev \
	yaml-dev \
	zlib-dev \
	zstd-dev

# Extensions
RUN pecl install APCu docker-php-ext-enable apcu

RUN docker-php-ext-install bcmath

RUN docker-php-ext-install calendar

RUN docker-php-ext-install exif

RUN docker-php-ext-configure gd \
	--enable-gd \
	--with-webp \
	--with-jpeg \
	--with-xpm \
	--with-freetype \
	--enable-gd-jis-conv
RUN docker-php-ext-install gd

RUN docker-php-ext-install intl

RUN docker-php-ext-install intl

RUN docker-php-ext-install mysqli

RUN docker-php-ext-enable opcache

RUN docker-php-ext-install pcntl

RUN docker-php-ext-install pdo_mysql

RUN pecl install redis docker-php-ext-enable redis

RUN docker-php-ext-install soap

RUN docker-php-ext-install zip

# Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --2
