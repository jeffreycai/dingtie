jQuery(function($){
  // Tigtag user validation
  $('.tigtag .validate a').click(function(event){
    event.preventDefault();
    
    var tr = $(this).parents('tr').first();
    var uid = tr.attr('id').split("_");
    uid = uid[1];

    $(this).hide();
    $('.validate .loading', tr).show();
    
    $.get('/admin/tigtag/user/validate/' + uid, function(data){
      $('.validate a', tr). show();
      $('.validate .loading', tr).hide();
      
      if (data == 'success') {
        $('.isValid i', tr).removeClass('fa-times').addClass('fa-check');
      } else {
        $('.isValid i', tr).removeClass('fa-check').addClass('fa-times');
      }
    });
  });
  
  // Tigtag user deletion
  $('.tigtag .delete a').click(function(event){
    event.preventDefault();
    
    var answer = confirm('Do you want to delete this user?');
    
    if (answer) {
      var tr = $(this).parents('tr').first();
      var uid = tr.attr('id').split("_");
      uid = uid[1];

      $(this).hide();
      $('.delete .loading', tr).show();

      $.get('/admin/tigtag/user/delete/' + uid, function(data){
        $('.delete a', tr). show();
        $('.delete .loading', tr).hide();

        if (data == 'success') {
          tr.fadeOut('slow');
        } else {
          alert('something went wrong.');
        }
      });
    }
  });

});