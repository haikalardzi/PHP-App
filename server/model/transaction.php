<?php
    require_once '../controllers/connect_database.php';
    class Transaction{
        private $buyer;
        private $seller;
        private $list_item_id;
        private $list_quantity;
        private $conn;

        public function __construct($data){
            $this->buyer = $data[0]["cart_username"];
            $this->seller = "";
            $this->list_item_id = "";
            $this->list_quantity = "";
            for ($i=0; $i < count($data); $i++) {
                $this->seller .= $data[$i]["seller_username"]; 
                $this->list_item_id .= $data[$i]["item_id"];
                $this->list_quantity .= $data[$i]["item_quantity"];
                if ($i < count($data)-1){
                    $this->seller .= ",";        
                    $this->list_item_id .= ",";
                    $this->list_quantity .= ",";
                }
            }
        }
        
        public function createTransaction(){
            $this->conn = connect_database();
            $query1 = "DELETE FROM `cart` WHERE `cart_username` = (?)";
            $stmt1 = $this->conn->prepare($query1);
            if (!$stmt1) {
                die("Error in query preparation". $this->conn->error);
            }
            $stmt1->bind_param("s", $this->buyer);
            $stmt1->execute();

            $headers = array(
                "Content-Type: text/xml;charset=\"utf-8\"",
                "X-API-Key: php",
                "Host". $_SERVER['REMOTE_ADDR']
            );
    
            $request_param = '<?xml version="1.0" encoding="utf-8"?>
            <soap:Envelope xmlns:soap="http://schemas.xmlsoap.org/soap/envelope/">
                <soap:Body>
                    <createTransaction xmlns="http://service.saranghaengbok.org/">
                        <buyer_username xmlns="http://service.saranghaengbok.org/">'. $this->getBuyer(). '</buyer_username>
                        <seller_username xmlns="http://service.saranghaengbok.org/">'. $this->getSeller(). '</seller_username>
                        <item_id xmlns="http://service.saranghaengbok.org/">'. $this->getlistItem(). '</item_id>
                        <quantity xmlns="http://service.saranghaengbok.org/">'. $this->getlistQuantity(). '</quantity>
                    </createTransaction>
                </soap:Body>
            </soap:Envelope>
            ';
    
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $request_param);
            curl_setopt($ch, CURLOPT_URL, "http://host.docker.internal:8081/ws/transaction");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
            $response = curl_exec($ch);
            curl_close($ch);
            if ($response === FALSE) {
                printf("CURL error (#%d): %s<br>\n", curl_errno($ch),
                htmlspecialchars(curl_error($ch)));
            }
    
            $response1 = str_replace('<?xml version="1.0" ?>
            <S:Envelope xmlns:S="http://schemas.xmlsoap.org/soap/envelope/">
                <S:Body>
                    <ns2:createTransactionResponse xmlns:ns2="http://service.saranghaengbok.org/">
                        <return>',"",$response);
            $response2 = str_replace("</return>
            </ns2:createTransactionResponse>
        </S:Body>
    </S:Envelope>","",$response1);
    
            $stmt1->close();
            return $$response2;
            //init webservice with wsdl
        }

        public function getBuyer(){
            return $this->buyer;
        }

        
        public function getSeller(){
            return $this->seller;
        }

        
        public function getlistItem(){
            return $this->list_item_id;
        }

        public function getlistQuantity(){
            return $this->list_quantity;
        }
    }
?>