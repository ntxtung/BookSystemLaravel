@ECHO OFF
echo Stopping Nginx…
taskkill /f /IM nginx.exe
echo Stopping PHP FastCGI…
taskkill /f /IM php-cgi.exe
echo.
EXIT