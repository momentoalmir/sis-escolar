# Description: Start Apache, PHP and MySQL servers
Start-Process C:\xampp\php\php.exe -ArgumentList "-S localhost:3000" -WindowStyle Minimized
Start-Process C:\xampp\mysql\bin\mysqld.exe -WindowStyle Minimized
