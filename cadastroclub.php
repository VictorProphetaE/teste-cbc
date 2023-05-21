<?php

require 'configuracao.php';

class API
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function createClub($requestData)
    {
        $clube = $requestData['clube'];
        $saldo_disponivel = $requestData['saldo_disponivel'];

        $sql = "INSERT INTO Clube (clube, saldo_disponivel) VALUES (:clube, :saldo_disponivel)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':clube', $clube);
        $stmt->bindParam(':saldo_disponivel', $saldo_disponivel);

        if ($stmt->execute()) {
            $response = [
                'message' => 'Ok'
            ];

            http_response_code(200);
        } else {
            $response = [
                'message' => 'Falha ao cadastrar clube.'
            ];

            http_response_code(500);
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}

$api = new API($connect);

$requestData = json_decode(file_get_contents('php://input'), true);
$api->createClub($requestData);

?>