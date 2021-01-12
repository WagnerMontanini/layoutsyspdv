<?php

namespace WagnerMontanini\LayoutSyspdv;

use WagnerMontanini\LayoutSyspdv\Helpers;

/**
 * Class LayoutSyspdv
 * @package WagnerMontanini\LayoutSyspdv
 */
abstract class LayoutSyspdv extends Helpers
{
    /** @var array */
    private $syspadm;
    
    /** @var array */
    private $syspplp;

    /** @var array */
    private $syspaplic;

    /** @var array */
    private $syspcar;

    /** @var array */
    private $syspcarac;

    /** @var array */
    private $syspcfo;

    /** @var array */
    private $syspcli;

    /** @var array */
    private $syspaux;

    /** @var array */
    private $syspcmp;

    /** @var array */
    private $syspcrc;

    /** @var array */
    private $syspest;

    /** @var array */
    private $syspestcon;

    /** @var array */
    private $syspgrp;

    /** @var array */
    private $syspfzd;

    /** @var array */
    private $syspfor;

    /** @var array */
    private $syspfun;

    /** @var array */
    private $syspimpfed;

    /** @var array */
    private $syspimppro;

    /** @var array */
    private $sysppplc;

    /** @var array */
    private $syspprp;

    /** @var array */
    private $sysppro;

    /** @var array */
    private $syspprofor;

    /** @var array */
    private $syspppl;

    /** @var array */
    private $sysppdcn;

    /** @var array */
    private $syspram;

    /** @var array */
    private $syspfab;

    /** @var array */
    private $syspsec;

    /** @var array */
    private $syspser;

    /** @var array */
    private $syspsbg;

    /** @var array */
    private $sysptxa;

    /** @var array */
    private $syspvdc;

    /** @var object */
    protected $response;

    /** @var array */
    private $precopraticado = [1, 2, 3];

    /** @var array */
    private $simNao = ["S", "N", ""];

    /** @var array */
    private $statusCar = ["A", "C", "B"];

    /** @var array */
    //private $tibutacao = ["T07", "T12", "T18", "T25", "F00", "I00"];
    
    /** @var array */
    private $pesoVariavel = ["S", "P", "N", "U","M"];
    
    /** @var array */
    private $tipoBonificacao = ["P", "Q", ""];
    
    /** @var array */
    //private $unidadeVenda = ["UN", "KG", "LT", "SRV"];
    
    /** @var array */
    private $produtoAlterado = ["A", "N", ""];
    
    /** @var array */
    private $especializacaoProduto = ["P","G", "O", ""];
    
    /** @var array */
    private $composicao = ["S", "N", "K", "C", ""];
    
    /** @var array */
    private $finalidade = [1, 2, 3, 4, 5, 6, 9];
    
    /** @var array */
    private $arredondarTruncar = ["A", "T", ""];
    
    /** @var array */
    private $producao = ["P", "T", ""];
    
    /** @var array */
    private $baixaEstoque = ["P", "V", ""];
    
    /** @var array */
    private $tipoComposicao = ["N", "K"];
    
    /** @var array */
    private $tipoJuro = ["S", "C"];
    
    /** @var array */
    private $tipoPagamento = ["P", "A"];
    
    /** @var array */
    private $tipoFormaPagamento = ["V-A", "P-A", ""];
    
    /** @var array */
    private $verificaLimiteCredito = [0, 1, 2];
    
    /** @var array */
    private $incidencia = ["E", "S", "A"];
    
    /** @var array */
    private $tipoImposto = ["P", "C"];
    
    /** @var array */
    private $categoriaConta = ["C", "D"];
    
    /** @var array */
    private $tipoPlano = ["A", "S"];
    
    /** @var array */
    private $natureza = ["01", "02", "03", "04", "05", "09"];
    
    /** @var array */
    private $nivelFornecedor = ["P", "S"];
    
    /** @var array */
    private $tipoDesconto = ["P", "V"];
    
    /** @var array */
    private $tipoPreco = [1, 2, 3];
    
