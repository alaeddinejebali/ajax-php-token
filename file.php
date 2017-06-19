session_start(); //most of people forget this while copy pasting code ;)
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
  //Request identified as ajax request

  if(@isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER']=="http://yourdomain/ajaxurl")
  {
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
