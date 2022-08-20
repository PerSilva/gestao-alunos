<?php
/** 
* [Arquivo que contém a model referente ao aluno.]
* @package  [Alunos]
* @category [Classe - Model]
* @name     [StudentModel.php]
* @author   [Thiago Silva <thyhanry@hotmail.com>]
* @version  [1.0.0] 
*/

namespace App\Models\Student;
use App\Models\BaseModel;

class StudentModel extends BaseModel
{
	protected $table      		= 'ALUNOS';
	protected $primaryKey 		= 'chave';
	protected $beforeInsert 	= ['generateKey'];

	protected $allowedFields = [
		'chave',
		'nome',
		'rua',
		'bairro',
		'cidade',
		'path'
	];

	//Regras de validação das informações.
	protected $validationRules = [
		'nome' => [
			'rules'	=> 'required'
		]
	];
}
