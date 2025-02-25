    $(document).ready(function(){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#modal-title').html('Nome do filme: ') 
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
                    if(response){
                        swal("Successo!", response.success, "success")
                    }
                    
                },

                if(response){
                    $('#exampleModal').modale('hide')
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

    })