<?php

namespace App\Http\Controllers;

use App\Models\ProdutoModel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Produto extends Controller
{


    public function listarProdutos()
    {
        $produtos = ProdutoModel::all();
        return $produtos;
    }

    public function adicionarProduto(Request $request)
    {
        $img = $request->file('file-img');

        $validator = Validator::make($request->all(), [
            'file-img' => 'required|image|mimes:jpeg,png,jpg,gif|',
            'nome' => 'required',
            'descricao' => 'required',
            'preco' => 'required',
        ],
            [
                'file-img.required' => 'Selecione uma imagem',
                'file-img.image' => 'O arquivo tem que ser uma imagem',
                'nome.required' => 'O nome do produto precisa ser preenchido',
                'descricao.required' => 'A descrição do produto precisa ser preenchido',
                'preco.required' => 'O preço do produto precisa ser preenchido',
            ]
        );

        if ($validator->fails())
        {
            return redirect('cadastroProduto')
                ->withErrors($validator)
                ->withInput();
        }

            $nomeAleatorio = $img->hashName();

            $request->file('file-img')->storeAs('uploads', $nomeAleatorio, 'public');


            $data = [
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'preco' => $request->preco,
                'imagem' => $nomeAleatorio,
            ];

            if(ProdutoModel::create($data))
            {
                session()->flash('success', 'O produto foi cadastrado com sucesso!');
                return redirect('cadastroProduto');
            }
        }

        public function alterarProduto($id)
        {
            $title = 'Página de alteração de produto - Loja';

            return view ('alterar', ['title' => $title,
                                    'produtos' => ProdutoModel::find($id)
                                ]);
        }

        public function atualizarProduto($id, Request $request)
        {
            $img = $request->file('file-img');

            if ($img != '') {
                $validator = Validator::make($request->all(), [
                    'file-img' => 'required|image|mimes:jpeg,png,jpg,gif|',
                    'nome' => 'required',
                    'descricao' => 'required',
                    'preco' => 'required',
                ],
                    [
                        'file-img.required' => 'Selecione uma imagem',
                        'file-img.image' => 'O arquivo tem que ser uma imagem',
                        'nome.required' => 'O nome do produto precisa ser preenchido',
                        'descricao.required' => 'A descrição do produto precisa ser preenchido',
                        'preco.required' => 'O preço do produto precisa ser preenchido',
                    ]
                );

                if ($validator->fails()) {
                    return redirect('admins')
                        ->withErrors($validator)
                        ->withInput();
                }

                $nomeAleatorio = $img->hashName();

                $request->file('file-img')->storeAs('uploads', $nomeAleatorio, 'public');


                $data = [
                    'nome' => $request->nome,
                    'descricao' => $request->descricao,
                    'preco' => $request->preco,
                    'imagem' => $nomeAleatorio,
                ];

                if (ProdutoModel::where('id', $id)->update($data)) {
                    session()->flash('success', 'O Produto '.$data['nome'].' foi atualizado com sucesso!');
                    return redirect('admins');
                }


            } else {

                $data = [
                    'nome' => $request->nome,
                    'descricao' => $request->descricao,
                    'preco' => $request->preco,
                ];

                if (ProdutoModel::where('id', $id)->update($data)) {
                    session()->flash('success', 'O Produto '.$data['nome'].' foi atualizado com sucesso!');
                    return redirect('admins');
                }
            }
        }




    public function excluirProduto($id)
    {
        ProdutoModel::where('id', $id)->delete();
        return redirect('admins');
    }

}
