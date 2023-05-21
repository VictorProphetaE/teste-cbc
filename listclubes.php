<?php

require 'configuracao.php';

class API
{
    private $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function listClub()
    {
        $sql = "SELECT id, clube, saldo_disponivel FROM Clube";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();

        $clubes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode($clubes);
    }
}

$api = new API($connect);

$api->listClub();

?>