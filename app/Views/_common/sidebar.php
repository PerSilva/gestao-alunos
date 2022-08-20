<!--
    * [Arquivo com a view do menu lateral]
    * @package  [Alunos]
    * @category [HTML -View]
    * @name     [sidebar.php]
    * @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
    * @version  [1.0.0] 
 -->
<!-- Carregamento do Menu Lateral -->
<aside class="main-sidebar fixed offcanvas shadow">
    <section class="sidebar">
        <!-- Logo da empresa -->
        <div class="w-100px mt-2 mb-3 ml-3">
            <h5><strong>Alunos</strong></h5>
        </div>
        <!-- Usuário logado -->
        <div class="relative">
            <div class="user-panel p-3 light mb-2">
                <div>
                    <div class="float-left info">
                        <h6 class="font-weight-light"><strong>Menu de Navegação</strong></h6>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- Menus de nevegação -->
        <ul class="sidebar-menu">
            <!-- Dashboard -->
            <li class="treeview">
                <a href="<?= base_url()?>">
                    <i class="icon icon-line-chart blue-text s-14"></i><span class="">Dashboard</span>
                </a>
            </li>
            <!-- Alunos -->
            <li class="treeview">
                <a href="<?= base_url('student')?>"><i class="icon icon-book pink-text s-14 "></i>Cadastro</a>
            </li>   
        </ul>   
    </section>
</aside> 