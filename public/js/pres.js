    // Sauvegarde l'élément 'id "vote" dans une variable.
    var $vote = $('#vote_1');

    // Détection quand on clique sur le bouton like (bouton dont la classe est "vote_like" et on ne le cherche que dans notre élément "$vote".
    $('.vote_like').click(function(e) {
        let $span = $(this).find("span");
        let $val = parseInt($span.text()) + 1;
         $span.val($val);
         $span.html($val);
    });

    // Détection quand on clique sur le bouton dislike (bouton dont la classe est "vote_dislike" et on ne le cherche que dans notre élément "$vote".
    $('.vote_dislike').click(function(e) {
        let $span = $(this).find("span");
        let $val = parseInt($span.text()) + 1;
         $span.val($val);
         $span.html($val);
    });

  getRegistered = (elem)=>{
  //do ajax to set var nbr
  let nbr = + 1;
  let numberContainer = $(elem).parents().find("article.event").find(".number")
  $(numberContainer).css({opacity: 0});
  setTimeout(()=>{
    $(elem).parents().find("article.event").find(".number").html(nbr);
    $(numberContainer).css({opacity: 1});
  }, 300);
}

switchButton = (elem)=>{
  if ($(elem).parent().find("button").length == 2)
  {
    $(elem).parent().find("button."+( ($(elem).hasClass("join") ? "decline" : "join") )).remove();
  }
  $(elem).html("");
  $(elem).html(($(elem).hasClass("join")) ? "Décliner" : "Rejoindre");
  $(elem).toggleClass("decline");
  $(elem).toggleClass("join");
}

doneLoading = (elem)=>{
  $(elem).html("");
  $(elem).append($("<img src=\"https://img.icons8.com/color/2x/ok.png\" alt=\"loading\" class=\"loader\"/>"));
  setTimeout(()=>{
    getRegistered(elem);
    switchButton(elem);
  }, 1000);
}

sendDecline = (elem)=>{
  $(elem).html("");
  $(elem).append($("<img src=\"https://loading.io/spinners/rolling/index.curve-bars-loading-indicator.svg\" alt=\"loading\" class=\"loader\"/>"));
  setTimeout(()=>{ //TO REPLACE WITH AJAX DECLINE
    doneLoading(elem);
  }, 2000); //TO REMOVE
}

sendJoin = (elem)=>{
  $(elem).html("");
  $(elem).append($("<img src=\"https://loading.io/spinners/rolling/index.curve-bars-loading-indicator.svg\" alt=\"loading\" class=\"loader\"/>"));
  setTimeout(()=>{ //TO REPLACE WITH AJAX REGISTER
    doneLoading(elem);
  }, 2000); //TO REMOVE
}

$(document).ready(() =>
{
  $(".event button").click((e) => 
  {
    e.preventDefault();
    e.stopPropagation();
    if ($(e.currentTarget).hasClass("join"))
      sendJoin(e.currentTarget);
    else
    sendDecline(e.currentTarget);
  });
});