$(document).ready(function(){
    $(".approve").click(function(){
        var ID = this.parentElement.parentElement.getElementsByTagName("td")[0].innerText;
      $.post("../inc/approv_dec.php",
      {
        Decission: "approuve",
        ID: ID
        
      },
      function(data,status){
        Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Approuvé',
            showConfirmButton: false,
            timer: 1500
          }).then(function(){
            window.location.href="demandes.php";
        })
      });
    });

    $(".decline").click(function(){
        var ID = this.parentElement.parentElement.getElementsByTagName("td")[0].innerText;
        $.post("../inc/approv_dec.php",
        {
            Decission: "decline",
            ID: ID
        },
        function(data,status){
            Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Refusé',
                showConfirmButton: false,
                timer: 1500
              }).then(function(){
                  window.location.href="demandes.php";
              })
        });
      });

  });