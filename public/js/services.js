'use strict';



$(document).ready(function(){
    laad_();
    $("#transListSortBy, #transListPerPage").change(function(){
        displayFlashMsg("Please wait...", spinnerClass, "", "");
        laad_();
    });
    $("#serviceTable").on('click', '.lnp', function(e){
        e.preventDefault();
		
        displayFlashMsg("Please wait...", spinnerClass, "", "");

        laad_($(this).attr('href'));

        return false;
    });
     $("#serviceTable").on('click', '.deleteAdmin', function(e){
        e.preventDefault();

        //get the item id
        var itemId = $(this).parents('tr').find('.curItemId').val();
        var itemRow = $(this).closest('tr');//to be used in removing the currently deleted row
       
        if(itemId){
            var confirm = window.confirm('Esta Seguro de Pagar el Servicio tecnico');

            if(confirm){
                displayFlashMsg('Por favor espere...', spinnerClass, 'black');

                $.ajax({
                    url: appRoot+"services/updatePay",
                    method: "POST",
                    data: {i:itemId}
                }).done(function(rd){
                    if(rd.status === 1){
                        //remove item from list, update items' SN, display success msg
                        laad_();

                        //update the SN
                        //resetItemSN();

                        //display success message
                        changeFlashMsgContent('Servicio Pagado  correctamente', '', 'green', 1000);
                    }

                    else{

                    }
                }).fail(function(){
                    console.log('Req Failed');
                });
            }
        }
    });
    
    $("#clickToGenService").click(function(e){
        e.preventDefault();

        changeInnerHTML(['firstNameServiceErr', 'servicePriceErr', 'serviceContactErr'],
        "");
        var firstName = $("#firstNameService").val();
        var price = $("#servicePrice").val();
        var contact = $("#serviceContact").val();
        var description = $("#serviceDescription").val();
         var local = $("#localServicio").val();
        if(!firstName || !price || !contact){
            !firstName ? changeInnerHTML('firstNameServiceErr',"Required") : "" ;
           
            !price ? changeInnerHTML('servicePriceErr',"Required") : "" ;
            !contact ? changeInnerHTML('serviceContactErr',"Required") : "" ;
            return;
        }
        $("#fMsgIcon").attr('class', spinnerClass);
        $("#fMsg").text(" Processing...");
        $.ajax({
            method: "POST",
            url: appRoot+"services/add",
            data: {
                firstName:firstName, price:price, contact:contact, description:description, local:local
            }
        }).done(function(returnedData){
            $("#fMsgIcon").removeClass();//remove spinner
            if(returnedData.status === 1){
                $("#fMsg").css('color', 'green').text(returnedData.msg);
                console.log(returnedData.transReceipt);
                //reset the form
                document.getElementById("fromService").reset();

                //close the modal
                setTimeout(function(){
                    $("#fMsg").text("");
                    $("#servicioModal").modal('hide');
                    
                }, 100);
                   $("#transReceipt").html(returnedData.transReceipt);//paste receipt
                            $("#transReceiptModal").modal('show');//show modal
                            laad_();
            }
        }

        )


    });
});

function laad_(url){
    var orderBy = $("#transListSortBy").val().split("-")[0];
    var orderFormat = $("#transListSortBy").val().split("-")[1];
    var limit = $("#transListPerPage").val();

    $.ajax({
        type:'get',
        url: url ? url : appRoot+"services/laad_/",
        data: {orderBy:orderBy, orderFormat:orderFormat, limit:limit},

        success: function(returnedData){
            hideFlashMsg();

            $("#serviceTable").html(returnedData.serviceTable);
        },

        error: function(){

        }
    });

    return false;
}
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

