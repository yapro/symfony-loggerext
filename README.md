# symfony-loggerext

Useful logger functionality in symfony

## Register services in Symfony DI (with autowire)

All services are optional (read comments)
```yaml
services:
  # If you don't want to have log-records about a AccessDeniedHttpException
  YaPro\SymfonyLoggerExt\LoggerCompilerPass: ~
  YaPro\SymfonyLoggerExt\LoggerDecorator: ~

  # If you want to have a log-record about errors in Console commands
  YaPro\SymfonyLoggerExt\ConsoleErrorListener:
    class: YaPro\SymfonyLoggerExt\ConsoleErrorListener
    arguments: ['@monolog.logger']
    tags:
      - { name: kernel.event_listener, event: console.error, priority: 128 }

  # If you want to have a log-record about any failed status code in Console commands
  YaPro\SymfonyLoggerExt\ConsoleTerminateListener:
    class: YaPro\SymfonyLoggerExt\ConsoleTerminateListener
    arguments: ['@logger']
    tags:
      - { name: kernel.event_listener, event: console.terminate }
```

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
