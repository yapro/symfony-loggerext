# symfony-loggerext

Useful logger functionality in symfony

Tests
------------
```sh
docker build -t yapro/symfony-loggerext:latest -f ./Dockerfile ./
docker run --rm -v $(pwd):/app yapro/symfony-loggerext:latest bash -c "cd /app \
  && composer install --optimize-autoloader --no-scripts --no-interaction \
  && /app/vendor/bin/phpunit /app/tests"
```

Dev
------------
```sh
docker build -t yapro/symfony-loggerext:latest -f ./Dockerfile ./
docker run -it --rm -v $(pwd):/app -w /app yapro/symfony-loggerext:latest bash
composer install -o
```
