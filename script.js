var form_data = {
  data: $("#data").val(), //your data being sent with ajax
  token:'<?php echo $token; ?>', //used token here.
  is_ajax: 1
};

$.ajax({
  type: "POST",
  url: 'yourajax_url_here',
  data: form_data,
  success: function(response)
  {
    //do further
  }
});
