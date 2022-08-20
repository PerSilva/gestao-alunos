<?php 
/** 
* [Arquivo que busca os dados dos alunos e envia pra view home.]
*
* @package  [Alunos]
* @category [Classe - Controller]
* @name     [HomeController.php]
* @author   [Thiago Henrique Pereira da Silva <thyhanry@hotmail.com>]
* @version  [1.0.0] 
*/

namespace App\Controllers\Home;

use App\Controllers\BaseController;
use App\Models\Student\StudentModel;

class HomeController extends BaseController
{
    
    /**
     * [Método responsável por carregar a view de login do sistema]
     * @return [html] [View]
     */
    public function index()
    {	
        $studentModel = new StudentModel();
        $data = $studentModel->findAll();
		$dataView = [
			'data' => $data ? $data : 0
		];
        return view('home/index', $dataView);
    }
}
