
  $(document).ready(function(){
      //take url and identify id parameter
      let id = window.location.href.split('?id=');
      //it sends id parameter to get the information
      $.get("http://localhost/cats/endpoint/cat.php?id=" + id[1],function(response){
          setInfo(response[0].Name, response[0].Description, response[0].Image);
      });
  });

  function setInfo(name, description, image){
      //write cat box information
      let card = '<div class="card"><img src="../img/' + image + '" alt=""><p class="description">' + description + '</p></div>';
      $('.content').append(card);
      $('.name').append('My name is ' + name);
  }
