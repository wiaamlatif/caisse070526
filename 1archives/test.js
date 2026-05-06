/*
// Storing an object
const user = { name: "Alice", theme: "dark" };
localStorage.setItem('userProfile', JSON.stringify(user));

// Retrieving and parsing the object
const savedUser = JSON.parse(localStorage.getItem('userProfile'));
console.log(savedUser.name); // Al
*/

function testLoad(){
//  alert(idTicket);

  var xhr = new XMLHttpRequest();

  xhr.open('GET','testLoad.php',true);

  xhr.onload = function() {

    if(xhr.status==200){

    var  data =  JSON.parse(this.response);

   // console.log(data)
  

   // alert(localStorage.getItem('display'))     

  var idStartEl = document.getElementById("idStart");
  
  var display = JSON.parse(localStorage.getItem('display')); 
 
   console.log(typeof(display));

   if(display){
    idStartEl.innerHTML=`
                          <p class="text text-danger fs-1">START</p>
                        `;
   } else{
    idStartEl.innerHTML=``;
   }
   
  
    }//status==200    

  }

  xhr.send()
 
}//deleteTicket

function display_ON(){
    localStorage.removeItem("display");
    localStorage.setItem('display',true); 
    window.location.href = "test.php";
}

function display_OFF(){
    localStorage.removeItem("display");
    localStorage.setItem('display',false);
    window.location.href = "test.php";
}
