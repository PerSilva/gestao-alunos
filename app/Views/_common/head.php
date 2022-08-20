<!--
    * [Arquivo que carrega a view com os arquivos JS, CSS e Plugins.]
    *
    * @package  [Alunos]
    * @category [HTML - View]
    * @name     [head.php]
    * @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
    * @version  [1.0.0] 
 -->
<!-- Carregamento dearquivos CSS -->
<link href="<?= base_url('assets/css/app.css') ?>" rel="stylesheet" >
<link href="<?=base_url('assets/plugins/fontawesome/css/all.min.css')?>" rel="stylesheet">
<link href="<?=base_url('assets/css/colors.min.css')?>" rel="stylesheet">
<link href="<?=base_url('assets/css/animate.min.css')?>" rel="stylesheet">  

<!-- Carregamento de  arquivos JS -->
<script src="<?= base_url('assets/plugins/app.js') ?>"></script>
<script src="<?=base_url('assets/plugins/block-ui/block.ui.min.js')?>"></script>
<script src="<?= base_url( 'assets/js/_common/global.js' ) ?>"></script>
<script src="<?=base_url( 'assets/plugins/sweetalert/sweetalert.min.js' ) ?>"></script>