# Instalasi dan running project di localhost:

# Backend : </br>

- install composer,laravel 8.31.0, php 7.3 64 Bit</br>
- git clone https://github.com/dennis2908/nominaLaravel </br>
- buka cmd dan lalu ketik composer update </br>
- Hapus file .env <br>
- rename file .env.mysql ke .env<br>
- buka file .env dan edit DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, </br>
   DB_PASSWORD ke settingan mysql local / cloud<br>
- tutup file .env dan buka cmd dan lalu ketik php artisan optimize</br>
- php artisan key:generate </br>
- php artisan optimize:clear</br>
- php artisan optimize</br>
- php artisan jwt:secret</br>
- php artisan optimize</br>
- php artisan optimize:clear</br>
- php artisan migrate --seed</br>
- php artisan serve --port=8441</br>

  
# Notes :

  - Login : </br>
     
	Email : dana@grtech.com.my </br>
	
	Passsword : dana88 </br>
	
	Role : Super Admin </br>
	
	================== </br>
	
	Email : dani@grtech.com.my </br>
	
	Passsword : dani88 </br>
	
	Role : Admin </br>  	

	
# Front End : https://github.com/dennis2908/nominaNext </br>	