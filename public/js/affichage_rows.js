window.onload=(()=> {

  var button = new Array();

  for(i=0 ; i<=4 ; i++) {
    button.push(document.getElementById("button"+i));
  }
button.forEach((element,index) => {
  element.addEventListener("click",(ev)=> {
    ev.preventDefault();
    ev.target.id=index;

      document.getElementById("slot"+index).style.display="block";
      element.className += " active";

        for(j=0 ; j<=4 ; j++) {
        if(j!=index) {
            document.getElementById("slot"+j).style.display="none";
            button[j].className = button[j].className.replace(" active", "");
        }
      }

    })

  })

})
