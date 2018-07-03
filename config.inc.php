<?php

/**
 *	Created by: João Paulo do Nascimento Freitas
 *	User:	joaopaulo
 *	Data: 03/07/2018
 */

/**
 *	Composer Autoload
 */
require_once("vendor/autoload.php");

/**
 *	Config
 */
define('DATABASE', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASS' => '',
    'NAME' => ''
]);

define("BASE", "http://localhost:81/teste");
define("SITE_NAME", "Teste Bleez");
define("SITE_SUBNAME", "Subtitle");


/**
 *	Functions
 */
function getUrl(){
	$url = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
	$url = (empty($url) ? 'index' : $url);
	$url = explode('/', $url);
	return $url;
}


function listProducts($pdt_name = null){
	$pdts = [
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 01",
			"pdt_name"=> "produto-01",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 1200,
			"pdt_offer" => 578,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/03/07")),
			"pdt_status" => '1'
		],	
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 02",
			"pdt_name"=> "produto-02",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 867,
			"pdt_offer" => 497,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/02/07")),
			"pdt_status" => '1'
		],		
	];
	if(!empty($pdt_name)):
		foreach ($pdts as $p) {
			if($p["pdt_name"] == $pdt_name):
				return $p;
			endif;
		}
	else:
		return  $pdts;
	endif;
}


function limita_caracteres($texto, $limite, $quebra = true){
   $tamanho = strlen($texto);
   if($tamanho <= $limite){ //Verifica se o tamanho do texto é menor ou igual ao limite
      $novo_texto = $texto;
   }else{ // Se o tamanho do texto for maior que o limite
      if($quebra == true){ // Verifica a opção de quebrar o texto
         $novo_texto = trim(substr($texto, 0, $limite))."...";
      }else{ // Se não, corta $texto na última palavra antes do limite
         $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o útlimo espaço antes de $limite
         $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto até a posição localizada
      }
   }
   return $novo_texto; // Retorna o valor formatado
}

function getNameProducts(){
	$Pdts =[];
	foreach(listProducts() as $pdt):
		$Pdts[] = $pdt["pdt_name"];
	endforeach;
	return $Pdts;
};


function getInformationPage(){
	$informationPage = [];
	$url = getUrl();
	switch ($url['0']) {
		case 'index':
		return $informationPage = [
					 	"page_title" => SITE_NAME." - ".SITE_SUBNAME,
		 				"page_description" => "Bem vindo ao projeto desenvolvido para o processo de seleção da Bleez."
		 			];	 
		break;
		case 'produto':		
			if(empty($url[1])):
				return $informationPage = [
					 	"page_title" => "Erro ao encontrar página",
		 				"page_description" => "Desculpe, não conseguimos encontrar a página que você está procurando!"
		 			];	 
			else:
				if($url[1] == "create"):
					$informationPage = [
					 	"page_title" => "Adicionar Produto",
		 				"page_description" => "Adicionar ou atualizar informações de um produto"
		 			];	 	
		 		elseif(in_array($url['1'], getNameProducts() )):
		 				$informationPage = [
					 	"page_title" => "Produto Teste",
		 				"page_description" => "dsdfsfs"
		 			];	 
				endif;
			endif;

			return $informationPage;
			break;
		
		default:
			return $informationPage = [
					 	"page_title" => "Erro ao encontrar página",
		 				"page_description" => "Desculpe, não conseguimos encontrar a página que você está procurando!"
		 			];	
			break;
	}

}


/**
 *	Retorna arquivos css para a página
 */
function getFilesCss(){
	$DirPath = "Assets/css/";	
	if(is_dir($DirPath)):
		$files = scandir($DirPath,1);
		if(!empty($files)):
			 foreach($files as $file):
			 	if(($file != "." && $file != "..") && !is_dir("Assets/css/{$file}") && file_exists("Assets/css/{$file}")):
			 		echo "<link rel='stylesheet' href='".BASE."/Assets/css/{$file}'>\n";
			 	endif;
			 endforeach;
		endif;
	endif;
}
