# 配置nginx
```
server {
    server_name blog.yousail.com;
    set $root_path /media/sf_MyProject/yousail/public;
    root $root_path;

    index index.php index.html index.htm;

    try_files $uri $uri/ /index.php?$query_string;
    error_log  /home/work/software/nginx/logs/error.log;

    #log_format postdata $request_body;
    #access_log /home/work/software/nginx/logs/postdata.log postdata;

    location ~ \.php {

        fastcgi_pass 127.0.0.1:9000;
        fastcgi_index /index.php;

        fastcgi_split_path_info       ^(.+\.php)(/.+)$;
        fastcgi_param PATH_INFO       $fastcgi_path_info;
        fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include                       fastcgi_params;
    }

    location ~* ^/(css|img|js|storage|flv|swf|download)/(.+)$ {
        root $root_path;
    }

    location ~ /\.ht {
        deny all;
    }
}
```