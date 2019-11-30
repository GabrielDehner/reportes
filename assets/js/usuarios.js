var save_method; //for save method string
var table;
function edit_person1(idUsr){
    alert('llego'+idUsr);
}

function llamar_node(){
    $.ajax({
        //url : "/f3-mvc-prueba/ajax_edit/" + idUsr,
        //url : "/f3-mvc-prueba/ajax_edit/" + idUsr,
        url : "http://localhost:3000/api/"+'5',
        type: "GET",
        async: 'true',
        dataType: "JSON",
        success: function(data)
        {
            console.log(data);
        }
    });
}
function eliminar(idUsr){
    $.ajax({
        url : "/f3-mvc-prueba/ajax_borrar/" + idUsr,
        type: "GET",
        async: 'true',
        dataType: "JSON",
        
        success: function(data)
        {
            console.log(data);
            $("#idcontainer").load(" #idcontainer");

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);

            alert('Error get data from ajax');
        }
    });
}
function registrar(){
    /*if($("#nombre").val()!=''){
        alert($("#nombre").val());
    }*/
    
    if($("#nombre").val()!='' && $("#telep").val()!='' && $("#email_f").val()!=''){
        $.ajax({
            //url : "/f3-mvc-prueba/ajax_edit/" + idUsr,
            url : "/f3-mvc-prueba/ajax_registrar" ,
            //url : "http://localhost:3000/api/"+'5',
            type: "POST",
            data: $('#form1').serialize(),
            async: 'true',
            dataType: "JSON",
            success: function(data)
            {
                console.log(data);
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);

                alert('Error get data from ajax');
            }
        });
        $("#idcontainer").load(" #idcontainer");
    }else{
        alert("Complete Nombre, Telefono y Email");
    }
}

function edit_person(idUsr) {
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
  
    $.ajax({
        //url : "/f3-mvc-prueba/ajax_edit/" + idUsr,
        //url : "/f3-mvc-prueba/ajax_edit/" + idUsr,
        url : "/f3-mvc-prueba/ajax_edit/" + idUsr,
        type: "GET",
        async: 'true',
        dataType: "JSON",
        
        success: function(data)
        {
            //alert(data[0].id);
            
            //alert(data.email);
            $('[name="idUsr"]').val(data[0].id);
            $('[name="name"]').val(data[0].nombre);
            $('[name="telephone"]').val(data[0].telefono);
            $('[name="email"]').val(data[0].email);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Editar Usuario'); // Set title to Bootstrap modal title
            

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);

            alert('Error get data from ajax');
        }
    });
    /*$('[name="idUsr"]').val("1");
    $('[name="name"]').val("2");
    $('[name="telephone"]').val("3");
    $('[name="email"]').val("4");
    $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Editar Usuario');*/
    //alert('llego'+idUsr);
}

function save(){

    if($('#name').val()!='' && $('#surname').val()!='' && $('#telephone').val()!='' && $('#sex').val()!='' && $('#birthday').val()!='' && $('#email').val()!='') {

        $('#btnSave').text('Guardando...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable

        var url;

        if (save_method == 'add') {
            url = "noexiste/ajax_add";
        } else {
            url = "/f3-mvc-prueba/ajax_update";
        }

        //if(save_method == 'add') {
        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function (data) {


                $('#modal_form').modal('hide');
                //reload_table(data);


                $('#btnSave').text('Guardar'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable
                


            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable

            }
        });
        //location.reload();
        $("#idcontainer").load(" #idcontainer");

    }else{
        alert("Complete todos los campos");
    }
}
