<?php
class ConnectionBD{
    private $host = 'localhost';
    private $user = 'root';
    private $port = 3306;
    private $password = 'elinardy';
    private $db_name = 'carro';
    private $pdo; 

    public function connect() {
        $dsn = "mysql:host={$this->host};
        port={$this->port};
        dbname={$this->db_name};charset=utf8mb4";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];
  
        try {
            $this->pdo = new PDO($dsn, $this->user, 
            $this->password, $options);
        } catch (PDOException $e) {
            throw new Exception('Connection failed: ' . 
            $e->getMessage());
        }
        return $this->pdo;
    }
    // public function insert($modelo_carro, $cor_carro, $valor, $ano){
    // $stmt = $this->pdo->prepare("INSERT INTO carro(modelo_carro,cor_carro,valor,ano) VALUES(:modelo_carro,:cor_carro,:valor, :ano);");
    // $stmt -> bindParam(':modelo_carro',$modelo_carro);
    // $stmt -> bindParam(':cor_carro',$cor_carro);
    // $stmt -> bindParam(':valor',$valor);
    // $stmt -> bindParam(':ano',$ano);
    // $stmt -> execute();
    // return true;
    // }
    // public function update($modelo_carro, $cor_carro, $valor, $ano,$id_carro){
    //   $stmt = $this->pdo->prepare('UPDATE carro SET modelo_carro = :modelo_carro, cor_carro = :cor_carro, valor = :valor,ano = :ano WHERE id_carro = :id_carro;');
    //   $stmt -> bindParam(':modelo_carro',$modelo_carro);
    //   $stmt->bindparam(':cor_carro',$cor_carro);
    //   $stmt -> bindParam(':valor',$valor);
    //   $stmt -> bindParam(':ano',$ano);
    //   $stmt->execute();
    //   return true;
    // }
    // public function delete($id_carro){
    //     $stmt = $this->pdo->prepare('DELETE FROM carro WHERE id_carro = :id_carro');
    //     $stmt -> bindParam(':id_carro',$id_carro);
    //     $stmt->execute();
    //     return true;
    // }
}