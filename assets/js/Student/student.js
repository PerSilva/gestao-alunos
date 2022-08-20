/*
* [Arquivo com os métodos referente a home.]
* @package  [Alunos]
* @category [Script]
* @name     [student.js]
* @author   [Thiago Silva <thyhanry@hotmail.com>]
* @version  [1.0.0] 
*/
/**
 * Prepara  o input de upload
 */
 ( function ( document, window, index )
 {
     var inputs = document.querySelectorAll( '.inputfile' );
     Array.prototype.forEach.call( inputs, function( input )
     {
         var label	 = input.nextElementSibling,
             labelVal = label.innerHTML;

         input.addEventListener( 'change', function( e )
         {
             var fileName = '';
             if( this.files && this.files.length > 1 )
                 fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
             else
                 fileName = e.target.value.split( '\\' ).pop();

             if( fileName )
                 label.querySelector( 'div' ).innerHTML = fileName;
             else
                 label.innerHTML = labelVal;
         });

         // Firefox bug fix
         input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
         input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
     });
 } ( document, window, 0 )
);
/**
 * Ao carregar a tela, chama a função que retorna a tabela montada.
 */
 $(function() {
    loadTable();
}); 
/**
 * Função que retorna a view com a tabela dos alunos.
 */
function loadTable() {
    $table = $('#table');
 
    //Loader de carregamento
    openBlockUI('Carregando...');
    $.ajax({
        type: 'GET',
        url: baseUrl + 'student/table',
        dataType: "HTML",
        processData: false,
        contentType: false,
    }).done(function (data) {
        $table.html(data);
    }).always(function (dataReturn) {
        closeBlockUI(); // libera (blockui)
    });
 }
/**
 * Função que abre o modal com formulário de cadastro do aluno.
 */
function create(key) {
    $modal = $('#modal-create');
 
    //Loader de carregamento
    openBlockUI('Carregando...');
    $.ajax({
        type: 'GET',
        url: baseUrl + 'student/create/'+key,
        dataType: "HTML",
        processData: false,
        contentType: false,
    }).done(function (data) {
        $modal.html(data);
        $modal.modal();
    }).always(function (dataReturn) {
        closeBlockUI(); // libera (blockui)
    });
 }
/**
  * Função que cadastra o aluno
  */
$(document).on('submit', '#form', function(e) {
    e.preventDefault();
    if($('#nome').val() == '') {
        notification("Atenção!", "Campo nome obrigatório.", "warning");
    } else {
        openBlockUI('Cadastrando...');
        $.ajax({
            type: 'POST',
            url: baseUrl + 'student',
            dataType: "JSON",
            data     : assembleForm(),
            processData: false,
            contentType: false,
        }).done(function (dataReturn) {
            if(dataReturn.status) {
                $modal.modal('hide');
                loadTable();
                notification("Sucesso!", "Aluno Cadastrado.", "success");
            } else {
                notification("Atenção!", dataReturn.message, "warning");
            }
        }).fail(function(dataReturn){
            swal({
                title: "Erro",
                text : dataReturn.message,
                icon : "error"
            });
        }).always(function (dataReturn) {
            closeBlockUI();
        });
    }
});
/**
 * Função que abre a caixa de confirmação da exclusão
 */
function confimDelete(key) {
	swal({
		  title: "Atenção!",
		  text: "Confirma exclusão? ",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		}).then((willDelete) => {
		  if (willDelete) {
            deleteStudent(key);
		  }
		});
}
/**
 * Função que apaga as informações do aluno
 */
function deleteStudent(key) {
    //Loader de carregamento
    openBlockUI('Carregando...');
    $.ajax({
        type: 'DELETE',
        url: baseUrl + 'student/'+key,
        dataType: "HTML",
        processData: false,
        contentType: false,
    }).done(function (data) {
        loadTable();
    }).always(function (dataReturn) {
        closeBlockUI(); // libera (blockui)
    });
}
/**
 * Função que monta e retorna a mensagem de notificação.
 */
function notification(title, text, icon) {
    swal({
        title: title,
        text : text,
        icon : icon
    });
}
/**
 * Função que pega as informações do formulário.
 */
function assembleForm() {
    var dataForm = new FormData();
    dataForm.append('nome', $('#nome').val());
    dataForm.append('rua', $('#rua').val());
    dataForm.append('bairro', $('#bairro').val());
    if($('#documentos')[0].files.length > 0) {
        const files = $('#documentos')[0].files;
        for (i in files) {
            dataForm.append('documentos[]',files[i]);
        }
    }
    if($('#chave').val() != '') {
        dataForm.append('chave', $('#chave').val());
    }
    return dataForm;
}