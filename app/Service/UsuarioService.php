<?php

namespace App\Service;

use App\Models\Usuario;

class UsuarioService // classe que armazena as funções 
{
    public function create (array $dados ){ // cadastrar algo novo
        $user = Usuario::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'password'=> $dados['password']
        ]); // comunicação com o banco

        return $user;

    }

    public function update(array $dados){
        $usuario = Usuario::find($dados['id']);

        if($usuario == null){
            return[
                'status'=> false,
                'message'=> 'usuario não encontrado'
            ];
        }

        //isset: verificar se a chave existe no array
        if(isset($dados['nome'])){
            $usuario->nome = $dados['nome'];
        }
      

        if(isset($dados['email'])){
            $usuario->email = $dados['email'];
        }
        

        if(isset($dados['password'])){
            $usuario->password = $dados['password'];
        }
       
        $usuario->save();

        return [
            'status'=>true,
            'message'=>'Atualizado com sucesso'
        ];
    }

    public function delete($id){
        $usuario = Usuario::find($id);

        if($usuario == null){
            return[
                'status' => false,
                'message'=> "Usuário não encontrado"
            ];
        }

        $usuario->delete();

        return [
            'status'=>true,
            'message'=>'Usuário excluído com sucesso'
        ];
    }

    public function findById($id){ // pesquisa por ID
        $usuario = Usuario::find($id); // é igual o select * from 

        if($usuario == null){
            return [
                'status'=> false,
                'message'=> 'Usuário não encontrado'
            ];
        }

        return[
            'status'=> true,
            'message'=> 'Usuario encontrado',
            'data'=> $usuario
        ]; 
    }

    public function getAll(){ // buscar todos, listar toda a tabela
        $usuarios = Usuario::all();

        return[
            'status' => true,
            'message' => 'Pesquisa efetuada com sucesso',
            'data' => $usuarios
        ];
    }

    public function searchByName($nome){ // pesquisa por nome
        $usuarios = Usuario::where('nome', 'like', '%'. $nome . '%')->get();

        if($usuarios->isEmpty()){
            return[
                'status' => false,
                'message' => 'Sem resultados'

            ];
        }

        return[
            'status' => true,
            'message' => 'Resultados Encontrados',
            'data' => $usuarios
        ];
    }

    public function searchByEmail($email){ // pesquisa por nome
        $usuarios = Usuario::where('email', 'like', '%'. $email . '%')->get();

        if($usuarios->isEmpty()){
            return[
                'status' => false,
                'message' => 'Sem resultados'

            ];
        }

        return[
            'status' => true,
            'message' => 'Resultados Encontrados',
            'data' => $usuarios
        ];
    }
}