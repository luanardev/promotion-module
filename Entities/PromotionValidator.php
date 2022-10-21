<?php

namespace Luanardev\Lumis\Promotion\Entities;
use Luanardev\Lumis\Promotion\Exceptions\NotPermanentException;
use Luanardev\Lumis\Promotion\Exceptions\NotConfirmedException;
use Luanardev\Lumis\Promotion\Exceptions\InvalidPeriodException;
use Luanardev\Lumis\Employees\Entities\Staff;

class PromotionValidator
{
    protected $adminLastPromotionPeriod = 3; // Administrative Last Promotion 
    protected $adminConfirmationPeriod = 2; // Administrative Confirmation Period

    protected $ctsLastPromotionPeriod = 2; // CTS Last Promotion
    protected $ctsConfirmationPeriod = 2; // CTS Confirmation Period


    public function validate(Staff $staff)
    {         
        if($staff->isNotPermanent()){
            throw new NotPermanentException;
        }
        if($staff->isNotConfirmed()){
            throw new NotConfirmedException;
        }      
        if($staff->isAdministrative()){
            $this->validateAdministrative($staff);          
        }
        elseif($staff->isCTS()){
            $this->validateCTS($staff); 
        }
        elseif($staff->isAcademic()){
            $this->validateAcademic($staff); 
        }  
        elseif($staff->isResearch()){
            $this->validateResearch($staff); 
        }    
    }

    public function validateAdministrative(Staff $staff)
    {
        if($staff->wasPromoted() && $staff->getLastPromotionPeriod() < $this->adminLastPromotionPeriod){
            throw new InvalidPeriodException;
        }
        elseif($staff->getConfirmationPeriod() < $this->adminConfirmationPeriod ){
            throw new InvalidPeriodException;
        } 
    }

    public function validateCTS(Staff $staff)
    {
        if($staff->wasPromoted() && $staff->getLastPromotionPeriod() < $this->ctsLastPromotionPeriod){
            throw new InvalidPeriodException;
        }
        elseif($staff->getConfirmationPeriod() < $this->ctsConfirmationPeriod ){
            throw new InvalidPeriodException;
        }  
    }

    public function validateAcademic(Staff $staff)
    {
          
    }

    public function validateResearch(Staff $staff)
    {
         
    }
}