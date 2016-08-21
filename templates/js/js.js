



    $(".podnyam").each(function(){
        var back = ["#ff0000","blue","gray"];
        var rand = back[Math.floor(Math.random() * back.length)];
        $(this).css("borderLeft","3px solid "+rand+"");
    });
    

    function centering(){
        var height = $("#wrapper").height();
	var height2 = $("#inthecandelik").height();
	$("#inthecandelik").css({marginTop: height/3-height2/2});
    }
    setInterval(centering);
 
 
    var count = $(".count").html();
    if(count==0){
        $(".count").hide();
    }
 
    $(".delete").click(function(){
        var idZapis = $(this).data('id');
        $.ajax({
           url: "delete.php",
           type: "POST",
           data:({id : idZapis}),
           dataType: "html",
        });
        
  
    var lengthZapis = $(".onezapis").length;
       
    if(lengthZapis==1){
        $(".count").hide();
        $(".count").after( "<p class='emptynotification'>Записей пока нет. Исправьте это недоразумение</p>" );
        $(".emptynotification").hide().delay(250).slideDown(250);
        $(".podnyam").hide(200);
    }
        
    $(this).parent().animate({height: "0px",minHeight:"0px",margin:0,opacity: 0},500,'easeInOutCirc');
       
       var count = $(".count").html();
       $(".count").html(count-1);
       
        
       setTimeout(function(){
          $('[data-id='+idZapis+']').parent().remove();
        }, 501);

       
       
       

        
    });
    
   
    
    var pathPhoto = $(".userPhoto").data("photo");
    $(".userPhoto").css("background-image", "url(templates/images/users_ava/"+pathPhoto+")" );
    
    var name = $("input[name=name]").data("name");
    $("input[name=name]").val(name);
    
    var surname = $("input[name=surname]").data("surname");
    if(surname!="Введите вашу фамилию"){
        $("input[name=surname]").val(surname);
    }
    
    $('input[type=submit]').keyup(function(){
    if(event.keyCode==13)
       {
          $(this).click();
          return false;
       }
    })
    
    
