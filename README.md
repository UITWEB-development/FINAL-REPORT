
# Dev description
Hướng dẫn sử dụng branch Dev

- Step 1. Clone code:
```
git clone git@github.com:UITWEB-development/FINAL-REPORT.git
```
- Step 2. Access FINAL-REPORT file and checkout currently branch:
```
cd FINAL-REPORT
git checkout dev
```
- Step 3. Install composer- dependencies:
```
php install
```
- Step 4. Install npm- dependencies
```
npm install
```
- Step 5. Copy .env.example file to .env
```
cp .env.example .env  => using bash
copy .env.example .env => using powershell
```
- Step 6. Generate encryption key and run migration
```
php artisan key:generate
php artisan migrate
```
- Step 7. Run seed:
```
php artisan db:seed
```
- Step 8. Run vite 
```
npm run dev
```
- Step 9. Run Laravel dev server
```
php artisan serve
```
