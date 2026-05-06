function startTime() {
  const today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();  
  m = checkTime(m);
  s = checkTime(s);

  var myTime = h + ':' + m + ':' + s;
  
  document.getElementById('displayTime').innerHTML = myTime;
  setTimeout(startTime, 1000);
}//startTime

function checkTime(i) {
  if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
  return i;
}//checkTime

function ajouterTicket(){

  var xhr = new XMLHttpRequest();

  xhr.open('GET','iniTicket.php',true)

  xhr.onload = function() {

    if(xhr.status==200){

      var  data = JSON.parse(this.response);

      //console.log(data);
      
      displayHeadsTickets(data.idEmployee);
      editTicket(data.idTicket);
      
    }
  }

  xhr.send()
  
}//ajouterTicket

function deleteTicket(idTicket){
//  alert(idTicket);

  var xhr = new XMLHttpRequest();

  xhr.open('GET','deleteTicket.php?idTicket='+idTicket,true);

  xhr.onload = function() {

    if(xhr.status==200){

    var  data =  JSON.parse(this.response);

  //  console.log(data)

    displayHeadsTickets(data)

    }//status==200    

  }

  xhr.send()
 
}//deleteTicket

function pickProduct(idProduct){
  //alert(idProduct);

  // Add one line on the table lignes_ticket with quantity=1 (pickProduct.php)
 
  var xhr = new XMLHttpRequest();

  xhr.open('GET','http://localhost:8000/front/product/pickProduct.php',true);

  xhr.onload = function() {

    if(xhr.status==200){

    var  data =  JSON.parse(this.response);

    //data bring the id Ticket where the product will be added
    console.log(data);
     
    displayHeadsTickets(data.idUser);   
    editTicket(data.currentIdTicket);
    
    }//status==200

  }//function

  xhr.send();
  
  
}//pickProduct


function getQuantity(idLigneTicket,plusMinus){

 // console.log(idLigneTicket);
 // console.log(typeof(plusMinus));

  //Get quantity from lignes_ticket   
  //=====================================
  var xhr = new XMLHttpRequest();
    
  xhr.open('GET','http://localhost:8000/front/product/getQuantity.php?idLigneTicket='+idLigneTicket+'&plusMinus='+plusMinus,true);

  xhr.onload = function() {

   if(xhr.status==200){

    var  data =  JSON.parse(this.response);
    
    console.log(data);
    console.log("idUser   :"+data.idUser);
    console.log("idTicket :"+data.idTicket);
   
    displayHeadsTickets(data.idUser);
    editTicket(data.idTicket);
        
   }//status==200 
    

  }//xhr.onload 

  xhr.send();
   
  }//getQuantity
  

function deleteItemTicket(idLigneTicket){

  var xhr = new XMLHttpRequest();

  xhr.open('GET','deleteItemTicket.php?idLigneTicket='+idLigneTicket,true);

  xhr.onload = function() {

    if(xhr.status==200){

      var  data =  JSON.parse(this.response);

      //idTicket
     // console.log(data);

      displayHeadsTickets(data.idEmployee);    
      editTicket(data.idTicket);

    }//status==200
  
  }//xhr.onload 

  xhr.send();

}//deleteItemTicket


function deleteItemsTicket(idTicket){

  var xhr = new XMLHttpRequest();
  
  xhr.open('GET','deleteItemsTicket.php?idTicket='+idTicket,true);

  xhr.onload = function() {

    if(xhr.status==200){

      var  data =  JSON.parse(this.response);
      
      console.log(data);

      displayHeadsTickets(data.idEmployee);
      editTicket(idTicket)

    }//status==200
  
  }//xhr.onload 

  xhr.send();

} //deleteItemsTicket


