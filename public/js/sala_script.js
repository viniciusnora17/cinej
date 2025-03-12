window.jQuery = jQuery.noConflict(true);
$(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       var table = $('#salasTable').DataTable({
            processing: true,
            serverSide: true,
        
            ajax: {
                url: '/salas/index', 
                type: 'GET'
            },

            columns: [
                {data: 'id'},
                {data: 'numeroSala'},
                {data: 'qnt_lugares'},
                {data: 'acao', name: 'action', orderable: false, searchable: false}
            ]
        })

    })

    $('#modal-title').html('Adicionar sala: ') 
    $('#saveBtn').html('Salvar')

    var form = $('#ajaxForm')[0]
        
    $('#saveBtn').click(function(){ 
    
        var formData = new FormData(form)
    
        $.ajax({
            url: '/criar/salas',
            method: 'POST',
            processData: false,
            contentType: false,
            data: formData,

            success: function(response){

                setTimeout(function() {
                    location.href = location.href;
                }, 1000);
                
                $('#botaoFechar').click();
                if(response){
                    swal("Successo!", response.success, "success")
                }
            },

            error: function(error){
                if(error){
                    
                    $('#numeroError').html(error.responseJSON.errors.numeroSala)
                    $('#qntLugaresError').html(error.responseJSON.errors.qnt_lugares)
                   
                }
            }
        })
        
    })

    //edit button]
    //preciso editar issdo aqui ainda !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

    $('body').on('click', '.editButton', function(){
        var id = $(this).data('id')

        $.ajax({
            url:  '/salas/'  + id + '/edit',
            method: 'GET',
            success: function(response){
                $('#modal-title').html('Editar Sala: ') 
                $('#saveBtn').html('Atualizar')


                $('#salas_id').val(response.id)
                $('#numeroSala').val(response.numeroSala)
                $('#qnt_lugares').val(response.qnt_lugares)
                
            },
            error:function(error){
                console.log(error);
                
            }
        })
        
    })


    $('body').on('click', '.deleteButton', function(){
        var id = $(this).data('id');
        
        $.ajax({
            url: '/salas/destroy/' + id,  
            method: 'DELETE',
            success: function(response){
                setTimeout(function() {
                    location.href = location.href;
                }, 1000);
                
                swal("Sucesso!", response.success, "success");
            },
            error: function(error){
                console.log(error);
            }
        });
    });
    


