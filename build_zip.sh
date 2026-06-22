#!/bin/bash
rm -rf deploy_build
mkdir deploy_build
rsync -av --exclude 'node_modules' --exclude '.git' --exclude 'deploy_build' --exclude 'siap_upload.zip' --exclude 'build_zip.sh' --exclude 'database/database.sqlite' --exclude '.env' ./ deploy_build/

cd deploy_build
mv public/* .
mv public/.htaccess . 2>/dev/null
rmdir public

# Ubah index.php agar sesuai dengan shared hosting
sed -i.bak "s|require __DIR__.'/../vendor/autoload.php';|require __DIR__.'/vendor/autoload.php';|g" index.php
sed -i.bak "s|require_once __DIR__.'/../bootstrap/app.php';|require_once __DIR__.'/bootstrap/app.php';|g" index.php

# Beritahu Laravel bahwa folder public adalah root directory saat di shared hosting
sed -i.bak "/\$app = require_once/a\\
\$app->usePublicPath(__DIR__);
" index.php

rm index.php.bak

# Buat .htaccess yang super lengkap dan aman
cat << 'EOF' > .htaccess
# 1. BLOKIR AKSES KE FILE PENTING (KEAMANAN)
<FilesMatch "(\.env|\.sqlite|laravel\.log)$">
    Order allow,deny
    Deny from all
</FilesMatch>

<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteRule ^(database|storage|vendor|bootstrap|config|resources|routes)/.* - [F,L,NC]
</IfModule>

# 2. PENGATURAN ROUTING MENU LARAVEL
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Handle X-XSRF-Token Header
    RewriteCond %{HTTP:x-xsrf-token} .
    RewriteRule .* - [E=HTTP_X_XSRF_TOKEN:%{HTTP:X-XSRF-Token}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
EOF

# Bungkus menjadi file ZIP baru
zip -r ../starconnect_final.zip .
cd ..
rm -rf deploy_build
echo "======================================"
echo "SUKSES! File starconnect_final.zip siap diupload."
echo "======================================"