function editTicket(idTicket){
 
  var xhr = new XMLHttpRequest();

 // xhr.open('GET','/front/product/editTicket.php?idTicket='+idTicket,true);
  xhr.open('GET','editTicket.php?idTicket='+idTicket,true);

  xhr.onload = function() {

    if(xhr.status==200){
     
      var  data =  JSON.parse(this.response);

      console.log(data);
            
        //============( Head ticket )================================

        // The object data1 is the last element of the array data
        var data1 = data.slice(-1); 
      
        console.log(data1[0]);

        var idUser = data1[0].idUser;
                
        var nrTicket = data1[0].nrTicket;
         
        var totalTicket = data1[0].totalTicket; 
        
        var oldIdTicket =  data1[0].oldIdTicket;
        var oldIdTicketEl = document.getElementById('trHeadTicket'+oldIdTicket);
        if(oldIdTicketEl!=null){oldIdTicketEl.classList.remove('table-info');}
        
        var idTicketEl = document.getElementById('trHeadTicket'+idTicket);
        if(idTicketEl!=null){idTicketEl.classList.add('table-info');} 

        var HeadTicket=`
        <tr>
            <th class="border border-dark"colspan="3" height="">              
            <span>Ticket Nr:<span class="badge text-bg-dark">`+nrTicket+`</span></span>
            </th>
            <th class="border border-dark" colspan="3" height=""> 
            <span class='fs-5'>Total ticket :<span class="badge text-bg-dark fs-5">`+totalTicket+`</span></span>
            </th>
        </tr>
        <tr><!-- table row--->           
            <th>idLnTk</th>          
            <th>imgSrc</th>          
            <th class="fs-6">Product</th>          
            <th>Quantite</th> 
            <th>Prix</th> 
            <th>Total</th>                             
        </tr>                        
                       `;                        

                                                        
        var showHeadTicketEl = document.getElementById('showHeadTicket'); 
        
        if(showHeadTicketEl!=null){
          showHeadTicketEl.innerHTML=HeadTicket; 
        }
                      
        //============( Detail ticket )================================

        var data = data.slice(0,-1);
        
        var showDetailTicketEl = document.getElementById('showDetailTicket'); 
        
        if(showDetailTicketEl!=null){
          showDetailTicketEl.innerHTML=""; 
        }

        if (data.length > 0) {
                    
          data.forEach(element => {
                  
          //  console.log(element.id_ticket);  

          var idLigneTicket=element.id_ligne_ticket
          var idProduct=element.id_product     
          var imgSrc = element.imgSrc

          if(imgSrc===""){
            imgSrc = "default_product.png";
          }

          var nameProduct=element.name_product
          var quantity = element.quantity
          var price = element.price
          var totalItem = element.totalItem   
                    
          var datailTicket=`<tr id="trDetailTicket`+idLigneTicket+`" class="border border-dark fw-bold">
                              <div class="container">

                                <td>`+idLigneTicket+`</td>

                                <td id="imgProduct">            
                                 <img class="img img-fluid imgProduct" src="http://localhost:8000/uploads/products/`+imgSrc+`" width="50px" onclick="selectProduct(`+idProduct+`)">
                                </td>

                                <td class="text text-danger text-nowrap fw-bold h6 fs-6 w-25"><span>`+nameProduct+`</span></td>

                                <td><!---Quantity------> 
                    
                                <div class="d-flex border-top border-bottom border-dark">
                                    <button id="supItemCart`+idLigneTicket+`" class="supItemCart btn btn-danger btn-sm"
                                    onclick="deleteItemTicket(`+idLigneTicket+`)">
                                    <i class="fa-solid fa-trash-can"></i>
                                    </button>               
                                    <button id="decrementQuantity`+idLigneTicket+`" class="decrementQuantity btn btn-primary"
                                    onclick="getQuantity(`+idLigneTicket+`,`+0+`)">
                                    -
                                    </button>
                                    <span id="quantity`+idLigneTicket+`" class="quantity">`+quantity+`</span>
                                    <button id="incrementQuantity`+idLigneTicket+`" class="incrementQuantity btn btn-primary"
                                    onclick="getQuantity(`+idLigneTicket+`,`+1+`)">
                                    +
                                    </button> 
                                  </div>
                                </td>

                                <td>`+price+`</td>

                                <td>`+totalItem+`</td>
                              </div>
                            </tr>`; 
                                
            var showDetailTicketEl = document.getElementById('showDetailTicket'); 

            if(showDetailTicketEl!=null){
              showDetailTicketEl.innerHTML+=datailTicket
            }
          
          });//forEach          

        } //if (data.length > 0) {

//============( Foot ticket )================================        
        
        var lastIdInserted = data1[0].lastIdInserted;

        if(lastIdInserted>0) {

          var trDetailTicketEl = document.getElementById('trDetailTicket'+lastIdInserted);
          if(trDetailTicketEl!=null){trDetailTicketEl.classList.add('table-success');} 

        } else {

          var idLineSelected = data1[0].idLineSelected;
          var trDetailTicketEl = document.getElementById('trDetailTicket'+idLineSelected);
          if(trDetailTicketEl!=null){trDetailTicketEl.classList.add('table-danger');} 

        }
        
        var footTicket = `
                          <tr>  
                            <td colspan="4"></td>
                            <td><strong>Total</strong></td>
                            <td><strong id="totalFootTicket">`+totalTicket+`</strong></td>
                          </tr>    
                          <tr>                                                                                                                            
                            <td colspan="6">
                            <div class="d-flex justify-content-center">                                               
                              <button class="vider btn btn-danger rounded-pill mx-1"  onclick="deleteItemsTicket(`+idTicket+`)" >Vider</button>
                              <a      class="print btn btn-success rounded-pill mx-1" href="http://localhost:8000/print/tablePrintTicket.php?idTicket=`+idTicket+`">Ticket</a>
                            </div>                       
                            </td>                                 
                          </tr>    
                         `;

        var showFootTicketEl=document.getElementById('showFootTicket');
        if(showFootTicketEl!=null){
          showFootTicketEl.innerHTML=footTicket;           
        }
               
    }//status==200

  }//xhr.onload 

  xhr.send();

}//editTicket

