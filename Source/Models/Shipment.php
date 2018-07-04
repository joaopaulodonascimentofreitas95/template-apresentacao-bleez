<?php
/**
 * Created by PhpStorm.
 * User: João Paulo do Nascimento Freitas
 * Date: 04/07/2018
 * Time: 04:27
 */

namespace Source\Models;

class Shipment
{

    /*
     * const urlSoap = URL de cálculo de Preço e Prazo da cotação de Frete
     */
    const urlSoap = 'http://ws.correios.com.br/calculador/CalcPrecoPrazo.asmx?WSDL';

    /*
     * Atributos da cotação de frete
     */
    private $soap;
    private $nCdEmpresa;
    private $sDsSenha;
    private $nCdServico;
    private $sCepOrigem;
    private $nCdFormato;
    private $nVlLargura;

    /*
     * Método Construtor da classe
     */
    public function __construct()
    {
        $this->nCdEmpresa = '';
        $this->sDsSenha = '';
        $this->nCdServico = '04014,04510';
        $this->sCepOrigem = '20081902';
        $this->nCdFormato = 1;
        $this->nVlLargura = '0';
    }


    public function getServiceName(string $codigo){
        $Services = [
            '04014' => "SEDEX",
            '04510' => "PAC",
        ];

        return $Services[$codigo];
    }

    /*
     * Método para fazer o orçamento do frete
     */
    public function quote($sCepDestino, $nVlPeso, $nVlComprimento, $nVlAltura, $nVlLargura, $sCdMaoPropria = 'N', $nVlValorDeclarado = 0, $sCdAvisoRecebimento = 'N')
    {
        //Parâmetros informados para o webservice
        $param = [
            'nCdEmpresa' => $this->nCdEmpresa,
            'sDsSenha' => $this->sDsSenha,
            'nCdServico' => $this->nCdServico,
            'sCepOrigem' => $this->sCepOrigem,
            'sCepDestino' => $sCepDestino,
            'nVlPeso' => $nVlPeso,
            'nCdFormato' => $this->nCdFormato,
            'nVlComprimento' => $nVlComprimento,
            'nVlAltura' => $nVlAltura,
            'nVlLargura' => $nVlLargura,
            'nVlDiametro' => $this->nVlLargura,
            'sCdMaoPropria' => $sCdMaoPropria,
            'nVlValorDeclarado' => $nVlValorDeclarado,
            'sCdAvisoRecebimento' => $sCdAvisoRecebimento
        ];

        // INSTANCIA DO SOAP
        $this->soap = new \SoapClient(self::urlSoap);

        // CONSUMO DO MÉTODO DO WEBSERVICE
        $CalcPrecoPrazo = $this->soap->CalcPrecoPrazo($param);

        // CALLBACK
        $result = (object)$CalcPrecoPrazo->CalcPrecoPrazoResult->Servicos->cServico;
        return $result;
    }
}