FROM wyveo/nginx-php-fpm-alpine:latest

WORKDIR /usr/share/nginx/

# Copie o conteúdo do diretório de armazenamento para dentro do contêiner
COPY ./storage /usr/share/nginx/api/storage

# Defina as permissões para o diretório de armazenamento
RUN chmod -R 775 /usr/share/nginx/api/storage/*

# Limpe o diretório html padrão e crie um link simbólico para a pasta public
RUN rm -rf /usr/share/nginx/html
COPY . /usr/share/nginx
RUN ln -s public html
