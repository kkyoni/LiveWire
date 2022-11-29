<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
	<p>PHP Version ^8.0.2 </p>
	<p>Laravel Framework ^9.19 </p>
</p>

## Note (For ubuntu users only)
- To give full permissions/access to project folder, Open terminal ( **Ctrl + Alt + t** )

      sudo chmod -R a+rwx  /opt/lampp/htdocs/Folder Name
      
- To give full permissions/access to specific folder, Example : 

      sudo chmod -R a+rwx  /opt/lampp/htdocs/Folder Name/storage/logs
  
## Project installation steps

- Step 1 : composer Install
- Step 2 : composer update
- Step 3 : composer dumpa
- Step 4 : php artisan key:generate
- Step 5 : php artisan migrate:refresh --seed
- Step 6 : ./clean-up.sh


## Admin Login

- Email Id : admin@admin.com 
- Password : data@1234 


## Define .env Gmail User Name And Password

- MAIL_MAILER=smtp
- MAIL_HOST=smtp.mailtrap.io
- MAIL_PORT=2525
- MAIL_USERNAME=
- MAIL_PASSWORD=
- MAIL_ENCRYPTION=tls
- MAIL_FROM_ADDRESS="hello@example.com"
- MAIL_FROM_NAME="${APP_NAME}"
