/*
* [Arquivo com os scripts genéricos acessíveis de todas as telas.]
*
* @package  [Alunos]
* @category [Script]
* @name     [global.js]
* @author   [Thiago Silva <thiago@sw3tecnologia.com.br>]
* @version  [1.0.0] 
*/

// realiza um bloqueio de tela
function openBlockUI(mensagem, cor, icone)
{
    if(mensagem == undefined) {
        mensagem = 'Processando...';
    }
    if(cor == undefined) {
        cor = 'text-primary-800';
    }
    if(icone == undefined) {
        //conteudo = '<img src="'+baseUrl+'assets/img/loading/i9.png" width="120" class="mb-2">' + '<div><img src="'+baseUrl+'assets/img/loading/loading2.gif" width="120" class="mb-2"></div>';
        conteudo = '<img src="'+baseUrl+'assets/img/loading/loading2.gif" width="120" class="mb-2">';
    }else {
        conteudo = '<i class="fas '+icone+' fa-pulse fa-3x fa-fw '+cor+'"></i>';
    }
    $.blockUI({ 
        message: conteudo+'<br><span class="'+cor+'"></span>',
        css: { border: '0px solid #FFF', backgroundColor: 'transparent'},
        overlayCSS: { backgroundColor: '#FFFFFF', opacity: 0.9} ,
        baseZ: 9999,
    });
}
function closeBlockUI(){
    $.unblockUI(); //Desbloqueia
}

