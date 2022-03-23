
  $(document).ready(function(){
      //get json format from the endpoint
      $.get("http://localhost/cats/endpoint/global.php",function(response){
          response.forEach((item, i) => {
              setCard(item.Name,item.Description,item.Image, item.ID);
          });
      });
  });

  function setCard(name, description, image, id){
    //write necessary  cat boxes into the html
      let card = '<div class="card"><a href="views/cat.php?id=' + id + '" target="_blank"><img src="./img/' + image + '" alt=""><h4 class="name">' + name + '</h4><div class="description">' + description + '</div></a></div>';
      $('.content').append(card);
  }
