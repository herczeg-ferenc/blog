# Symfony Onion Skeleton

Ez a projekt egy alap vázat biztosít, ha symfony-ban onion architektúra alatt szeretnél fejleszteni.

## Docker elindítása

```bash
docker-compose up -d
```

## Composer függőségek telepítése

```bash
docker-compose run --rm php composer install
```

Toolok

Easy coding standard futtatás

```bash
docker-compose run --rm php composer cs
```

Phpstan futtatás

```bash
docker-compose run --rm php composer sa
```
