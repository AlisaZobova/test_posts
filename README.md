# Test project on PHP for working with posts

**Contains:**
1. The general main page with the output of the list of uploaded posts from the database;
2. Page for uploading a json/xml post with subsequent saving of the uploaded file in the database;
3. The page for uploading posts in json/xml with the possibility of creating a file based on the date of creation in the "from-to" interval.

**Installation:**
1. Clone the repository.
2. Create local or remote database.
3. Add .env file with your data, based on the .env.example file.
4. If you don't have npm or composer installed, you need to install them.
5. Install packages and dependencies
```
composer install
npm install
```
6. Make migrations and seed database via
```
php artisan migrate
php artisan db:seed
```
7. Simultaneously run
```
npm run dev
php artisan serve
```
or run 
```npm run build```
first and then ```php artisan serve```.

**Manually testing:**<br/><br/>
In the project you will find sample files to test the possibility of creating a new post.
1. test_ok.json and test_ok.xml - to test successful scenarios;
2. test_fail.json and test_fail.xml - to test scenarios with errors.

You can modify them to get different results.
