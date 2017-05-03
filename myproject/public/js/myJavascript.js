<<<<<<< HEAD
$(document).ready(function() {

    let obj
    let container = document.getElementById("container");
    $.ajax(myURL + "/Nonegag/fetchPosts/" + Top)
                    .done(function(result) {
=======
var loadingPosts = function(){$.ajax(myURL + "/Nonegag/fetchPosts/" + Top)
                    .done(function(result) {
                    	let lowestID =[];
                    	console.log(Top);
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
                        // this will be executed if the ajax-call was successful
                        // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                        obj = jQuery.parseJSON(result);
                        var poster = function(object)
                        {
                            let divid = document.createElement('div');
                            divid.id = object.P_id;
<<<<<<< HEAD
                            divid.className = "postDIV";
=======
                            divid.class = "postDIV";
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
                            let title = document.createElement('h3');
                            title.appendChild(document.createTextNode(object.P_title));
                            divid.appendChild(title);
                            let imageURL = document.createElement('img');
                            imageURL.src = object.P_url;
<<<<<<< HEAD
                            imageURL.width = "640px";
                            imageURL.height = "auto";
=======
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
                            divid.appendChild(imageURL);
                            let votes = document.createElement('span');
                            votes.appendChild(document.createTextNode(object.P_upp + " points"));
                            divid.appendChild(votes);
                            let upvote = document.createElement('div');
<<<<<<< HEAD
                            upvote.className = "upvote";
                            divid.appendChild(upvotes);
                            let downvote = document.createElement('div');
                            downvote.className = "downvote";
                            divid.appendChild(downvotes);
                            let comments = document.createElement('div');
                            comments.className = "comments";
                            divid.appendChild(comments);
=======
                            upvote.class = "upvote";
                            divid.appendChild(upvote);
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
                            return divid;
                        }
                        for (var i = 0; i < obj.length; i++) {
                            container.appendChild(poster(obj[i]));
<<<<<<< HEAD
                        }
=======
                            lowestID.push(obj[i].P_id);
                        }
                        Top=lowestID.min();
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
                    })
                    .fail(function() {
                        // this will be executed if the ajax-call had failed
                    })
                    .always(function() {
                        // this will ALWAYS be executed, regardless if the ajax-call was success or not
<<<<<<< HEAD
                    });

});
=======
                        console.log("fetching posts");
                    });}
$(document).ready(function() {
Array.prototype.min = function() {
  return Math.min.apply(null, this);
};
    let obj
    let container = document.getElementById("container");
    loadingPosts();

});
>>>>>>> 6c59dcac45187ae14dea3c450c7e61204a6411c1
