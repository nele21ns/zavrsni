function myFunction() {

        var x = document.getElementsByClassName("comments-li")
        var elem = document.getElementsByClassName("btn")[0];
        
        if (elem.innerText == "Hide Comments") { 
            elem.innerText = "Show Comments";
            var x = document.getElementsByClassName("comments-li");
            var i;
            for (i = 0; i < x.length; i++) {
            x[i].classList.add("hidden-comment");
            }}
        else { elem.innerText = "Hide Comments";
            var x = document.getElementsByClassName("comments-li");
            var i;
            for (i = 0; i < x.length; i++) {
            x[i].classList.remove("hidden-comment");
        };
        }}

        
       