# Run XAMPP Server in background (PHP -S localhost:3000, Apache, MySQL)

# Start XAMPP Server Php
Start-Process -FilePath "C:\xampp\php\php.exe" -ArgumentList "-S localhost:3000" -WindowStyle Minimized

# Start XAMPP Server Apache
Start-Process -FilePath "C:\xampp\apache_start.bat" -WindowStyle Minimized

# Start XAMPP Server MySQL
Start-Process -FilePath "C:\xampp\mysql_start.bat" -WindowStyle Minimized
