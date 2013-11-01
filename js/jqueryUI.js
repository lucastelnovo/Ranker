$(function() {
    var name = $( "#name" ),
      email = $( "#email" ),
      password = $( "#password" ),
      allFields = $( [] ).add( name ).add( email ).add( password ),
      tips = $( ".validateTips" );
 
    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }
 
    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Length of " + n + " must be between " +
          min + " and " + max + "." );
        return false;
      } else {
        return true;
      }
    }

    function insertDataActualizacion(){
      var now = new Date();
      now.format("dd/M/yy h:mm tt");
      $('#fechaActualizacion').append(now);
    }
 
    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }

    function validatePassword(pass){
      

          $.ajax({
          type: "POST",
          data: {pass: pass},
          cache: false,
            url: 'check.php',
            success: function(data){
             
             if(data == 1){
             new Messi('El ranking de ping-pong ha sido actualizado.', {title: 'Ranking actualizado', titleClass: 'success', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});         
             insertDataActualizacion();
             }
             else{
             new Messi('La contraseña es incorrecta. No ha sido posible actualizar el ranking.', {title: 'Error en actualización', titleClass: 'anim error', buttons: [{id: 0, label: 'Cerrar', val: 'X'}]});
           }
            }
          });

    }
 
    $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 300,
      width: 350,
      modal: true,
      buttons: {
        "Actualizar": function() {
          var bValid = true;
          allFields.removeClass( "ui-state-error" );
 
          
          if ( bValid ) {
            $( "#users tbody" ).append( "<tr>" +
              "<td>" + password.val() + "</td>" +
            "</tr>" );
            }

          var pass = password.val();
          

          validatePassword(pass);           
          
        },
      },
      close: function() {
        allFields.val( "" ).removeClass( "ui-state-error" );
      }
    });
 
    $( "#create-user" )
      .button()
      .click(function() {
        $( "#dialog-form" ).dialog( "open" );
      });
  });