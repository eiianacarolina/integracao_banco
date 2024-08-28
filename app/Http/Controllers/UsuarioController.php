<?php

namespace App\Http\Controllers;

use App\Service\UsuarioService;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    // orientação ao objeto (td oq reflete do mundo real para o virtual)
    protected $usuarioService;

        public function __construct(UsuarioService $novoUsuarioService){ // construir o que a classe precisa (pré requisitos) para executar o store
            $this->usuarioService = $novoUsuarioService ;  // o valor da classe (class) vai receber o valor da variável

        } 

        public function store(Request $request){
            
            $user = $this->usuarioService->create($request->all()); 

            return $user;
        }

        public function findById($id){
            $result = $this->usuarioService->findById($id);

            return response()->json($result);
        }

        //não tem parametros, pois, ele vai listar todos
        public function index(){
            $result = $this->usuarioService->getAll();

            return response()->json($result);
        }

        public function searchByName(Request $request){
            $result = $this->usuarioService->searchByName($request->nome);

            return response()->json($result);
        }

        public function searchByEmail(Request $request){
            $result = $this->usuarioService->searchByEmail($request->email);

            return response()->json($result);
        }

        public function delete($id){
            $result = $this->usuarioService->delete($id);

            return response()->json($result);
        }

        // para cadastrar/alterar nome ou dados, utilizamos a Request (mais valores na URL)
        public function update(Request $request){
            $result = $this->usuarioService->update($request->all()); // todos os dados 

            return response()->json($result);
        }
}
