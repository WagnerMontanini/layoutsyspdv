<?php

namespace WagnerMontanini\LayoutSyspdv;

/**
 * Class GeraLayout
 * @package WagnerMontanini\LayoutSyspdv
 */
class GeraLayout extends LayoutSyspdv
{
    /**
     * GeraLayout constructor
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspadm(array $fields): GeraLayout
    {
        $this->syspadm($fields);
  
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
     public function geraLayoutSyspaplic(array $fields): GeraLayout
     {
         $this->syspaplic($fields);
    
         return $this;
     }
 
     /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspcar(array $fields): GeraLayout
    {
        $this->syspcar($fields);
   
        return $this;
    }
 
    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspcarac(array $fields): GeraLayout
    {
        $this->syspcarac($fields);
  
        return $this;
    }
 
    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspcfo(array $fields): GeraLayout
    {
        $this->syspcfo($fields);
  
        return $this;
    }
 
    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspcli(array $fields): GeraLayout
    {
        $this->syspcli($fields);
  
        return $this;
    }
 
    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspaux(array $fields): GeraLayout
    {
        $this->syspaux($fields);
  
        return $this;
    }
 
    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspcmp(array $fields): GeraLayout
    {
        $this->syspcmp($fields);
  
        return $this;
    }
 
    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspcrc(array $fields): GeraLayout
    {
        $this->syspcrc($fields);
  
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspest(array $fields): GeraLayout
    {
        $this->syspest($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspestcon(array $fields): GeraLayout
    {
        $this->syspestcon($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspgrp(array $fields): GeraLayout
    {
        $this->syspgrp($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspfzd(array $fields): GeraLayout
    {
        $this->syspfzd($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspfor(array $fields): GeraLayout
    {
        $this->syspfor($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspfun(array $fields): GeraLayout
    {
        $this->syspfun($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspimpfed(array $fields): GeraLayout
    {
        $this->syspimpfed($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspimppro(array $fields): GeraLayout
    {
        $this->syspimppro($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSysppplc(array $fields): GeraLayout
    {
        $this->sysppplc($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspplp(array $fields): GeraLayout
    {
        $this->syspplp($fields);
 
        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspprp(array $fields): GeraLayout
    {
        $this->syspprp($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSysppro(array $fields): GeraLayout
    {
        $this->sysppro($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspprofor(array $fields): GeraLayout
    {
        $this->syspprofor($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspppl(array $fields): GeraLayout
    {
        $this->syspppl($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSysppdcn(array $fields): GeraLayout
    {
        $this->sysppdcn($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspram(array $fields): GeraLayout
    {
        $this->syspram($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspfab(array $fields): GeraLayout
    {
        $this->syspfab($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspsec(array $fields): GeraLayout
    {
        $this->syspsec($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspser(array $fields): GeraLayout
    {
        $this->syspser($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspsbg(array $fields): GeraLayout
    {
        $this->syspsbg($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSysptxa(array $fields): GeraLayout
    {
        $this->sysptxa($fields);

        return $this;
    }

    /**
     * @param array $fields
     * @return GeraLayout
     */
    public function geraLayoutSyspvdc(array $fields): GeraLayout
    {
        $this->syspvdc($fields);

        return $this;
    }

}