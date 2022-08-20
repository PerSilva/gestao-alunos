<!--
    * [Arquivo com a view que mostra os alunos cadastrados em forma de slider]
    *[São exibidas as fotos do alunos e as informações dele.]
    * @package  [Alunos]
    * @category [HTML - View.]
    * @name     [index.php]
    * @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
    * @version  [1.0.0] 
 -->

<!-- Base URL -->
<script> var BASE_URL = "<?php echo BASE_URL; ?>";</script>

<!-- Carrega o layout padrão -->
<?php $this->extend( '_common/layout' ) ?>

<!-- Conteúdo da página -->
<?= $this->section('content')?>
    <div class="page has-sidebar-left">
        <div class="card mt-1">
                <div class="card-header white">
                  <h6><strong>Alunos Cadastrados</strong></h6>
                </div>
                <div class="card-body">
                    <div class="lightSlider masonry-container" data-item="3" data-item-md="3"  data-item-sm="1" data-auto="true" data-loop="true">
                        <?php if($data) :?>
                            <?php foreach ($data as $item) :?>
                                <div>
                                    <div class="text-center">
                                        <img class="rounded-circle img-100 img-border" src="<?= UPLOAD_PATH.$item->path ?>"  alt="">
                                        <h5><?= $item->nome ?></h5>
                                        <ul>
                                            <li><strong>Rua: </strong><?= $item->rua ?></li>
                                            <li><strong> Bairro: </strong><?= $item->bairro ?></li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach?>
                        <?php else :?>
                            <div>
                                <div class="text-center">
                                    <img class="rounded-circle img-100 img-border" src="assets/img/dummy/u1.png" alt="">
                                    <h5>Nenhum Aluno Cadastrado</h5>
                                </div>
                            </div>
                        <?php endif?>
                    </div>
                </div>
        </div>
    </div>
<?= $this->endSection(); ?>

<!-- Arquivo JS da página -->
<?= $this->section('script')?>
    <script src="<?= base_url('assets/plugins/app.js') ?>"></script>
    <script src="<?= base_url( 'assets/js/Home/home.js' ) ?>"></script>
<?= $this->endSection(); ?> 

