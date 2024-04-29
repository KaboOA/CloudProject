run docker-compose up in terminal.

then open localhost in browser thats it :)

if it make an error like that {"Fatal error: Uncaught mysqli_sql_exception: Connection refused in /var/www/html/fetch_students.php:2 Stack trace: #0 /var/www/html/fetch_students.php(2): mysqli_connect('db', 'root', Object(SensitiveParameterValue), 'db') #1 /var/www/html/index.php(78): include('/var/www/html/f...') #2 {main} thrown in /var/www/html/fetch_students.php on line 2"}

just wait 5 secs so db make connection and then refresh page.

