var loadingComments = function(){$.ajax(myURL + "/Post/fetchComments/" + PostId)
                    .done(function(result) {
                    	let lowestID =[];
                        // this will be executed if the ajax-call was successful
                        // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                        obj = jQuery.parseJSON(result);
                        var poster = function(object)
                        {
                            console.log(object);
                            let divid = document.createElement('div');
                            divid.id = object.P_id;
                            divid.className = "postComment";
                            let Commentor = document.createElement('h3');
                            Commentor.appendChild(document.createTextNode(object.U_name));
                            divid.appendChild(Commentor);
                            /*let imageURL = document.createElement('img');     //ekki notað nema profile pic verður bætt við
                            imageURL.src = object.P_url;
                            divid.appendChild(imageURL);*/
                            let text = document.createElement('span');
                            text.appendChild(document.createTextNode(object.C_txt));
                            divid.appendChild(text);

                            //replay thing með ajax

                            return divid;
                        }
                        let container = document.getElementById("comments");
                        for (var i = 0; i < obj.length; i++) {
                            container.appendChild(poster(obj[i]));
                            lowestID.push(obj[i].P_id);
                        }
                        Top=lowestID.min();
                    })
                    .fail(function() {
                        
                    })
                    .always(function() {
                        
                    });};

var voting = function(id, operation){$.ajax(myURL + "/Nonegag/vote/" + id +"Y"+operation)
                    .done(function(result) {
                                                
                    })
                    .fail(function() {
                        console.log("shit");
                    })
                    .always(function() {
                        console.log("voted");
                        console.log(myURL + "/Nonegag/vote/" + id +"Y"+operation);
                    });};



$(document).ready(function() {
Array.prototype.min = function() {
  return Math.min.apply(null, this);
};
    let obj;
    let container = document.getElementById("comments");
    loadingComments();

});
Array.prototype.contains = function(something){
    for(let i =0;i<this.length;i++)
    {
        if(this[i]==something)
        {
            return true;
        }
    }
    return false;
};
var lastShit;
function itemDone(e) {                           
  e.preventDefault(); 
  var target;
  let pointShift = 0;
  target = e.target;
  lastShit=target;
  if ( target.classList.contains("up")) 
  {  
    if (target.classList.contains("checked")) //delete vote
    {
        target.className = "ui button up";
        voting(target.parentNode.id, "delete");
        pointShift=-1;
    }
    else if (target.parentNode.children[4].classList.contains("checked")) //update
    {
        target.className += " checked";
        voting(target.parentNode.id, "updateGoo");
        target.parentNode.children[4].className = "ui button down";
        pointShift=2;
    }
    else{
        target.className += " checked";
        voting(target.parentNode.id, "createGoo");
        pointShift=1;
    }
    target.parentNode.children[2].textContent=(parseInt(target.parentNode.children[2].textContent.split(' ')[0])+pointShift).toString()+ " points";
  }
  else if ( target.classList.contains("down") ) 
  {
    if (target.classList.contains("checked")) //delete vote
    {
        target.className = "ui button down";
        voting(target.parentNode.id, "delete");
        pointShift=1;
    }
    else if (target.parentNode.children[3].classList.contains("checked")) //update
    {
        target.className += " checked";
        voting(target.parentNode.id, "updateBad");//create
        target.parentNode.children[3].className = "ui button up";
        pointShift=-2;
    }
    else{
        target.className += " checked";
        voting(target.parentNode.id, "createBad");
        pointShift=-1;
    }
    target.parentNode.children[2].textContent=(parseInt(target.parentNode.children[2].textContent.split(' ')[0])+pointShift).toString()+ " points";
  }
  else if (target.classList.contains("comments")) //comments
  {
    window.location="http://46.101.24.156/Nonegag/privatePost/"+target.parentNode.id;
  };
}

var el = document.getElementById('thePost'); 
el.addEventListener('click', itemDone, false); 

var comment_form = document.getElementById('commentForm');//þetta er takkin eða eithvað
$("#commentForm").submit(function(event) {

/* stop form from submitting normally */
event.preventDefault();

/* get the action attribute from the <form action=""> element */
var $form = $( this ),
    url = $form.attr( 'action' );

var posting = $.post( url, { comment: $('#comment').val(), postID: PostId } );

/* Alerts the results */
posting.done(function( data ) {
    
    });
});