function printTicket(idTicket){

  var xhr = new XMLHttpRequest();
  
  xhr.open('GET','loadDataTicket.php?idTicket='+idTicket,true);

  xhr.onload = function() {

    if(xhr.status==200){

      var  data =  JSON.parse(this.response);

      console.log(data);

      // The object data1 is the last element of the array data
      var data1 = data.slice(-1);

      console.log(data1);

      var   idVendeur = data1[0].idVendeur;
      var nameVendeur = data1[0].nameVendeur;
      var totalTicket = data1[0].totalTicket;
      var nrTicket    = data1[0].nrTicket;

      document.getElementById('showHeadTicket').innerHTML="";
                               
      var headTicket=`
                      <div class="lh-1">
                        <span class="fst-italic fw-bold fs-4">CAFE LA PASSERELLE</span>
                        <br>
                        <span class="fw-semibold fs-6">En face clinique Badr - Bourgogne</span>
                        <br>
                        <span class="fw-semibold fs-6">Casablanca</span>
                        <br>
                        <span class="fw-semibold fs-6">Tel: 05.29.53.91.82</span>
                        <br>
                        <span>───────────</span>
                        <br>
                        <span class="text text-nowrap fs-6 fw-semibold">Vendeur:<span class="text text-nowrap fs-6 fw-semibold"> `+idVendeur+`</span> <span class="text text-nowrap fs-6 fw-semibold">─</span><span class="text text-nowrap fs-6 fw-semibold"> `+nameVendeur+`</span></span>
                        <br>
                        <span>───────────</span>                        
                      </div>
                      `;

      document.getElementById('showHeadTicket').innerHTML+=headTicket;

      //============( Detail ticket )================================

      document.getElementById('showDetailTicket').innerHTML="";   
              
      var data = data.slice(0,-1);
      
      if (data.length > 0) {
                    
        data.forEach(element => {
                  
          var nameProduct=element.name_product
          var quantity = element.quantity
          var price = element.price
          var totalItem = element.totalItem   
                    
          var datailTicket=`
                            <tr class="text justify-content-start w-100">
                                
                                <td class="text text-end  fs-6 p-2"><span style="font-size:14px;">`+parseInt(quantity).toFixed(0)+`</span><span style="font-size:12px;">X</span><span style="font-size:12px;">`+parseInt(price).toFixed(2)+`</span></td>

                                <td class="text text-start fs-6 p-2"><span style="font-size:14px;">`+nameProduct+`</span></td>

                                <td class="text text-start fs-6 p-2"><span style="font-size:14px;">`+totalItem.toFixed(2)+`</span></td>
                            </tr>
                            `; 

                                
         document.getElementById('showDetailTicket').innerHTML+=datailTicket; 
          
        });//forEach          

        } //if (data.length > 0) {

        //===(Find name of current day => jour)

        const today = new Date();
        const NameDay=["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];              
        const NameMois=["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"];
        var  day = today.getDay();
        var mois = today.getMonth();      
        var jour = NameDay[day]+" "+today.getDate()+" "+NameMois[mois];
        var h = today.getHours();
        var m = today.getMinutes();
        h = checkTime(h);
        m = checkTime(m);
  
        
        var footTicket = `                          
                            <span>───────────</span>    
                          <br>
                            <span class="fw-bold fs-5" >TOTAL <span>`+totalTicket.toFixed(2)+`</span></span>
                          <br>
                            <span class="text text-nowrap fs-6 fw-semibold">`+jour+`<span class="text text-nowrap fs-6 fw-semibold">-</span> <span class="text text-nowrap fs-6 fw-semibold">`+h+`</span><span class="text text-nowrap fs-6 fw-semibold">:</span><span class="text text-nowrap fs-6 fw-semibold">`+m+`</span></span>
                          <br>
                            <span class="text text-nowrap fw-semibold fs-6">Ticket</span><span> : </span><span>`+nrTicket+`</span>
                          <br>
                            <span class="text text-nowrap fs-6 fw-semibold">Code WIFI</span><span> : </span><span class="text text-nowrap fs-6 fw-semibold">20252030</span>
                         `;

        document.getElementById('showFootTicket').innerHTML=footTicket;  


        console.log(today.getMonth())
                    
    }//status==200
  
  }//xhr.onload 

  xhr.send();

  setTimeout(() => {window.print(); return false;},30);

}//printTicket

 
function xEmploye(idEmployee){

  var xhr = new XMLHttpRequest();
  
  xhr.open('GET','dataViewXEmploye.php?idEmployee='+idEmployee,true);

  xhr.onload = function() {

    if(xhr.status==200){

      //data is array of objects
      var  data =  JSON.parse(this.response);
     
      console.log(data)
      
      //data as objects
      var dataTotalCategory = data[0];
      var dataDetailProduct = data[1];
      var dataRefEmploye    = data[2];

      //convert object to array
      var arrayTotalCategory = Array.from(Object.entries(dataTotalCategory));
      var arrayDetailProduct = Array.from(Object.entries(dataDetailProduct));      
      var arrayRefEmploye    = Array.from(Object.entries(dataRefEmploye));

  //*********************( id="showHeadxEmploye" )
  var   idVendeur = arrayRefEmploye[0][1];
  var nameVendeur = arrayRefEmploye[1][1];

  console.log(arrayRefEmploye)
  

  document.getElementById('showHeadxEmploye').innerHTML="";
  
      var HeadxEmploye=`
                      <div class="lh-1">
                        <span class="fst-italic fw-bold fs-4">CAFE LA PASSERELLE</span>
                        <br>
                        <span class="fw-semibold fs-6">En face clinique Badr - Bourgogne</span>
                        <br>
                        <span class="fw-semibold fs-6">Casablanca</span>
                        <br>
                        <span class="fw-semibold fs-6">Tel: 05.29.53.91.82</span>
                        <br>
                        <span>───────────</span>
                        <br>
                        <span class="text text-nowrap fs-6 fw-semibold">Vendeur:<span class="text text-nowrap fs-6 fw-semibold"> `+idVendeur+`</span> <span class="text text-nowrap fs-6 fw-semibold">─</span><span class="text text-nowrap fs-6 fw-semibold"> `+nameVendeur+`</span></span>
                        <br>
                        <span>───────────</span>                        
                      </div>
                      `;

      document.getElementById('showHeadxEmploye').innerHTML+=HeadxEmploye;

    
  //*********************( id="showListCategory" )       

  document.getElementById('showListCategory').innerHTML=""; 
     
  console.log(arrayDetailProduct);
    
  for (let i = 0; i < arrayTotalCategory.length; i++) {

  var nameCategory = arrayTotalCategory[i][0];
  var totalCategory = arrayTotalCategory[i][1];
  var space="&nbsp".repeat(7);

  var listCategory = `
          <tr>
            <td class="text text-center w-50">
             <span class="text fs-bold fs-5">`+nameCategory+space+totalCategory.toFixed(2)+`</span>
            </td>                                                
          </tr>           
          <tr>
            <td>
              <table class="table table-striped table-sm">
                <tbody class="text justify-content-start w-50" id="showListProducts`+i+`">

                </tbody>              
              </table>                                                   
            </td>                                                                                
          </tr>          

          `;

  document.getElementById('showListCategory').innerHTML+=listCategory                         
  
  let result = arrayDetailProduct.filter((element) =>  (element[1][0]) == nameCategory);

  console.log(result);
  console.log("__________")

  document.getElementById("showListProducts"+i).innerHTML="";

  var montantxEmployeEl=[];
  for (let j = 0; j < result.length; j++) {
    
     var ii = i.toString()+j.toString();
     console.log(ii);

     var nameProduct = result[j][1][1];
     var       price = result[j][1][2];
     var    quantity = result[j][1][3];
     var     montant = result[j][1][4];

     const styleProduct = "font-size:12px;";

     var listProducts= `
                            <tr class="text justify-content-start">

                                <td class="text text-start fs-6 p-2"><span style=`+styleProduct+`>`+nameProduct+`</span></td>

                                <td class="text text-end  fs-6 p-2"><span style="font-size:12px;">`+parseInt(quantity).toFixed(0)+`</span><span style="font-size:12px;">X</span><span style="font-size:12px;">`+parseInt(price).toFixed(2)+`</span></td>
                                
                                <td style="" class="text text-end fs-6 p-2"><span style="margin-right:10px;font-size:12px;">`+montant.toFixed(2)+`</span></td>
                            </tr>                       
                       `;                      
    document.getElementById("showListProducts"+i).innerHTML+=listProducts;

  }//for j

  }//for i
   
  

  //*********************( id="showFootxEmploye" )
  
        const today = new Date();
        const NameDay=["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];              
        const NameMois=["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"];
        var  day = today.getDay();
        var mois = today.getMonth();      
        var jour = NameDay[day]+" "+today.getDate()+" "+NameMois[mois];
        var h = today.getHours();
        var m = today.getMinutes();
        h = checkTime(h);
        m = checkTime(m);

  var      xEmploye = arrayRefEmploye[2][1];
  var totalxEmploye = arrayRefEmploye[3][1];

  console.log(arrayRefEmploye)        
          
        var FootxEmploye = `
                          <span class="fw-bold fs-5" >TOTAL <span>`+totalxEmploye.toFixed(2)+`</span></span>
                          <br>
                          <span class="text text-nowrap fs-6 fw-semibold">`+jour+`<span class="text text-nowrap fs-6 fw-semibold">-</span> <span class="text text-nowrap fs-6 fw-semibold">`+h+`</span><span class="text text-nowrap fs-6 fw-semibold">:</span><span class="text text-nowrap fs-6 fw-semibold">`+m+`</span></span>
                          <br>
                          <span class="text fw-bold fs-4">X</span><span> : </span><span class="text fw-bold fs-4">`+xEmploye+`</span>
                          `;

        document.getElementById('showFootxEmploye').innerHTML=FootxEmploye;  


        console.log(today.getMonth())


    }//status==200
  
  }//xhr.onload 

  xhr.send();


  

     //C:\htdocs\admin\ticket\viewXEmploye.php
     //*********************( id="showHeadxEmploye" )
     //*********************( id="showListCategory" ) 

  setTimeout(() => {window.print(); return false;},30);     //*********************( id="showFootxEmploye" )

}//xEmploye


function displayHeadsTicketsAdmin(idEmployee){

  var xhr = new XMLHttpRequest();

  xhr.open('GET','/front/product/displayHeadsTickets.php?idEmployee='+idEmployee,true);

  xhr.onload = function() {

    if(xhr.status==200){

      var  data =  JSON.parse(this.response);

      console.log(data);

      //===========(Display Name Vendeur)========================

      //Select the last element of the array data -> data.slice(-1)
      var data1 = data.slice(-1);        
      var firstName = data1[0].firstName ;
      document.getElementById('btnVendeur').innerText=firstName;


      //===========(show Heads Tickets table)========================

      var data = data.slice(0,-1);

      console.log(data);
      
      document.getElementById('showHeadsTickets').innerHTML="";
      
      var somTickets = 0;

      data.forEach(element => {  

        var       idTicket = element.idTicket ;
        var       nrTicket = element.nrTicket ;
        var    totalTicket = element.totalTicket;        

        var headTickets = `
                          <tr>

                            <td><span>`+idTicket+`</span></td>

                            <td colspan="3">
                              <div class="d-flex gap-1 justify-content-center">

                                <button class="btn btn-danger btn-sm"
                                onclick="deleteTicket(`+idTicket+`)">
                                <i class="fa-solid fa-trash-can "></i>
                                </button>

                                <button class="btn btn-success btn-sm"
                                onclick="editTicket(`+idTicket+`);">
                                <i class="fa-solid fa-pencil "></i>
                                </button>

                              </div>
                            </td>

                            <td><span class="fw-bold">`+nrTicket+`</span></td>
                            <td><span class="fw-bold">`+totalTicket+`</span></td>        

                          </tr>
                          `;
        
          document.getElementById('showHeadsTickets').innerHTML+=headTickets; 

          somTickets += parseInt(totalTicket); 
                    
      });//forEach 

      document.getElementById('totalTickets').innerText=somTickets.toFixed(2); 
      
      
      document.getElementById('showFootTickets').innerHTML=`
              <tr>
            <td colspan="2">
                <button class="btn badge rounded-pill text-bg-danger"  onclick="alert('Z `+firstName+`')"><i class="fw-bold">Z <span id="idNameVendeur">`+firstName+`</span></i></button>                                    
            </td>
                                                               
            <td colspan="2">                                                    
                <a class="btn badge text-bg-success rounded-pill mx-1" href="/admin/ticket/viewXEmploye.php?idEmployee=`+idEmployee+`"><i class="fw-bold">X <span>`+firstName+`</span></i></a>
            </td>                        
                       
            <td colspan="2" class="border border-dark">
             <span class="badge text-bg-dark fw-bold fs-6">Z</span>                
             <span class="badge text-bg-dark fw-bold fs-6" id="totalTickets">21</span>
            </td>        


        </tr> 

        <tr>
            <td colspan="2">
                <button class="btn badge rounded-pill text-bg-danger"  onclick="alert('Z GENERAL')"><i class="fw-bold">Z <span>General</span></i></button>                                    
            </td>

            <td colspan="2">
                <button class="btn badge rounded-pill text-bg-success"  onclick="alert('X GENERAL')"><i class="fw-bold">X <span>General</span></i></button>                                    
            </td>            
                       
            <td colspan="2" class="border border-dark">
             <span class="badge text-bg-dark fw-bold fs-6">Z</span>                
             <span class="badge text-bg-dark fw-bold fs-6" id="totalTickets">47</span>
            </td>        

        </tr>         
                                                         `;

    }//status==200
  
  }//xhr.onload 

  xhr.send();

}//displayHeadsTickets

function displayHeadsTickets(idUser){

  var xhr = new XMLHttpRequest();

  xhr.open('GET','http://localhost:8000/front/product/displayHeadsTickets.php?idUser='+idUser,true);

  xhr.onload = function() {

    if(xhr.status==200){

      var  data =  JSON.parse(this.response);


      console.log(data);    
      //===========(Display Name Vendeur)========================

      //Select the last element of the array data -> data.slice(-1)
      var data1 = data.slice(-1);  

      var firstName = data1[0].firstName ;

      var btnVendeurEl = document.getElementById('btnVendeur')

      if(btnVendeurEl!=null){
        btnVendeurEl.innerText=firstName;
      }
      
      //===========(show Heads Tickets table)========================

      var data = data.slice(0,-1);

      console.log(data);
    
      var title = `<tr>
                    <th class="border border-dark" style="font-size:12px;" >Id Ticket</th>
                    <th class="border border-dark" style="font-size:12px;" >Nr Ticket</th>
                    <th class="border border-dark">Total</th>
                    <th class="border border-dark" colspan="2">Action</th> 
                   </tr>          
                  `;

      var titleHeadsTicketsEl = document.getElementById('titleHeadsTickets');

      if(titleHeadsTicketsEl!=null){
        titleHeadsTicketsEl.innerHTML= title ;
      }
      
      var detailHeadsTicketsEl = document.getElementById('detailHeadsTickets')
      if(detailHeadsTicketsEl!=null){
        detailHeadsTicketsEl.innerHTML="";
      }
      
      
      var somTickets = 0;

      data.forEach(element => {  

        var       idTicket = element.idTicket ;
        var       nrTicket = element.nrTicket ;
        var    totalTicket = element.totalTicket;        

        var detail = `<tr id="trHeadTicket`+idTicket+`" class="border border-dark fw-bold `+idTicket+`">
                              <td>`+idTicket+`</td>
                              <td>`+nrTicket+`</td>
                              <td id="totalTicket`+idTicket+`">`+totalTicket+`</td>
                              <td>
                                <div class="d-flex">

                                  <button class="btn btn-danger btn-sm"
                                  onclick="deleteTicket(`+idTicket+`)">
                                  <i class="fa-solid fa-trash-can"></i>
                                  </button>
                                                          
                                  <button class="btn btn-success btn-sm"
                                  onclick="editTicket(`+idTicket+`);updateTicket();">
                                  <i class="fa-solid fa-pencil"></i>
                                  </button>

                                </div>
                              </td>
                            </tr>`;
                            
      if(detailHeadsTicketsEl!=null){
        document.getElementById('detailHeadsTickets').innerHTML+=detail;
      }

          somTickets += parseInt(totalTicket); 
                    
      });//forEach 
      
      foot = `
              <tr>
                  <td class="border border-dark">
                  <span class="badge text-bg-dark fw-bold fs-6">Total</span>
                  </td>

                  <td class="border border-dark">
                  <span class="badge text-bg-dark fw-bold fs-6">`+somTickets.toFixed(2)+`</span>
                  </td>        
                  
                  <td>
                      <button class="btn btn-success" onclick="ajouterTicket()"><i>+</i></button>                    
                  </td>            
              </tr>      
             `;

      var footHeadsTicketsEl = document.getElementById('footHeadsTickets') ;

      if(footHeadsTicketsEl!=null){
        footHeadsTicketsEl.innerHTML=foot; 
      }

  /*    var display = JSON.parse(localStorage.getItem('display')); 

      if(display){
        displayProductsCategory(1) 
      }
    */

    }//status==200
  
  }//xhr.onload 

  xhr.send();

}//displayHeadsTickets

function displayProductsCategory(idCategory){
 //alert(idCategory)

var xhr = new XMLHttpRequest();

  xhr.open('GET','http://localhost:8000/front/product/productsData.php?idCategory='+idCategory,true);

  xhr.onload = function() {

      if(xhr.status==200){

        var  data =  JSON.parse(this.response);

        var data1 = data.slice(-1);  

        var     nameCategory = data1[0].nameCategory;
        var currentIdProduct = data1[0].currentIdProduct;
        
        var headProduct=`
                          <tr>
                            <th>id</th>
                            <th>imgSrc</th>
                            <th>Product</th>    
                            <th>price</th>           
                          </tr>
                        `;

        document.getElementById('showHeadProduct').innerHTML = headProduct; 

        var data = data.slice(0,-1);

        console.log(data);
     
        if (data.length > 0) {

          document.getElementById('showDetailProduct').innerHTML="";    

          data.forEach(element => {

          var   idProduct = element.idProduct                            
          var      imgSrc = element.imgSrc

          if(imgSrc===""){
            imgSrc = "default_product.png";
          }
          
          var nameProduct = element.nameProduct
          var       price = element.price
                    
          var datailProduct=`<tr id="trDetailProduct`+idProduct+`" class="border border-dark fw-bold">            

                                <td>`+idProduct+`</td>                      

                                <td>            
                                <img class="img img-fluid imgProduct" src="/uploads/products/`+imgSrc+`" width="70px" onclick="selectProduct(`+idProduct+`)">
                                </td>

                                <td class="nameProduct">`+nameProduct+`</td>
                                <td class="price">`+price+`</td>            
                             </tr>            
                            `

          document.getElementById('showDetailProduct').innerHTML+=datailProduct; 

          document.getElementById('btnCategory').innerText=nameCategory;

          });
        
         var trDetailProductEl = document.getElementById("trDetailProduct"+currentIdProduct);

         if(trDetailProductEl!=null){
          trDetailProductEl.classList.add('table-info');
         }
          
        }//if (data.length > 0)

      }//status==200

  }//onload

  xhr.send();

}//displayProductsCategory

//This function for opening a session with idProductSelected 
function selectProduct(idProduct){

  var xhr = new XMLHttpRequest();
  
  xhr.open('GET','http://localhost:8000/front/product/selectProduct.php?idProduct='+idProduct,true);

  xhr.onload = function() {

    if(xhr.status==200){

      var  data =  JSON.parse(this.response);

      //*********************************/        
      //*********************************/
      //*********************************/       
       console.log(data.idCategory);//*******/
      //*********************************/
      //*********************************/
      //*********************************/  


      pickProduct(idProduct);
      displayProductsCategory(data.idCategory);
     

    }//status==200
  
  }//xhr.onload 

  xhr.send();
   
}//selectProduct

function displayTicketsVendeurCourant(){

  document.getElementById("btnVendeur").innerText="Bonjour !"
     
}

function hideProducts(idUser){
            //======== Hide products to sell ...
            localStorage.removeItem("display");
            localStorage.setItem('display',false);
            displayHeadsTickets(idUser);

     //       document.getElementById("showHeadTicket").innerHTML=``;
     //       document.getElementById("showDetailTicket").innerHTML=``;
     //       document.getElementById("showFootTicket").innerHTML=``;

       //     document.getElementById("showHeadProduct").innerHTML=``;
       //     document.getElementById("showDetailProduct").innerHTML=``;

}

function saySalut(){
  document.getElementById().innerHTML=`<h1>Saluttttttto</h1>`;
}

function printTicketCaisse(idTicket){
//============================

  var xhr = new XMLHttpRequest();
  
  xhr.open('GET','http://localhost:8000/print/dataTicketCaisse.php?idTicket='+idTicket,true);

  xhr.onload = function() {

    if(xhr.status==200){

      var  data =  JSON.parse(this.response);

      console.log(data);

      // The object data1 is the last element of the array data
      var data1 = data.slice(-1);

      console.log(data1);

      var idVendeur = data1[0].idVendeur;
      var nameVendeur = data1[0].nameVendeur;
      var totalTicket = data1[0].totalTicket;
      var nrTicket    = data1[0].nrTicket;

      document.getElementById('showHeadTicket').innerHTML="";
                               
      var headTicket=`
                      <div class="lh-1">
                        <span class="fst-italic fw-bold fs-4">CAFE LA PASSERELLE</span>
                        <br>
                        <span class="fw-semibold fs-6">En face clinique Badr - Bourgogne</span>
                        <br>
                        <span class="fw-semibold fs-6">Casablanca</span>
                        <br>
                        <span class="fw-semibold fs-6">Tel: 05.29.53.91.82</span>
                        <br>
                        <span>───────────</span>
                        <br>
                        <span class="text text-nowrap fs-6 fw-semibold">Vendeur:<span class="text text-nowrap fs-6 fw-semibold"> `+idVendeur+`</span> <span class="text text-nowrap fs-6 fw-semibold">─</span><span class="text text-nowrap fs-6 fw-semibold"> `+nameVendeur+`</span></span>
                        <br>
                        <span>───────────</span>                        
                      </div>
                      `;

      document.getElementById('showHeadTicket').innerHTML+=headTicket;

      //============( Detail ticket )================================

      document.getElementById('showDetailTicket').innerHTML="";   
              
      var data = data.slice(0,-1);
      
      if (data.length > 0) {
                    
        data.forEach(element => {
                  
          var nameProduct=element.name_product
          var quantity = element.quantity
          var price = element.price
          var totalItem = element.totalItem   
                    
          var datailTicket=`
                            <tr class="text justify-content-start w-100">
                                
                                <td class="text text-end  fs-6 p-2"><span style="font-size:14px;">`+parseInt(quantity).toFixed(0)+`</span><span style="font-size:12px;">X</span><span style="font-size:12px;">`+parseInt(price).toFixed(2)+`</span></td>

                                <td class="text text-start fs-6 p-2"><span style="font-size:14px;">`+nameProduct+`</span></td>

                                <td class="text text-start fs-6 p-2"><span style="font-size:14px;">`+totalItem.toFixed(2)+`</span></td>
                            </tr>
                            `; 

                                
         document.getElementById('showDetailTicket').innerHTML+=datailTicket; 
          
        });//forEach          

        } //if (data.length > 0) {

        //===(Find name of current day => jour)

        const today = new Date();
        const NameDay=["Dimanche","Lundi","Mardi","Mercredi","Jeudi","Vendredi","Samedi"];              
        const NameMois=["Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"];
        var  day = today.getDay();
        var mois = today.getMonth();      
        var jour = NameDay[day]+" "+today.getDate()+" "+NameMois[mois];
        var h = today.getHours();
        var m = today.getMinutes();
        h = checkTime(h);
        m = checkTime(m);
  
        
        var footTicket = `                          
                            <span>───────────</span>    
                          <br>
                            <span class="fw-bold fs-5" >TOTAL <span>`+totalTicket.toFixed(2)+`</span></span>
                          <br>
                            <span class="text text-nowrap fs-6 fw-semibold">`+jour+`<span class="text text-nowrap fs-6 fw-semibold">-</span> <span class="text text-nowrap fs-6 fw-semibold">`+h+`</span><span class="text text-nowrap fs-6 fw-semibold">:</span><span class="text text-nowrap fs-6 fw-semibold">`+m+`</span></span>
                          <br>
                            <span class="text text-nowrap fw-semibold fs-6">Ticket</span><span> : </span><span>`+nrTicket+`</span>
                          <br>
                            <span class="text text-nowrap fs-6 fw-semibold">Code WIFI</span><span> : </span><span class="text text-nowrap fs-6 fw-semibold">20252030</span>
                         `;

        document.getElementById('showFootTicket').innerHTML=footTicket;  


        console.log(today.getMonth())
                    
    }//status==200
  
  }//xhr.onload 

  xhr.send();

  setTimeout(() => {window.print(); return false;},30);

} // printTicketCaisse
