# Request certificates using POST method (Wordpress)
1) Duplicate your page.php or post.php file (core file);  
2) Rename it, i. e., certificate-template.php;  
3) Insert the php code (https://github.com/bacciotti/webhosting/blob/master/cides/request_certificate.php);  
4) Create a page/post with the template defined on item 2 above;  
5) Insert the html form code (https://github.com/bacciotti/webhosting/blob/master/cides/request_certificate.html).  


## User stories 

### Final user
1) Access URL
2) Insert ID number
3) Download doc or gets warning message (if doc doesn't exist)

### Editor
1) Change the doc name to the User ID (used in subscription)
2) Send to Admin or Upload by WP Media Uploader

### Admin
1) Receive document by e-mail
1.1) If the doc name is User ID, Admin uploads doc by WP Media Uploader
1.2) If the doc name is'nt User ID, Admin renames doc name to User Id and upload doc by WP Media Uploader

### System
1) Encrypt ID received by POST/GET (first layer)
2) Requests doc url to media library database (posr/post_meta) by encrypted ID (search by upload date)
2.1) If file exists: creates download html code (anchor w/ doc URL)
2.2) If file doesn't exist: warns user
