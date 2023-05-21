<?php

// Configurações do banco de dados
require 'configuracao.php';

class API
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function consumeResource($requestData)
    {
        $clube_id = $requestData['clube_id'];
        $recurso_id = $requestData['recurso_id'];
        $valor_consumo = floatval($requestData['valor_consumo']);
        
        $sql = "SELECT clube, saldo_disponivel FROM Clube WHERE id = $clube_id";
        $result = $this->connect->query($sql);
        // Verifica se o clube existe
        if ($result !== false && $result->rowCount() > 0) {
            $row = $result->fetch(PDO::FETCH_ASSOC);
            $clube = $row['clube'];
            $saldo_anterior = floatval($row['saldo_disponivel']);

            // Verificar o saldo disponível do clube
            if ($saldo_anterior >= $valor_consumo) {
                
                $sql = "SELECT saldo_disponivel FROM Recurso WHERE id = $recurso_id";
                $result = $this->connect->query($sql);
                $row = $result->fetch(PDO::FETCH_ASSOC);
                $saldo_recurso = floatval($row['saldo_disponivel']);
                
                // Verificar o saldo disponível do recurso
                if ($saldo_recurso >= $valor_consumo) {
                    // Atualizar o saldo do clube
                    $novo_saldo_clube = $saldo_anterior - $valor_consumo;
                    $sql = "UPDATE Clube SET saldo_disponivel = $novo_saldo_clube WHERE id = $clube_id";
                    $this->connect->query($sql);

                    // Atualizar o saldo do recurso
                    $novo_saldo_recurso = $saldo_recurso - $valor_consumo;
                    $sql = "UPDATE Recurso SET saldo_disponivel = $novo_saldo_recurso WHERE id = $recurso_id";
                    $this->connect->query($sql);

                    $response = [
                        'clube' => $clube,
                        'saldo_anterior' => $saldo_anterior,
                        'saldo_atual' => $novo_saldo_clube
                    ];

                    http_response_code(200);
                    header('Content-Type: application/json');
                    echo json_encode($response);
                } else {
                    http_response_code(400);
                    echo "O saldo disponível do recurso é insuficiente.";
                }
            } else {
                http_response_code(400);
                echo "O saldo disponível do clube é insuficiente.";
            }
        } else {
            http_response_code(404);
            echo "Clube não encontrado.";
        }
    }
}

$api = new API($connect);

// Consumir recursos
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] === '/consumir-recursos') {
    $data = json_decode(file_get_contents('php://input'), true);

    $api->consumeResource($data);

    exit();
}

$connect = null;
?>