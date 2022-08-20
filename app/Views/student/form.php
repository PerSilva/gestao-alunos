<!--
    * [Arquivo com a view de formulário de cadastro/atualização do aluno]
    *
    * @package  [Alunos]
    * @category [HTML - View ]
    * @name     [form.php]
    * @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
    * @version  [1.0.0] 
 -->
<!-- Modal com o formulário de cadastro -->
<div class="modal-dialog modal-lg black-text">
    <form id="form" autocomplete="off" enctype="multipart/form-data">
        <input type="hidden" id="chave" name="chave" value="<?= !empty($data) ? $data->chave : '' ?>">
        <div class="modal-content">
            <div class="modal-header">                                
                <h5 class="modal-title text-dark"><?= $title; ?></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div  class="modal-body">
                <?php if(!empty($data)) :?>
                    <div class="card">
                        <div class=" card-body text-center">
                            <img class="rounded-circle img-100 img-border" src="<?= UPLOAD_PATH.$data->path ?>" alt="">
                        </div>
                    </div>
                <?php endif?>
                <div class="card mt-2">
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="">Seleciona a uma Foto</label>
                                <input type="file" class="form-control-file" name="documentos" id="documentos">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="nome" class="col-form-label s-12">Nome<sup class="text-danger">*</sup></label>
                                <input type="text" class="form-control form-control-sm s-12" id="nome" name="nome" required value="<?= !empty($data) ? $data->nome : '' ?>">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nome" class="col-form-label s-12">Rua</label>
                                <input type="text" class="form-control form-control-sm s-12" id="rua" name="rua" value="<?= !empty($data) ? $data->rua : '' ?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nome" class="col-form-label s-12">Bairro</label>
                                <input type="text" class="form-control form-control-sm s-12" id="bairro" name="bairro" value="<?= !empty($data) ? $data->bairro : '' ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="float-right p-2">
                    <button type="submit" class="btn btn-success btn-xs">Salvar</button>
                    <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Voltar</button>
                </div>
            </div>   
    </form>
</div>