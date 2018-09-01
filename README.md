# Form-Builder

### Example apache httpd configuration

    <VirtualHost form-builder.local:80>
        DocumentRoot "C:\amp\apache\htdocs\form-builder\public"
        ServerName form-builder.local
        <Directory "C:\amp\apache\htdocs\form-builder\public">
            Options FollowSymLinks Indexes ExecCGI
            AllowOverride All
        </Directory>
        
        # forward all requests to index.php file
        RewriteEngine On
        RewriteCond %{REQUEST_FILENAME} !-f
        RewriteCond %{REQUEST_FILENAME} !-d
        RewriteRule ^.*$ /index.php [L,NC,QSA]           
    </VirtualHost>

- add this to C:\amp\apache\conf
- replace root paths to match your filesystem

### Example hosts configuration

    127.0.0.1 form-builder.local

- add this to C:\Windows\System32\drivers\etc\hosts
- replace root path to match your filesystem