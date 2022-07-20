
## Instalation

- Clone project
- run: composer install
- create .env from example
- run: vendor/bin/sail up -d (if you used sail early, run: vendor/bin/sail down -v before up)
- vendor/bin/sail art key:generate
- vendor/bin/sail art migrate:fresh --seed
- vendor/bin/sail npm install
- vendor/bin/sail npm run dev
- go to [http://localhost](http://localhost)

if you don't use docker, configure .env file and run commands without vendor/bin/sail

Default users:

admin@example.com | password

user@example.com | password
