<?php
/**
 * Created by PhpStorm.
 * User: João Paulo do Nascimento Freitas
 * Date: 04/07/2018
 * Time: 13:20
 */

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);
$postData = array_map('strip_tags', $postData);
$postData = array_map('trim', $postData);

$action = $postData['action'];
unset($postData['action']);

require_once __DIR__ . '/config.inc.php';

switch ($action) {

	case 'frete':	

		if(in_array("", $postData)):
			$trigger = new \Source\Helper\Trigger;

			$json['notify'][] = $trigger->notify('Informe um CEP válido para calcular valor do frete!', 'blue', 'icon-cross', 3000);
		else:		

			$ship = new \Source\Models\Shipment;

			// INVOCAÇÃO DO MÉTODO
			$formats = $ship->quote($postData["cep"], '1', '20', '20', '20');

			$optFretes = null;
			// EXIBE A SAÍDA NA TELA>";
			foreach ($formats as $formatShip):
				$servico = $ship->getServiceName(str_pad($formatShip->Codigo, 5, '0', STR_PAD_LEFT));
				$totalPagar = "R$ ". number_format( $postData['preco'] + $formatShip->Valor,2, ",", ".");
				$optFretes .= "<div class='information_frete_opt'>";
	    		$optFretes .= "<p><b>Entrega:</b> {$formatShip->Codigo} - {$servico}";
	    		$optFretes .= "<p><b>Valor:</b> R$ {$formatShip->Valor}</p>";
	    		$optFretes .= "<p><b>Prazo:</b> {$formatShip->PrazoEntrega} dias</p>";
	    		$optFretes .= "<p><b>Produto + Frete:</b> {$totalPagar}</p>";
	    		$optFretes .= "</div>";
			endforeach;

			if(!empty($optFretes)):
				$json["success"] = $optFretes;
			else:
				$json["success"] = $json['notify'][] = $trigger->notify('<b>Oppsss:</b> Não foi possível calcular frete para esse CEP.', 'blue', 'icon-info', 3000);;
			endif;

		endif;	
	break;


	case 'pdt_create':
		//var_dump($postData);

		$postData["pdt_status"] = (!empty($postData["pdt_status"]) ? '1' : '0');

		if(in_array("", $postData)):
			$trigger = new \Source\Helper\Trigger;
			$json['notify'][] = $trigger->notify('<b>OPPSSS:</b> existem campos vazios. Favor, preencha os campos para cadastrar um novo produto.', 'blue', 'icon-cross', 3000);
		else:	

			// $postData["pdt_price"] = (!empty($postData["pdt_price"]) ?  :);

		endif;
		var_dump($postData);
		$json["result"] = null;
	break;

	case 'notify_status':

        if ($postData['status'] == 'true'){
            $json['notify'][] = $trigger->notify('Informe um CEP válido para calcular valor do frete!', 'red', 'icon-checkmark', 3000);            
            break;
        }

        if ($postData['status'] == 'false'){
            $json['notify'] = $trigger->notify('teste', 'blue', 'icon-info', 3000);
            break;
        }

        break;
}

echo json_encode($json);