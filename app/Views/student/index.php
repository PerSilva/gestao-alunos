<!--
    * [Arquivo com a view que contém a estrutura da tela principal, que contem a opção de cadastrar,editar e excluir o aluno e também exibe os alunos cadastrados]
    *[A tabela de alunos é injetada via AJAX dinamicamente, com isso toda ação referente ao aluno é atualizada em tempo real.]
    * @package  [Alunos]
    * @category [HTML - View]
    * @name     [index.php]
    * @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
    * @version  [1.0.0] 
 -->

<!-- Carrega o layout padrão -->
<?php $this->extend( '_common/layout' ) ?>

<!-- Conteúdo da página -->
<?= $this->section('content')?>
    <div class="page has-sidebar-left">
        <div class="container-fluid my-3">
            <!-- Tabela de contas a pagar -->
            <div class="card">
                <div class="card-header white">
                    <i class="icon-users blue-text"></i>
                    <strong> ALUNOS </strong>
                </div>     
                <div class="card-body black-text">
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2  s-12">
                            <a href="#"class="btn btn-primary btn-xs float-right mr-3 " onclick="create(0)" >Novo Aluno</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="table"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de CADASTRO/EDIÇÃO -->
        <div class="modal fade" id="modal-create" role="dialog"></div>
    </div>
<?= $this->endSection(); ?>

<!-- Arquivo JS da página -->
<?= $this->section('script')?>
    <script src="<?= base_url( 'assets/js/Student/student.js' ) ?>"></script>
<?= $this->endSection(); ?> 