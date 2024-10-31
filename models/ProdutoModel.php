<?php

namespace Model;

use Model\VO\UsuarioVO;
use Model\Database;

final class ProdutoModel extends Model {

    public function selectAll($vo){
        $db = new Database();

        $query = "
        SELECT p.*
        FROM produtos p 
        INNER JOIN categoria c ON p.id_categoria = c.id";

        $data = $db->select($query);

        $arrayList = [];

        foreach ($data as $row) {
            $vo = new ProdutoVO($row['id'], $row['id_categoria'], $row['nome'], $row['descricao'], $row['preco'], $row['foto']);
            array_push($arrayList, $vo);
        }

        return $arrayList;
    }

    public function selectOne($vo) {
        $db = new Database();

        $query = "        
        SELECT p.* 
        FROM produtos p 
        INNER JOIN categoria c ON p.id_categoria = c.id 
        WHERE p.id = :id";

        $binds = [':id' => $vo->getId()];

        $data = $db->select($query, $binds);

        return new ProdutoVO(
            $data[0]['id'],
            $data[0]['id_categoria'],
            $data[0]['nome'],
            $data[0]['descricao'],
            $data[0]['preco'],
            $data[0]['foto']
        );
    }
    
    public function insert($vo) {
        $db = new Database();
        $query = "INSERT INTO produtos (id_categoria, nome, descricao, preco, foto) 
                  VALUES (:id_categoria, :nome, :descricao, :preco, :foto)";
        $binds = [
            ":id_categoria" => $vo->getIdCategoria(), 
            ":nome" => $vo->getNome(),
            ":descricao" => $vo->getDescricao(),
            ":preco" => $vo->getPreco(),
            ":foto" => $vo->getFoto()
        ];

        return $db->insert($query, $binds);
    }


    public function update($vo) {
        $db = new Database();
        if(empty($vo->getFoto())){
            $query = "UPDATE produtos SET id_categoria = :id_categoria, nome = :nome, descricao = :descricao, preco = :preco
            WHERE id = :id";
            
            $binds = [
                ":id_categoria" => $vo->getIdCategoria(),
                ":nome" => $vo->getNome(),
                ":descricao" => $vo->getDescricao(),
                ":preco" => $vo->getPreco(),
                ":id" => $vo->getId()
            ];
        }else{
            $query = "UPDATE produtos SET id_categoria = :id_categoria, nome = :nome, descricao = :descricao, preco = :preco, foto = :foto
            WHERE id = :id";
            
            $binds = [
                ":id_categoria" => $vo->getIdCategoria(),
                ":nome" => $vo->getNome(),
                ":descricao" => $vo->getDescricao(),
                ":preco" => $vo->getPreco(),
                ":foto" => $vo->getFoto(),
                ":id" => $vo->getId()
            ];
        }

        return $db->execute($query, $binds);
    }

    public function delete($vo) {
        $db = new Database();
        $query = "DELETE FROM produtos WHERE id = :id";
        $binds= [":id" => $vo->getId()];

        return $db->execute($query, $binds);
    }
}
