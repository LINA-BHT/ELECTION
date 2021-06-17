
function validate(){

    var pseudo =document.getElementById("pseudo").value;
   
    var mdp =document.getElementById("mdp").value;
    //let age =document.getElementById("age").value;
    if(pseudo.length==0){
        document.getElementById("err").innerHTML="entre un pseudo avec aux moin 3 caracteres";
        return false;
}
else if(pseudo.length>20){
  document.getElementById("errpseudo").innerHTML="pseudo ne depasse pas 20 caracteres";
  return false;
}
else if(pseudo.length>20){
  document.getElementById("errpseudo").innerHTML="pseudo ne depasse pas 20 caracteres";
  let navigMasquer= document.getElementsByClassName="masquer";
  navigMasquer.style.display = "block";
  return false;
}

else{
  afficherlesnav();
  




}
}


  

function afficherlesnav(){ 
  var nav = document.getElementsByClassName("masquer"); 
  nav.style.display = "block";
  document.getElementsByClassName("masquer");
  
  
};
