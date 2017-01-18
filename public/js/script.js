$("div.optionButtons").click(function(){
	var y = $(this).css("background-color");
	$(this).parent().parent().parent().css("background-color", y);
	$(this).parent().find(".optionButtons").css("border", "");
	var x = "3px solid white";
	$(this).css("border",x);
});


$(".card").hover(function(){
	$(this).find("div.optionButtons").css('cursor','pointer');
	$(this).find("div.lowerOptions").animate({ height: 'toggle',opacity: 'toggle'});
});

function changeColor(_id, _color){
	$.ajax({
      url: 'change_color.php',
      type: 'PUT',
      data: JSON.stringify({ id: _id, color : _color}),
      contentType: 'application/json; charset=utf-8',
      success: function(response){
          // alert("success!");
      },
      error: function(){
          // alert("Something went wrong!");
      }
  });
}

$(".optionButtons").click(function(){
  var id = $(this).parent()[0].id;
  var color = $(this).css('background-color');
  
  changeColor(id, color);
});