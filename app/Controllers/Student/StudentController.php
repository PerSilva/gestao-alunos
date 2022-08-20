<?php 
/** 
* [Arquivo que contém os métodos referentes ao CRUD de alunos.]
* @package  [Alunos]
* @category [Classe - Controller]
* @name     [StudentController.php]
* @author   [Thiago Silva <thyhanry@hotmail.com>]
* @version  [1.0.0] 
*/

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\Student\StudentModel;
use Exception;

class StudentController extends BaseController
{
    /**
     * [Método responsável por carregar a estrutura da tela de alunos.]
     * @return [html] [View]
     */
    public function index()
    {	
        return view('student/index');
    }
	/**
	 * [Método responsável por validar as informações antes de inserir]
	 * @return [array]
	 */
	public function validateInsert()
	{
		try {
			$dataPost = $this->request->getPost();
			if((isset($_FILES['documentos']) && !isset($dataPost['chave'])) || (isset($_FILES['documentos']) && isset($dataPost['chave']))){
				$dataPost['path'] = $_FILES['documentos']['name'][0];
				if($this->_validateTypeFile($_FILES['documentos']['name'][0])) {
					$this->_uploadFile($_FILES);
					$return = $this->_insert($dataPost);
				} else {
					$return = [
						'status'	=> false,
						'message'	=> 'Permitido somente extensão JPG.'
					];
				}
			} elseif(isset($dataPost['chave']) && !isset($_FILES['documentos'])) {
				$return = $this->_insert($dataPost);
			} else {
				$return = [
					'status'	=> false,
					'message'	=> 'Foto não selecionada.'
				];
			}
			echo  json_encode($return);
		} catch(Exception $e) {
			$return = [
				'status'	=> false,
				'message'	=> $e->getMessage(),
				'line'		=> $e->getLine()
			];
            echo  json_encode($return);
		}
	}
    /**
	 * [Método responsável por carregar a view com a tabela de alunos]
	 * @return [html] [View]
	 */
	public function getTable()
	{	
		$studentModel = new StudentModel();
		$dataView = [
			'data' => $studentModel->findAll()
		];
		return view('student/table', $dataView);
	}
    /**
     * [Método responsável por carrega a view com o modal de cadastro].
	 * @param string $key [Chave do aluno]
     */
    public function create($key)
    {
		if(!$key) {
			$dataView = [
				'title' => 'Novo Aluno',
				'data' => false
			];
		} else {
			$studentModel = new StudentModel();
			$dataView = [
				'title' => 'Editar Informações',
				'data' => $studentModel->find($key)
			];
		}

        return view('student/form', $dataView);
    }
	/**
	 * [Método responsável por apagar um aluno]
	 * @param string $key [Chave do aluno]
	 * @return [array]
	 */
	public function del($key) {
		$studentModel = new StudentModel();
		$response = $studentModel->delete($key);
		if($response) {
			$return = [
				'status' => true
			];
		} else {
			$return = [
				'status' => false,
				'message' => $response,
				'debug'		=> $studentModel->getLastQuery()->getQuery()
			];
		}
		echo  json_encode($return);
	}
	/**
	 * Valida se o tipo de arquivo é permitido
	 * @param string $file [Nome do arquivo]
	 */
	private function _validateTypeFile($file) {
		return strrchr($file, '.') == '.jpg' ? true : false;
	}
	/**
	 * [Método responsável por realiza o upload do arquivo para a pasta de destino]
	 * @param array $file [Arquivo]
	 */
	private function _uploadFile($file) {
		move_uploaded_file($file['documentos']['tmp_name'][0], UPLOAD_PATH . basename($file['documentos']['name'][0]));
		$this->_renderPicture($file);
	}
	/**
	 * [Método responsável por realiza uma renderização do arquivo para padronizar o tamanho das fotos e economizar espaço no servidor.]
	 * @param array $file [Arquivo]
	 */
	private function _renderPicture($file) {
		$pictue = \Config\Services::image();
		$pictue
		->withFile(UPLOAD_PATH.$file['documentos']['name'][0])
		->fit(400, 400)
		->save(UPLOAD_PATH.$file['documentos']['name'][0]);
	}
	/**
	 * [Método responsável por inserir/atualizar as informações do aluno]
	 */
	private function _insert($dataPost) {
		$studentModel = new StudentModel();
		$response = $studentModel->save($dataPost);
		if($response) {
			$return = [
				'status' => true
			];
		} else {
			$return = [
				'status' => false,
				'message' => $response,
				'debug'		=> $studentModel->getLastQuery()->getQuery()
			];
		}
		return $return;
	}
}