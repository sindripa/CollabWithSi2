$(document).ready(function() {

    let obj
    let container = document.getElementById("container");
    $.ajax(url + "/Nonegag/fetchPosts/" + Top)
                    .done(function(result) {
                        // this will be executed if the ajax-call was successful
                        // here we get the feedback from the ajax-call (result) and show it in #javascript-ajax-result-box
                        obj = jQuery.parseJSON(result);
                        var poster = function(object)
                        {
                            let divid = document.createElement('div');
                            divid.id = object.P_id;
                            divid.class = "postDIV";
                            let title = document.createElement('h3');
                            title.appendChild(document.createTextNode(object.P_title));
                            divid.appendChild(title);
                            let imageURL = document.createElement('img');
                            imageURL.src = object.P_url;
                            divid.appendChild(imageURL);
                            let votes = document.createElement('span');
                            votes.appendChild(document.createTextNode(object.P_upp + " points"));
                            divid.appendChild(votes);
                            let upvote = document.createElement('div');
                            upvote.class = "upvote";
                            divid.appendChild(upvotes);
                            return divid;
                        }
                        for (var i = 0; i < obj.length; i++) {
                            container.appendChild(poster(obj[i]));
                        }
                    })
                    .fail(function() {
                        // this will be executed if the ajax-call had failed
                    })
                    .always(function() {
                        // this will ALWAYS be executed, regardless if the ajax-call was success or not
                    });

});