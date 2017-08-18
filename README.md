# AJAX implementation with PHP using a secure token

## server.php

```php
<?php
  session_start();
  $token = md5(rand(1000,9999)); //you can use any encryption
  $_SESSION['token'] = $token; //store it as session variable
?>
```
## file.php
```php
<?php
session_start();

if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
	//Request identified as ajax request
	if(@isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']=="http://yourdomain/ajaxurl"){
		//HTTP_REFERER verification
		if($_POST['token'] == $_SESSION['token']) {
			//do your ajax task
			//don't forget to use sql injection prevention here.
		}
		else {
			header('Location: http://yourdomain.com');
		}
	}
	else {
		header('Location: http://yourdomain.com');
	}
}
else {
	header('Location: http://yourdomain.com');
}
?>
```

## script.js
```javascript
var formData = {
	data: $("#data").val(), //your data being sent with ajax
	token:'<?php echo $token; ?>', //used token here.
	is_ajax: 1
};

$.ajax({
	type: "POST",
	url: 'yourajax_url_here',
	data: formData,
	success: function(response){
		//do further
	}
});
```
