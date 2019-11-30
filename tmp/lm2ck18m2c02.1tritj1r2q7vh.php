<hr>
<h3>Tabla Usuarios </h3>
<hr>
<div class="container" id="idcontainer">
    <div class="row">
        <div class="col-lg-8">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Telefono</th>
                        <th>Email</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach (($users?:[]) as $user): ?>
                    <tr>
                        <td><?= ($user['nombre']) ?></td>
                        <td><?= ($user['telefono']) ?></td>
                        <td><?= ($user['email']) ?></td>
                        <td>
                            <a href="javascript:void(0)" onclick="eliminar(<?= ($user['id']) ?>)" class="btn btn-danger btn-sm" title="Borrar">
                                
                                    Borrar
                               
                            </a>
                            <a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_person(<?= ($user['id']) ?>)"> Editar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        



        <div class="col-lg-4"> <!--action="<?= ($BASE) ?>/add"-->
            <form action="#" id="form1" method="POST">
                <div class="form-group">
                    <label for="">Nombre del Usuario</label>
                    <input type="text" id="nombre_f" class="form-control" name="nombre_f" placeholder="Ingrese nombre" required>
                </div>
         
                <div class="form-group">  
                    <label for="">Telefono del Usuario</label>
                    <input type="telephone" id="telep_f" class="form-control" name="telep_f" placeholder="Ingrese Telefono" required>
                </div>
        
                <div class="form-group">
                    <label for="">Email del Usuario</label>
                    <input type="email" id="email_f" class="form-control" name="email_f" placeholder="Ingrese email" required>
                </div>
                <hr>
                <!--<input type="submit" class="btn btn-primary" style="float:right" value="Agregar">--> 
                <button type="button" id="btnSaveNode" onclick="registrar()" class="btn btn-success" style="float:right">Registrar</button>         
            </form>
        </div>
   
<br>
        
    </div>
</div>

<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Registrar Hospedadores</h3>
            </div>

            <div class="modal-body form">

                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="idUsr" id="idUsr"/>
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Nombres</label>
                            <div class="col-md-9">
                                <input name="name" id="name" placeholder="Nombres" class="form-control" type="text" required>
                                <span class="help-block"></span>
                            </div>
                        </div>
                       
                        <div class="form-group">
                            <label class="control-label col-md-3">Tel&eacute;fono</label>
                            <div class="col-md-9">
                                <input name="telephone" id="telephone" placeholder="Tel&eacute;fono" class="form-control" type="tel">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input name="email" id="email" value="0" class="form-control" type="email">
                                <span class="help-block"></span>
                            </div>
                        </div>


                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>


<script>
    /*function new_function(id){
        $.ajax(
        //'/f3-mvc-prueba/assets/js/prueba_php.php',
        //'/f3-mvc-prueba/apps/controllers/HomeController.php',
        '/f3-mvc-prueba/ajax_edit/'+id,
        {
            success: function(data) {
                //alert('AJAX call was successful!');
                alert('Data from the server' + data);
            },
            error: function() {
                alert('There was some error performing the AJAX call!');
            }
        }
        );
    }*/
</script>