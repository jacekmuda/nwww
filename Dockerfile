FROM wordpress
# must be set
# 'DB_NAME', 'DB_USER', 'DB_PASSWORD', 'WP_HOME', 'WP_SITEURL'])

RUN curl -sL https://deb.nodesource.com/setup_7.x | bash - && \
    apt-get install -y nodejs git unzip 

ADD . /usr/src/nwww/
RUN cd /usr/src/nwww  && \
    npm install && \
    ./node_modules/.bin/webpack &&\
    cd /usr/src/nwww && \
    curl -o /tmp/composer-install.php https://getcomposer.org/installer && \
    php /tmp/composer-install.php && \ 
    php composer.phar install && \
    rm -r node_modules composer.phar 

RUN rm -rf /usr/src/wordpress && mv /usr/src/nwww/web /usr/src/wordpress && \
    mv /usr/src/nwww/config   /var/www/ && \
    mv /usr/src/nwww/vendor /var/www/ 


