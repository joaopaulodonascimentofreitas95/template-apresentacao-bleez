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

//BASE DO SITE
define('BASE', "http://localhost:81/teste");
define('URL_PDT', BASE."/produto");
define('URL_PDT_EDIT', BASE."/pdt");

define('SITENAME','Projeto Pro PHP');
define('SITEDESC','Descrição do site');
define('SITETAGS','tags do site');

//DEFINE O SERVIDOR DE E-MAIL
define('MAILUSER','');
define('MAILPASS','');
define('MAILPORT','');
define('MAILHOST','');

//MEUS DADOS
define('ENDERECO','Rua Emilo de moraes 1207, Soledade / RS. Cep: 99.300-000');
define('TELEFONE','(54) 3381.2185');

//DEFINE BANCO DEDADOS
define('DATABASE', [
    'HOST' => 'localhost',
    'USER' => 'root',
    'PASS' => '',
    'NAME' => ''
]);



/*****************************
GetHome:: Sistema identificador de rotas básico
*****************************/

function getHome(){
	$url = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
	$url = explode('/', $url);
	$url[0] = ($url[0] == NULL ? 'index' : $url[0]);
	
		if(file_exists('tpl/'.$url[0].'.php')){
			 require_once('tpl/'.$url[0].'.php');
		}elseif(file_exists('tpl/'.$url[0].'/'.$url[1].'.php')){
			 require_once('tpl/'.$url[0].'/'.$url[1].'.php');
		}else{
			 require_once('tpl/404.php');
		}
}

function getFileInc(string $FileName){
	require("tpl/{$FileName}");
}

function setHome(){
		echo BASE;	
}




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
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/10/13")),
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
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 03",
			"pdt_name"=> "produto-04",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 867,
			"pdt_offer" => 497,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/10/07")),
			"pdt_status" => '1'
		],
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 04",
			"pdt_name"=> "produto-04",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 867,
			"pdt_offer" => 497,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/02/07")),
			"pdt_status" => '1'
		],
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 05",
			"pdt_name"=> "produto-05",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 1200,
			"pdt_offer" => 578,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/10/13")),
			"pdt_status" => '1'
		],	
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 06",
			"pdt_name"=> "produto-06",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 867,
			"pdt_offer" => 497,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/02/07")),
			"pdt_status" => '1'
		],		
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 07",
			"pdt_name"=> "produto-07",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 867,
			"pdt_offer" => 497,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/10/07")),
			"pdt_status" => '1'
		],
		[
			"pdt_cover" => "uploads/pdt.png",
			"pdt_title"=> "Produto 08",
			"pdt_name"=> "produto-08",
			"pdt_description" => "Li vários videos de analises e comprei pelo melhor custo beneficio. Pelo valor realmente vale a pena, mas se quiser gastar mais um pouco procure outro com maior capacidade de armazenamento e velocidade.",
			"pdt_price" => 867,
			"pdt_offer" => 497,
			"pdt_offer_start" => date("d/m/Y",strtotime("2018/01/07")),
			"pdt_offer_end" => date("d/m/Y",strtotime("2018/02/07")),
			"pdt_status" => '1'
		]
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



function getHeaderPage(){
	$metaData = [
		"title" => "404 | Opssss não encontrado! ".SITENAME,
		"description" => "Desculpe, não conseguimos encontrar a página que você está procurando!",
		"keywords" => "",
		"author" => "João Paulo do Nascimento Freitas",
		"url" => BASE,
		"language" => "pd-br",
		"robots" => "INDEX,FOLLOW",
	];

	$url = strip_tags(trim(filter_input(INPUT_GET, 'url', FILTER_DEFAULT)));
	$url = explode('/', $url);
	$url[0] = ($url[0] == NULL ? 'index' : $url[0]);


	switch ($url[0]) {
		case 'index':
			$metaData['title'] = "Bem vindo(a) a ".SITENAME;
			$metaData["description"] ="Bem vindo ao projeto desenvolvido para o processo de seleção da Bleez.";
			return (object)$metaData;
			break;

		case 'produto':

			if(empty($url[1])):
				return (object)$metaData;
			elseif(in_array($url['1'], getNameProducts())):
				$pdt = (object)listProducts($url[1]);
				$metaData['title'] = $pdt->pdt_title." ". SITENAME;
				$metaData["description"] = $pdt->pdt_description;			
				return (object)$metaData;
		 	endif; 
			
			break;

		case 'pdt':
			if(empty($url[1])):
				return (object)$metaData;
			elseif(in_array($url['1'], getNameProducts())):
				$pdt = (object)listProducts($url[1]);
				$metaData['title'] = "Edição do produto ".$pdt->pdt_title." ". SITENAME;
				$metaData["description"] = $pdt->pdt_description;			
				return (object)$metaData;
		 	endif; 
			break;
		
		default:
			return (object)$metaData;
			break;
	}

}


function getInformationPage(){
	$informationPage = [];
	$url = getUrl();
	switch ($url['0']) {
		case 'index':
		return $informationPage = [
					 	"page_title" => SITENAME,
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