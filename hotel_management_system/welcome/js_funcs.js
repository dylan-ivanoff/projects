
function dropdown_default() {
  //alert("You pressed a key inside the input field");

  document.querySelector('#hotels').querySelector('#empty').selected = 'selected';

}



function select_chosen(){
	if(document.getElementById('hotels').value != "none") {
     document.getElementById('nhotel').value="";
     //alert("You pressed a key inside the input field");
}
}
