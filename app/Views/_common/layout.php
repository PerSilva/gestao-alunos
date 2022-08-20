<!--
    * [Arquivo com a view que contém a estrutura de layout do sistema, o conteudo de cada página é carregado no corpo do layout, mantendo assim o padrão e facilitando a manutenção.]
    *[A tabela de alunos é injetada via AJAX dinamicamente, com isso toda ação referente ao aluno é atualizada em tempo real.]
    * @package  [Alunos]
    * @category [HTML - View]
    * @name     [layout.php]
    * @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
    * @version  [1.0.0] 
 -->
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?= APP_NAME ?></title>
        
        <!-- Base URL -->
        <script> var baseUrl = "<?php echo BASE_URL?>";</script>
        
        <!-- Carregamento do Menu Lateral -->   
        <?= $this->include( '_common/head' ) ?>  
        
    </head>
    <body>
        <!-- Corpo da página -->
        <div id="app">
            <!-- Pre loader -->
            <div id="loader" class="loader">
                <div class="plane-container">
                    <div class="preloader-wrapper small active">
                        <div class="spinner-layer spinner-blue">
                            <div class="circle-clipper left">
                                <div class="circle"></div>
                            </div><div class="gap-patch">
                            <div class="circle"></div>
                        </div><div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Carregamento do Menu Lateral -->   
            <?= $this->include( '_common/sideBar' ) ?>

            <!-- Carregamento da Navbar -->
            <div class="has-sidebar-left">
                <div class="pos-f-t">
                    <div class="collapse" id="navbarToggleExternalContent">
                        <div class=" pt-2 pb-2 pl-4 pr-2">
                            <a href="#" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-expanded="false"
                            aria-label="Toggle navigation" class="paper-nav-toggle paper-nav-white active "><i></i></a>
                        </div>
                    </div>
                </div>
                <div class="sticky">
                    <div class="navbar navbar-expand navbar-dark bg-dark  d-flex justify-content-between bd-navbar blue accent-3">
                        <div class="relative">
                            <a href="#" data-toggle="offcanvas" class="paper-nav-toggle pp-nav-toggle">
                                <i></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Conteúdo da view de origem -->
            <?= $this->renderSection('content');?>

            <div class="control-sidebar-bg shadow white fixed"></div>  
        </div>
        <!-- Arquivo JS da página  de origem-->
        <?= $this->renderSection('script');?>
    </body>
</html>