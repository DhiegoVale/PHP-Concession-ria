<?php
include('connection.php');
class Carro extends ConnectionBD
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = $this->connect();
    }

    public function get()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM carro;");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getById($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM carro WHERE id_carro = :id_carro;");
        $stmt->bindParam(':id_carro', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function insert($modelo_carro, $cor_carro, $valor, $ano)
    {
        $stmt = $this->pdo->prepare("INSERT INTO carro(modelo_carro,cor_carro,valor,ano) VALUES(:modelo_carro,:cor_carro,:valor, :ano);");
        $stmt->bindParam(':modelo_carro', $modelo_carro);
        $stmt->bindParam(':cor_carro', $cor_carro);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':ano', $ano);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function update($modelo_carro, $cor_carro, $valor, $ano, $id_carro)
    {
        $stmt = $this->pdo->prepare('UPDATE carro SET modelo_carro = :modelo_carro, cor_carro = :cor_carro, valor = :valor,ano = :ano WHERE id_carro = :id_carro;');
        $stmt->bindParam(':modelo_carro', $modelo_carro);
        $stmt->bindparam(':cor_carro', $cor_carro);
        $stmt->bindParam(':valor', $valor);
        $stmt->bindParam(':ano', $ano);
        $stmt->bindParam(':id_carro', $id_carro);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function delete($id_carro)
    {
        $stmt = $this->pdo->prepare('DELETE FROM carro WHERE id_carro = :id_carro');
        $stmt->bindParam(':id_carro', $id_carro);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
