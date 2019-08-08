@ECHO OFF
echo Starting PHP FastCGI…
set PATH=C:\PHP73TS;%PATH%
set PHP_FCGI_MAX_REQUESTS=0
C:\PHP73TS\php-cgi.exe -b 127.0.0.1:9000
echo .
echo Starting Nginx…
cd /c C:\nginx-1.17.2
start nginx
ping 127.0.0.1 -n 1>NUL
echo .
echo .
echo .
ping 127.0.0.1 >NUL
EXIT