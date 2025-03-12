
window.jQuery = jQuery.noConflict(true);
$(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       var table = $('#filmeTable').DataTable({
            processing: true,
            serverSide: true,
        
            ajax: {
                url: '/criar/index', 
                type: 'GET'
            },

            columns: [
                {data: 'id'},
                {data: 'nome'},
                {data: 'acao', name: 'action', orderable: false, searchable: false}
            ]
        })
        
        $('#modal-title').html('Adicionar filme: ') 
        $('#saveBtn').html('Salvar')
    
        var form = $('#ajaxForm')[0]
        
        $('#saveBtn').click(function(){ 
        
            var formData = new FormData(form)
        
            $.ajax({
                url: '/criar/store',
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
                        console.log(error.responseJSON.errors.nome)
                        $('#nameError').html(error.responseJSON.errors.nome)
                        $('#classificacaoError').html(error.responseJSON.errors.descricao)
                        $('#descricaoError').html(error.responseJSON.errors.classificacao)
                        $('#imageError').html(error.responseJSON.errors.image)
                    }
                }
            })
            
        })

        //edit button
        $('body').on('click', '.editButton', function(){
            var id = $(this).data('id')

            $.ajax({
                url:  ''  + id + '/edit',
                method: 'GET',
                success: function(response){
                    $('#modal-title').html('Editar filme: ') 
                    $('#saveBtn').html('Salvar')


                    $('#filme_id').val(response.id)
                    $('#nome').val(response.nome)
                    $('#descricao').val(response.descricao)
                    $('#classificacao').val(response.classificacao)
                    $('#image').val(response.image) 

                    
                },
                error:function(error){
                    console.log(error);
                    
                }
            })
            
        })

        $('body').on('click', '.deleteButton', function(){
            var id = $(this).data('id');
            
            $.ajax({
                url: '/criar/destroy/' + id,  
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
        

    })