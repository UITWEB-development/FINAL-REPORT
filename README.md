
# Dev description
Guildline how to use this code. (Using Gitbash)

- Step 1. Clone code:
```
git clone git@github.com:UITWEB-development/FINAL-REPORT.git
```
- Step 2. Access FINAL-REPORT file and checkout currently branch:
```
cd FINAL-REPORT
git checkout dev
```
- Step 3. Create your dev branch:
```
git checkout -b <your branch>
```
- Step 4. Install composer- dependencies:
```
composer install
```
- Step 5. Install npm- dependencies
```
npm install
```
- Step 6. Copy .env.example file to .env
      + Using bash
```
cp .env.example .env
```
    or Using powershell
```
copy .env.example .env 
```
- Step 7. Generate encryption key and run migration
```
php artisan key:generate
php artisan migrate
```
- Step 8. Run seed:
```
php artisan db:seed
```
- Step 9. Run vite 
```
npm run dev
```
- Step 10. Run Laravel dev server
```
php artisan serve
```


