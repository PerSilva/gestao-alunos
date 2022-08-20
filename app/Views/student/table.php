<!--
    * [Arquivo com a view que contém a tabela com os alunos cadastrados.]
    * [A tabela ja vem com um datable que permite a pesquisa de acordo com o nome das colulas e também com opção de ordenação por coluna.]
    * @package  [Alunos]
    * @category [HTML - View.]
    * @name     [table.php]
    * @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
    * @version  [1.0.0] 
 -->
<table class="table table-bordered table-sm table-hover data-tables "  data-options='{ "paging": false; "searching":true}'>
    <thead>
        <tr>
            <th>Nome</th>
            <th>Rua</th>
            <th>Bairro</th>
            <th>Criado em</th>
            <th style="width: 10%;">Ações</th>
        </tr>
    </thead>
    <tbody>
        <!-- Preenche a tabela com os clientes -->
        <?php foreach( $data as $item ) :?>
            <tr>
                <td>
                    <div class="avatar avatar-md mr-3 mt-1 float-left">
                        <img src="<?= UPLOAD_PATH.$item->path ?>" alt="">
                    </div>
                    <div>
                        <div>
                            <?= $item->nome ?>
                        </div>
                    </div>
                </td>
                <td><?= $item->rua?></td>
                <td><?= $item->bairro?></td>
                <td><?= date('d/m/Y', strtotime($item->created_at)) ?></td>
                <td>
                    <a href="#" title="Editar" class="mr-3" onclick="create('<?= $item->chave ?>')">
                        <i class="icon-edit text-primary s-18 "></i> 
                    </a>
                    <a href="#" title="Excluir" onclick="confimDelete('<?= $item->chave ?>')">
                        <i class="icon-trash text-danger s-18"></i>    
                    </a>
                </td>
            </tr>
        <?php  endforeach ?>
    </tbody>
</table>
<!-- Carrega o app.js para poder montar a tabela  -->
<script src="<?= base_url('assets/plugins/app.js') ?>"></script>
<script src="<?=base_url('assets/plugins/block-ui/block.ui.min.js')?>"></script>