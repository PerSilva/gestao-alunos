<?php

    namespace App\Models;
    use CodeIgniter\Model;

    class BaseModel extends Model
    {
        protected $returnType 		= 'object';
        protected $useSoftDeletes 	= true;
        protected $deleted_at		= 'deleted_at';
        protected $useTimestamps	= true;
        protected $created_at       = 'created_at';
        protected $updated_at       = 'updated_at';

        /**
         * Gera uma chave aleatoria para identificar o registro ao invés de usar o ID.
         * @param array [data]
         * @return [array]
         */
        protected function generateKey($data)
        {
            $data['data']['chave'] = md5(uniqid(rand(), true));
            return $data;
        }
        /**
         * Retorna as informaçõesde acordo com a chave informada.
         * @param int [id]
         */
        public function getByKey($key)
        {
            $this->select('*');
            $this->where('chave',$key);
            return $this->findAll();
        }
    }