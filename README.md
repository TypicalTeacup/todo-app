# To-do list
## Konfiguracja
Plik konfiguracyjny powinien znajdować się w `.env`, przykładowa konfiguracja znajduje się w `.env.example`. 
### Baza danych
Domyślna konfiguracja - MySQL z lokalnego Dockera
```bash
DB_CONNECTION=mysql       # mysql/sqlite dla lokalnej bazy danych, mysql/mariadb/pgsql/sqlsrv dla oddzielnej bazy danych w zależności od serwera
DB_HOST=db-host           # Niewymagane dla DB_CONNECTION=sqlite 
DB_PORT=3306              # Niewymagane dla DB_CONNECTION=sqlite
DB_DATABASE=db-name       # Nazwa bazy danych, dla DB_CONNECTION=sqlite ścieżka do pliku sqlite
DB_USERNAME=db-uzytkownik # Nazwa użytkownika bazy danych, niewymagane dla DB_CONNECTION=sqlite 
DB_PASSWORD=db-haslo      # Hasło użytkownika bazy danych, niewymagane dla DB_CONNECTION=sqlite 
```
### Serwer e-mail
Domyślna konfiguracja - Mailpit z lokalnego Dockera (interfejs na localhost:8025)
```bash
MAIL_MAILER=smtp
MAIL_SCHEME=null
MAIL_HOST=mail-host                   # Serwer SMTP
MAIL_PORT=587                         # Port serwera SMTP
MAIL_USERNAME=username                # Nazwa użytkownika SMTP
MAIL_PASSWORD=password                # Hasło użytkownika
MAIL_FROM_ADDRESS="todo@example.com"  # E-mail adresata
MAIL_FROM_NAME="${APP_NAME}"          # Nazwa adresata
```
## Uruchamianie
### Wymagania
- Composer
- Docker
- bash (dla szybkiego startu)
### Szybki start
Dla ułatwienia uruchamiania w repozytorium widnieją 2 skrypty uruchamiające, `init.sh` i `start.sh`. Aby je uruchomić potrzebny jest Composer, Docker i bash.
1. Skopiuj przykładowy plik konfiguracyjny
```bash
cp .env.example .env
vim .env # W przypadku potrzeby zmiany konfiguracji
```
2. Uruchom `init.sh` (skrypt inicjalizacyjny, przy następnych uruchomieniach nie trzeba)
```bash
./init.sh
# Jeżeli powyższa komenda nie działa
bash init.sh
```
3. Uruchom `start.sh`
```bash
./start.sh
# Jeżeli powyższa komenda nie działa
bash start.sh
```
### Uruchamianie manualne
1. Sklonuj repozytorium
```bash
git clone https://github.com/TypicalTeacup/todo-app.git
```
2. Przejdź do folderu projektu 
```bash
cd todo-app
```
3. Skopiuj przykładowy plik konfiguracyjny
```bash
cp .env.example .env
vim .env # W przypadku potrzeby zmiany konfiguracji
```
4. Zainstaluj potrzebne biblioteki backendowe
```bash
composer install
```
5. Uruchom serwery
```bash
./vendor/bin/sail up -d
```
6. Uruchom migracje baz danych
```bash
./vendor/bin/sail artisan migrate:fresh
```
7. Zainstaluj biblioteki frontendowe
```bash
./vendor/bin/sail npm install
```
8. Zbuduj frontend lub uruchom serwer Vite
```bash
./vendor/bin/sail npm run build # zbudowanie
./vendor/bin/sail npm run run dev # serwer
```
9. [Skonfiguruj Scheduler](https://laravel.com/docs/11.x/scheduling#running-the-scheduler) lub uruchom Scheduler lokalnie
```bash
./vendor/bin/sail artisan schedule:work
```
10. Uruchom Queue Worker
```bash
./vendor/bin/sail artisan queue:work
```
11. Aby zakończyć pracę serwera, uruchom:
```bash
./vendor/bin/sail down
```

