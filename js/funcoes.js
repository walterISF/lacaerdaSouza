$('#btnContato').click(function() {

  var nome = $('input[name="name"]').val();
  var email = $('input[name="email"]').val();
  var message = $('input[name="message"]').val();


  $.ajax({
    url: 'contact.php',
    type: 'POST',
    data: {
      name:nome,
      email:email,
      message:message
    },
    success: function(data){
      console.log(data);
    },
    error: function(XHTMLrequest, errorThrown, textStatus){
      console.log('erro');
    },
    async: false,
        }).responseText;

});