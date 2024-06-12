# Laravel AuthSystem API Project

Ovo je API projekat zasnovan na Laravelu.

## Zahtevi

- PHP = 11.7
- Composer
- Docker

## Instalacija

1. Preuzmite projekat kao zip datoteku sa [GitHub repozitorijuma](https://github.com/vaš_korisničko_ime/ime_repozitorijuma/archive/refs/heads/main.zip).

2. Ekstraktujte zip datoteku:
    ```bash
    unzip ime_repozitorijuma-main.zip
    cd ime_repozitorijuma-main
    ```

3. Instalirajte PHP zavisnosti:
    ```bash
    composer install
    ```

4. Kopirajte `.env.example` u `.env`:
    ```bash
    cp .env.example .env
    ```

5. Generišite aplikacioni ključ:
    ```bash
    php artisan key:generate
    ```



## Povezivanje sa MySQL Bazom Podataka na Dockeru (mozete i preko samog mysql ne koristeci docker)

1. Podignite MySQL kontejner koristeći Docker:
    ```bash
    docker run --name laravel_mysql -e MYSQL_ROOT_PASSWORD=vaša_lozinka -e MYSQL_DATABASE=ime_baze -e MYSQL_USER=vaše_korisničko_ime -e MYSQL_PASSWORD=vaša_lozinka -p 3306:3306 -d mysql:latest
    ```

2. Uredite `.env` fajl sa vašim MySQL podešavanjima:
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ime_baze
    DB_USERNAME=vaše_korisničko_ime
    DB_PASSWORD=vaša_lozinka
    ```

3. Pokrenite migracije kako biste kreirali tabele u bazi:
    ```bash
    php artisan migrate
    ```



## Pokretanje Servera

1. Pokrenite lokalni razvojni server:
    ```bash
    php artisan serve
    ```


Sada možete otvoriti preglednik i otići na `http://localhost:8000` kako biste videli vašu aplikaciju ili testirali API.

## Testiranje API-ja

1. Pokrenite Postman.
2. Napravite novu kolekciju ili upit u Postman-u.
3. Postavite URL na `http://localhost:8000` (ili odgovarajući endpoint).
4. Pošaljite zahteve (GET, POST, PUT, DELETE) prema potrebi i proverite odgovore.

## Kreiranje Podataka za Prvi Put (Seed)

Ako želite kreirati osnovne podatke za aplikaciju, možete koristiti seeder-e:
```bash
php artisan db:seed
