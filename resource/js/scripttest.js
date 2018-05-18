$(document).ready(function(){
    

        $('form').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'get_feedback.php',
            data: $('form').serialize(),
            success: function () {
              //alert('form was submitted');
                $('.form-success').show();
            }
          });

        });

});