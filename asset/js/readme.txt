Functions used in script.js :
        Name                                         Called by
1 - function startTime()   ========================> C:\htdocs\index.php
2 - function ajouterTicket()   ====================> C:\htdocs\front\product\HeadsTicketTable.php
3 - function deleteTicket(idTicket)  ==============> function displayHeadsTicketsAdmin(idEmployee)
4 - function pickProduct(idProduct) ===============> function selectProduct(idProduct)
5 - function getQuantity(idLigneTicket,plusMinus) => function editTicket(idTicket)
6 - function deleteItemTicket(idLigneTicket)  =====> function editTicket(idTicket)
7 - function deleteItemsTicket(idTicket) ==========> function editTicket(idTicket)
8 - function editTicket(idTicket)  ================> function displayHeadsTicketsAdmin(idEmployee)
                                   ================> function displayHeadsTickets(idUser)


/* saved Code :

      var dataCategoriesTotal = data[0];
      var dataCategoryProduct = data[1];
      var    dataProductPrice = data[2];
      var dataProductQuantity = data[3];
      var      dataRefEmploye = data[4];


      var arrayCategoryProduct = Array.from(Object.entries(dataCategoryProduct));
      var arrayProductPrice = Array.from(Object.entries(dataProductPrice));
      var arrayProductQuantity = Array.from(Object.entries(dataProductQuantity));
      var arrayRefEmploye = Array.from(Object.entries(dataRefEmploye));

     //document.getElementById('showHeadTicket').innerHTML="";               
    //document.getElementById('showDetailTicket').innerHTML=""; 
    //document.getElementById('showFootTicket').innerHTML=""; 

       var dataTotalCategory = data[0];
      var dataDetailProduct = data[1];
      var dataRefEmploye    = data[2];

      
      var arrayTotalCategory = Array.from(Object.entries(dataTotalCategory));
      var arrayDetailProduct = Array.from(Object.entries(dataDetailProduct));
      var arrayRefEmploye    = Array.from(Object.entries(dataRefEmploye));

*/

/* <span>`+"─".repeat("Tel: 05.29.53.91.82".length)+`</span>  */

/*sql -> SUM */
/* SELECT SUM(`total_ticket`) from tickets where `id_user`=1  */

/* Rafraichir page web -> location.reload();