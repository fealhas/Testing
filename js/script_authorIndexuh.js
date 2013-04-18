/*
dictionary
*/

function saveUpdateForm(){
    $('#save_update').attr('class','notif success');
    $('#save_update').fadeOut(3000,function(){$(this).remove();});
}

function saveUpdateDictForm(){
    $('#save_update_dict').attr('class','notif success');
    $('#save_update_dict').fadeOut(3000,function(){$(this).attr('class','hidden');});
}

$(function($){
        
  $('body').delegate('.dict_elem','click',
	     function(){
	        $.ajax({
		'url':'/author_index/dictionary/view/id/'+$(this).parent().attr('id'),
		'cache' : false,
		'success' : function(html){$("#dictionary_content").replaceWith(html)}
		});
	     }
  );
  
  $('body').delegate('.dict_rem','click',
	     function(){
	        $.ajax({
		'url':'/author_index/dictionary/delete/id/'+$(this).parent().attr('id'),
		'cache' : false,
		'success' : function(html){$("#dictionary_tree").replaceWith(html)}
		});
	     }
  );
  
  $('body').delegate('.record','dblclick',
		     function(){
		      var id = $(this).children().first().text();
		      viewRecord(id);
		      $("#auth_index").click();
		     }
  );
});

function addInput()
{
  var id = $('.word').last().attr('id');
  id++;
  if (isNaN(id))
    id=0;
    
  $("div[id=values]").append('<div id="'+id+'" class="word"><input size="30" name="Dictionary[values]['+id+']"\
			     id="Dictionary_values_'+id+'" type="text">\
			     <input type="button" value="-" onClick="removeInput('+id+');">\
			     </div>');
}

function removeInput(id)
{
	$("div[id="+id+"]").remove();
}

function saveDict(){
    var id  = $('#cur_dict').val();
  $.ajax({
    'type':'POST',
    'url':'/author_index/dictionary/update/id/'+id,
    'cache':false,
    'data':$("#dictionary_constructor form").serialize(),
    'success': function() {saveUpdateDictForm();}
    });
}

function createDict(isNewDict){
  if (isNewDict===true){
    data = null;
    selector = '#dictionary_content'
  }
  else{
    data = $("form").serialize();
    selector = '#dictionary_tree';
  }
    $.ajax({
    'type':'POST',
    'url':'/author_index/dictionary/create',
    'cache':false,
    'data': data,
    'success' : function(html){$(selector).first().replaceWith(html); if (!isNewDict) saveUpdateDictForm();}
    });
}

function removeDict(){
  var id  = $('#cur_dict').val();
  $.ajax({
    'type':'POST',
    'url':'/author_index/dictionary/delete/id/'+id,
    'cache':false,
    'data':$("form").serialize()
    });
}

/*
 author index
*/
function viewPrev (){
  var id  = $('#cur_record').val();
  $.ajax({
    'url':'/author_index/authorIndex/prevRec/id/'+id,
    'cache' : false,
    'success' : function(html){$(".archiv_viewer").replaceWith(html)}
  });
}

function viewNext (){
  var id  = $('#cur_record').val();
  $.ajax({
    'url':'/author_index/authorIndex/nextRec/id/'+id,
    'cache' : false,
    'success' : function(html){$(".archiv_viewer").replaceWith(html)}
  });
}

function viewRecord (id)
{
  $.ajax({
    'url':'/author_index/authorIndex/view/id/'+id,
    'cache' : false,
    'success' : function(html){
      $(".archiv_viewer").replaceWith(html);
    }
  });
}

function removeRecord(){
  var id  = $('#cur_record').val();
  $.ajax({
    'url':'/author_index/authorIndex/delete/id/'+id,
    'cache' : false,
    'success' : function(html){$(".archiv_viewer").replaceWith(html)}
  });
}

function saveRecord(){
  var id  = $('#cur_record').val();
  $.ajax({
    'type':'POST',
    'url':'/author_index/authorIndex/update/id/'+id,
    'cache':false,
    'data':$("#author_index form").serialize(),
    'success':function(){saveUpdateForm();}
    });
}

function createRecord(){
$.ajax({
  'type':'POST',
  'url':'/author_index/authorIndex/create',
  'cache':false,
  'data':$("#author_index form").serialize(),
  'success':function(html){$(".archiv_viewer").replaceWith(html); //saveUpdateForm();
  }
  });
}

function search (){
  $.ajax({
  'type':'POST',
  'url':'/author_index/authorIndex/search',
  'cache':false,
  'data':$(".wide form").serialize(),
  'success':function(html){
    $("#results").replaceWith(html);
    $("#search_res").click();
  }
  });
}



