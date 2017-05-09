var doneLoading = false;
var loadingPosts = function(){$.ajax(myURL + "/Nonegag/fetchPosts/" + Top)
                    .done(function(result) {
                    	let lowestID =[];
                    	console.log(Top);
                        // this will be executed if the ajax-call was successful
                        // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                        obj = jQuery.parseJSON(result);
                        var poster = function(object)
                        {
                            console.log(object);
                            let divid = document.createElement('div');
                            divid.id = object.P_id;
                            divid.className = "postDIV";
                            let title = document.createElement('h3');
                            title.appendChild(document.createTextNode(object.P_title));
                            divid.appendChild(title);
                            let imageURL = document.createElement('img');
                            imageURL.src = object.P_url;
                            divid.appendChild(imageURL);
                            let votes = document.createElement('span');
                            if (object.P_upp==null) {object.P_upp=0};
                            votes.appendChild(document.createTextNode(object.P_upp + " points"));
                            divid.appendChild(votes);

                            let upvote = document.createElement('button');
                            upvote.className = "ui button up";
                            if (object.V_value==1) {upvote.className += " checked";};
                            upvote.appendChild(document.createTextNode("↑"));
                            divid.appendChild(upvote);

                            let downvote = document.createElement('button');
                            downvote.className = "ui button down";
                            if (object.V_value=="-1") {downvote.className += " checked";};
                            downvote.appendChild(document.createTextNode("↓"));
                            divid.appendChild(downvote);

                            let comments = document.createElement('button');
                            comments.className = "ui button comments";
                            comments.appendChild(document.createTextNode("comments"));
                            divid.appendChild(comments);
                            return divid;
                        }
                        for (var i = 0; i < obj.length; i++) {
                            container.appendChild(poster(obj[i]));
                            lowestID.push(obj[i].P_id);
                        }
                        Top=lowestID.min();
                        doneLoading=true;
                    })
                    .fail(function() {
                        // this will be executed if the ajax-call had failed
                    })
                    .always(function() {
                        // this will ALWAYS be executed, regardless if the ajax-call was success or not
                        console.log("fetching posts");
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
    let container = document.getElementById("container");
    loadingPosts();

});
document.addEventListener('scroll', function (event) {
    if (document.body.scrollHeight*0.7 <= document.body.scrollTop + window.innerHeight) {
        if (doneLoading) {doneLoading=false;loadingPosts();console.log("listener í gágn");};
    }
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
    window.location="http://46.101.24.156/Post/privatePost/"+target.parentNode.id;
  };
}

var el = document.getElementById('container'); 
el.addEventListener('click', itemDone, false); 