    /** @var array */
    private $statusPromocao = ["A", "P", "I"];
    
    /** @var array */
    private $tipoPromocao = ["P", "F", "V", "C"];
    
    /** @var array */
    private $modalidadeDesconto = ["P", "V", "D"];

    /**
     * LayoutSyspdv constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->response = new \stdClass();
        $this->response->errors = new \stdClass();
    }

    /**
     * @return object|null
     */
    public function response()
    {
        return $this->response;
    }
 
    /**
     * @return object|null
     */
    public function error()
    {
        if (!empty($this->response->errors)) {
            return $this->response->errors;
        }
        return null;
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspadm(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspadm[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],35 ) , 35 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspadm =  $this->syspadm;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspaplic(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspaplic[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],4) , 4 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],100 ) , 100 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspaplic =  $this->syspaplic;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspcar(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["004"], $this->statusCar)){
                $this->syspcar[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],19) , 19 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],6 ) , 6 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 40) , 40 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 1) , 1 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["005"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 14) , 14 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcar = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspcar =  $this->syspcar;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspcarac(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspcarac[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],4) , 4 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],100 ) , 100 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspcarac =  $this->syspcarac;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspcfo(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspcfo[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],5) , 5 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],180 ) , 180 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["003"], 40) , 40 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["004"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["005"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["006"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["007"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["008"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["009"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["010"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["011"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["012"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["013"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["014"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["015"], 2) , 2 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["016"], 2) , 2 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["017"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["018"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["019"], 6) , 6 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspcfo =  $this->syspcfo;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspcli(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspcli[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],15) , 15 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["002"],40 ) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["003"], 14) , 14 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["004"], 45) , 45 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["005"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["006"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["007"], 2) , 2 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["008"], 8) , 8 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["009"], 12) , 12 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["010"]) ? $data["010"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["011"]) ? $data["011"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["012"], 2) , 2 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["013"], 3) , 3 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["014"], 3) , 3 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["015"], 25) , 25 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["016"], 20) , 20 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["017"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["018"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["019"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["020"], 30) , 30 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["021"], 30) , 30 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["022"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["023"], 12) , 12 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["024"], 12) , 12 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["025"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["026"], 45) , 45 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["027"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["028"], 10) , 10 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["029"], 20) , 20 , " " ,  STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["030"], 2) , 2 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["031"], 13) , 13 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["032"], 255) , 255 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["033"], 255) , 255 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["034"], 10) , 10 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["035"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["036"], 5) , 5 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["037"], 70) , 70 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["038"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["039"], 7) , 7 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["040"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["041"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["042"], 10) , 10 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["043"], 50) , 50 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["044"], 50) , 50 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["045"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["046"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["047"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["048"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["049"], 12) , 12 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["050"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["051"], 10) , 10 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["052"], 50) , 50 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["053"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["054"]) ? $data["054"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["055"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["056"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["057"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["058"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["059"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["060"], 12) , 12 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["061"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["062"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["063"]) ? $data["063"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["064"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["065"], 12) , 12 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["066"], 50) , 50 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["067"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["068"], 12) , 12 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["069"], 50) , 50 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["070"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["071"], 12) , 12 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["072"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["073"], 12) , 12 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["074"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["075"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["076"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["077"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["078"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["079"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["080"], 15) , 15 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["081"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["082"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["083"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["084"], 10) , 10 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["085"], 12) , 12 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["086"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["087"], 10) , 10 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["088"], 12) , 12 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["089"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["090"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["091"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["092"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["093"], 40) , 40 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["094"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["095"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["096"], 2) , 2 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["097"], 20) , 20 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["098"], 6) , 6 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["099"], 1) , 1 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["100"], 3) , 3 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["101"], 5) , 5 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["102"], 5) , 5 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["103"], 6) , 6 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["104"], 6) , 6 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["105"], 12) , 12 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["106"], 12) , 12 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["107"], 4) , 4 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["108"]) ? $data["108"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["109"]) ? $data["109"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["110"], 6) , 6 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["111"], 6) , 6 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["112"], 60) , 60 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["113"], 60) , 60 , " " , STR_PAD_RIGHT).
            $this->mb_str_pad($this->str_limit_chars($data["114"], 12) , 12 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["115"], 7) , 7 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["116"], 5) , 5 , "0" , STR_PAD_LEFT).
            $this->mb_str_pad($this->str_limit_chars($data["117"], 1) , 1 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->syspcli =  $this->syspcli;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspaux(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspaux[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],20 ) , 20 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["003"]) ? $data["003"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["004"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["005"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["006"]) ? $data["006"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["007"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["008"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["009"]) ? $data["009"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["010"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["011"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["012"]) ? $data["012"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["013"], 1) , 1 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspaux =  $this->syspaux;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspcmp(array $fields): void
    {
        foreach ($fields as $data){
            if($data["001"] == "C" && in_array($data["005"], $this->baixaEstoque) 
            && in_array($data["007"], $this->tipoComposicao) && in_array($data["008"], $this->simNao)){
                $this->syspcmp[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],1) , 1 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],1 ) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["004"]) ? $data["004"] : 0), 3, ".", ""), 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["007"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["008"], 1) , 1 , " " , STR_PAD_RIGHT),9);
            } elseif($data["001"] == "I"){
                $this->syspcmp[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],1) , 1 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],14 ) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["003"]) ? $data["003"] : 0), 3, ".", ""), 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["004"]) ? $data["004"] : 0), 5, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["005"]) ? $data["005"] : 0), 5, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["006"]) ? $data["006"] : 0), 5, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["007"]) ? $data["007"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["008"]) ? $data["008"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["009"]) ? $data["009"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspcmp =  $this->syspcmp;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspcrc(array $fields): void
    {
        foreach ($fields as $data){
            if($data["001"] == "C" && in_array($data["006"], $this->tipoJuro) ){
                $this->syspcrc[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],1) , 1 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],4 ) , 4 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["003"], 3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["004"], 3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["005"], 3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["006"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["007"]) ? $data["007"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["008"]) ? $data["008"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["009"]) ? $data["009"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT),9);
            } elseif($data["001"] == "T" && in_array($data["004"], $this->tipoPagamento) ){
                $this->syspcrc[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],1) , 1 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],4 ) , 4 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 10) , 10 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 4) , 4 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 15) , 15 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["007"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["008"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["009"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["010"]) ? $data["010"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["011"]) ? $data["011"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["012"]) ? $data["012"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["013"], 45) , 45 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["014"], 6) , 6 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["015"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["016"], 6) , 6 , "0" , STR_PAD_LEFT),9);
            } elseif($data["001"] == "P"){
                $this->syspcrc[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],1) , 1 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["002"],"dmY"),8 ) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["003"]) ? $data["003"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["004"]) ? $data["004"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["005"]) ? $data["005"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["006"]) ? $data["006"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["007"], 4) , 4 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["008"]) ? $data["008"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["009"], 6) , 6 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspcrc =  $this->syspcrc;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspest(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspest[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["002"]) ? $data["002"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["003"],"dmY"),8 ) , 8 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["004"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->syspest =  $this->syspest;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspestcon(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspestcon[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],4) , 4 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"], 14) , 14 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["003"],15 ) , 15 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->syspestcon =  $this->syspestcon;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspgrp(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspgrp[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"], 3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["003"],30 ) , 30 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspgrp =  $this->syspgrp;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspfzd(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["003"], $this->tipoFormaPagamento) && in_array($data["004"], $this->simNao) 
            && in_array($data["005"], $this->verificaLimiteCredito) && in_array($data["006"], $this->simNao)
            && in_array($data["008"], $this->simNao) && in_array($data["009"], $this->simNao) && in_array($data["011"], $this->simNao) 
            && in_array($data["012"], $this->simNao) && in_array($data["013"], $this->simNao) && in_array($data["020"], $this->simNao) 
            && in_array($data["021"], $this->simNao) && in_array($data["022"], $this->simNao) && in_array($data["023"], $this->simNao)
            && in_array($data["024"], $this->simNao) && in_array($data["027"], $this->simNao) && in_array($data["031"], $this->simNao)
            && in_array($data["035"], $this->simNao) && in_array($data["039"], $this->simNao) && in_array($data["041"], $this->simNao) 
            && in_array($data["043"], $this->simNao) && in_array($data["044"], $this->simNao) ){
                $this->syspfzd[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 1) , 1 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["007"]) ? $data["007"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["008"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["009"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["010"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["011"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["012"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["013"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["014"]) ? $data["014"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["015"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["016"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["017"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["018"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["019"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["020"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["021"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["022"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["023"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["024"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["025"]) ? $data["025"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["026"]) ? $data["026"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["027"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["028"], 15) , 15 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["029"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["030"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["031"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["032"], 15) , 15 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["033"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["034"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["035"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["036"], 15) , 15 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["037"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["038"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["039"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["040"], 15) , 15 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["041"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["042"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["043"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["044"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["045"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["046"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["047"], 2) , 2 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspfzd =  $this->syspfzd;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspfor(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspfor[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],4) , 4 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"], 40) , 40 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["003"], 40) , 40 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["004"], 20) , 20 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["005"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["006"], 2) , 2 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["007"], 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["008"], 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["009"], 10) , 10 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["010"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["011"], 70) , 70 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["012"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["013"], 6) , 6 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["014"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["015"], 14) , 14 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["016"], 21) , 21 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["017"], 60) , 60 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["018"], 60) , 60 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspfor =  $this->syspfor;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspfun(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspfun[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],4) , 4 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["003"], 5) , 5 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["004"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["005"]) ? $data["005"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["006"]) ? $data["006"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["007"]) ? $data["007"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["008"], 30) , 30 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["009"], 1) , 1 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["010"], 40) , 40 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["011"], 6) , 6 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["012"]) ? $data["012"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->syspfun =  $this->syspfun;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspimpfed(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["003"], $this->incidencia) && in_array($data["007"], $this->tipoImposto) ){
                $this->syspimpfed[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["004"]) ? $data["004"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["005"]) ? $data["005"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 50) , 50 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["007"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["008"]) ? $data["008"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["009"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["010"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["011"], 2) , 2 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspimpfed =  $this->syspimpfed;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspimppro(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspimppro[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["003"], 2) , 2 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->syspimppro =  $this->syspimppro;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function sysppplc(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["003"], $this->categoriaConta) && in_array($data["006"], $this->tipoPlano) 
            && in_array($data["008"], $this->natureza) ){  
                $this->sysppplc[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],13) , 13 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"], 4) , 4 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 30) , 30 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["007"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["008"], 2) , 2 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["009"], 60) , 60 , " " , STR_PAD_RIGHT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->sysppplc =  $this->sysppplc;           
    }

    /**
     * @param array $fields
     * @return array|null
     */
    public function syspplp(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspplp[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],20 ) , 20 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["003"]) ? $data["003"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["004"]) ? $data["004"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["005"], 3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["006"], 3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["007"], 3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["008"]) ? $data["008"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["009"]) ? $data["009"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["010"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["011"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["012"], 2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["013"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["014"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["015"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["016"], 2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["017"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["018"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["019"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["020"], 2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["021"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["022"], 15) , 15 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["023"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["024"], 2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["025"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["026"], 1) , 1 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($data["027"], 1) , 1 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspplp =  $this->syspplp;           
    }

    /**
    * @param array $fields
    */
    public function syspprp(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["002"], $this->precopraticado)){
                $this->syspprp[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],1 ) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["003"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["004"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["005"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 13) , 13 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["007"]) ? $data["007"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["008"]) ? $data["008"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspprp =  $this->syspprp;          
    }

    /**
    * @param array $fields
    * @return array|null
    */
    public function sysppro(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["005"], $this->simNao) 
                && in_array($data["007"], $this->pesoVariavel) && in_array($data["016"], $this->simNao) 
                && in_array($data["017"], $this->simNao) && in_array($data["026"], $this->tipoBonificacao) 
                && in_array($data["031"], $this->produtoAlterado) 
                && in_array($data["033"], $this->simNao) && in_array($data["034"], $this->simNao) 
                && in_array($data["035"], $this->simNao) && in_array($data["036"], $this->especializacaoProduto) 
                && in_array($data["037"], $this->composicao) && in_array($data["038"], $this->simNao) 
                && in_array($data["039"], $this->simNao) && in_array($data["049"], $this->simNao) 
                && in_array($data["072"], $this->finalidade) && in_array($data["073"], $this->arredondarTruncar) 
                && in_array($data["074"], $this->producao) && in_array($data["075"], $this->simNao) 
                && in_array($data["087"], $this->simNao) && in_array($data["092"], $this->simNao) 
                && in_array($data["093"], $this->simNao) ){
                $this->sysppro[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],45 ) , 45 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 3) , 3 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["007"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["008"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["009"]) ? $data["009"] : 0), 2, ".", ""), 5) , 5 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["010"]) ? $data["010"] : 0), 2, ".", ""), 5) , 5 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["011"]) ? $data["011"] : 0), 2, ".", ""), 5) , 5 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["012"]) ? $data["012"] : 0), 2, ".", ""), 5) , 5 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["013"]) ? $data["013"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["014"]) ? $data["014"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["015"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["016"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["017"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["018"]) ? $data["018"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["019"]) ? $data["019"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["020"], 4) , 4 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["021"]) ? $data["021"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["022"]) ? $data["022"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["023"]) ? $data["023"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["024"]) ? $data["024"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["025"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["026"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["027"]) ? $data["027"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["028"],"Ymd"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["029"], 1) , 1 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["030"], 3) , 3 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["031"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["032"]) ? $data["032"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["033"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["034"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["035"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["036"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["037"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["038"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["039"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["040"]) ? $data["040"] : 0), 2, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["041"]) ? $data["041"] : 0), 2, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["042"]) ? $data["042"] : 0), 2, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["043"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["044"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["045"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["046"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["047"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["048"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["049"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["050"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["051"]) ? $data["052"] : 0), 2, ".", ""), 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["052"]) ? $data["051"] : 0), 2, ".", ""), 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["053"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["054"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["055"]) ? $data["055"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["056"]) ? $data["056"] : 0), 2, ".", ""), 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["057"]) ? $data["057"] : 0), 3, ".", ""), 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["058"]) ? $data["058"] : 0), 3, ".", ""), 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["059"], 3) , 3 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["060"]) ? $data["060"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["061"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["062"], 35) , 35 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["063"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["064"], 3) , 3 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["065"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["066"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["067"], 8) , 8 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["068"], 2) , 2 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["069"], 3) , 3 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["070"]) ? $data["070"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["071"], 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["072"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["073"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["074"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["075"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["076"], 14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["077"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["078"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["079"], 2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["080"]) ? $data["080"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["081"]) ? $data["081"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["084"]) ? $data["084"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["085"]) ? $data["085"] : 0), 4, ".", ""), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["086"]) ? $data["086"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["087"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["088"]) ? $data["088"] : 0), 2, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["089"]) ? $data["089"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["090"]) ? $data["090"] : 0), 2, ".", ""), 15) , 15 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["091"], 8) , 8 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["092"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["093"], 1) , 1 , " " , STR_PAD_RIGHT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->sysppro =  $this->sysppro;           
    }

    /**
    * @param array $fields
    */
    public function syspprofor(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["006"], $this->nivelFornecedor)){
                $this->syspprofor[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],4 ) , 4 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 20) , 20 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 3) , 3 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 1) , 1 , " " , STR_PAD_RIGHT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspprofor =  $this->syspprofor;          
    }

    /**
    * @param array $fields
    */
    public function syspppl(array $fields): void
    {
        foreach ($fields as $data){
            if($data["001"] == "01" && in_array($data["008"], $this->tipoDesconto) && in_array($data["009"], $this->tipoPreco) && in_array($data["010"], $this->statusPromocao) ){
                $this->syspppl[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],2) , 2 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],6 ) , 6 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 60) , 60 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["004"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["005"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 9) , 9 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["007"]) ? $data["007"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["008"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["009"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["010"], 1) , 1 , " " , STR_PAD_RIGHT),9);
            } else if($data["001"] == "02" ){
                $this->syspppl[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],2) , 2 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],6 ) , 6 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 14) , 14 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspppl =  $this->syspppl;          
    }

    /**
    * @param array $fields
    */
    public function sysppdcn(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["003"], $this->tipoPromocao) && in_array($data["005"], $this->modalidadeDesconto) ){
                $this->sysppdcn[] = gzcompress($this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["001"],"dmY"),8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["002"],"dmY"),8 ) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["006"]) ? $data["006"] : 0), 2, ".", ""), 13) , 13 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["007"], 3) , 3 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->sysppdcn =  $this->sysppdcn;          
    }

    /**
    * @param array $fields
    */
    public function syspram(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspram[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],20 ) , 20 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspram =  $this->syspram;          
    }

    /**
    * @param array $fields
    */
    public function syspfab(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspfab[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],20 ) , 20 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->syspfab =  $this->syspfab;          
    }

    /**
    * @param array $fields
    */
    public function syspsec(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspsec[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],2) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],30 ) , 30 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspsec =  $this->syspsec;          
    }

    /**
    * @param array $fields
    */
    public function syspser(array $fields): void
    {
        foreach ($fields as $data){
            $this->syspser[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],14) , 14 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],20 ) , 20 , " " , STR_PAD_RIGHT).
                $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["003"],"dmY"),8 ) , 8 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->syspser =  $this->syspser;          
    }

    /**
    * @param array $fields
    */
    public function syspsbg(array $fields): void
    {
        foreach ($fields as $data){
            if(in_array($data["005"], $this->simNao) ){
                $this->syspsbg[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],2) , 2 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],3 ) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 3) , 3 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 30) , 30 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 1) , 1 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["006"]) ? $data["006"] : 0), 2, ".", ""), 7) , 7 , "0" , STR_PAD_LEFT),9);
            } else {
                $this->response->errors->syspcmp = "Erro Valores Inválidos. Consultar documentação.";
            }
        }
        $this->response->syspsbg =  $this->syspsbg;          
    }

    /**
    * @param array $fields
    */
    public function sysptxa(array $fields): void
    {
        foreach ($fields as $data){
            $this->sysptxa[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],3) , 3 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars($data["002"],2 ) , 2 , "0" , STR_PAD_LEFT).
                $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["003"]) ? $data["003"] : 0), 2, ".", ""),15 ) , 15 , "0" , STR_PAD_LEFT),9);
        }
        $this->response->sysptxa =  $this->sysptxa;          
    }

    /**
    * @param array $fields
    */
    public function syspvdc(array $fields): void
    {
        foreach ($fields as $data){
                $this->syspvdc[] = gzcompress($this->mb_str_pad($this->str_limit_chars($data["001"],6) , 6 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["002"],60 ) , 60 , " " , STR_PAD_RIGHT).
                    $this->mb_str_pad($this->str_limit_chars($data["003"], 14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["004"], 14) , 14 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["005"], 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["006"], 7) , 7 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars(number_format((!empty($data["007"]) ? $data["007"] : 0), 2, ".", ""), 12) , 12 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["008"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($this->date_fmt($data["009"],"dmY"), 8) , 8 , "0" , STR_PAD_LEFT).
                    $this->mb_str_pad($this->str_limit_chars($data["010"], 1) , 1 , " " , STR_PAD_RIGHT),9);
        }
        $this->response->syspvdc =  $this->syspvdc;          
    }
}