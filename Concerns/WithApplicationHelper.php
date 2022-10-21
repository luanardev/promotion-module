<?php

namespace Luanardev\Lumis\Promotion\Concerns;

trait WithApplicationHelper
{

    /**
     * Check whether is processing
     * @return bool
     */
    public function isProcessing()
    {
        return strtolower($this->status) == strtolower('Processing')? true:false;
    }

    /**
     * Check whether is approved
     * @return bool
     */
    public function isApproved()
    {
        return strtolower($this->status) == strtolower('Approved')? true:false;
    }

    /**
     * Check whether is rejected
     * @return bool
     */
    public function isRejected()
    {
        return strtolower($this->status) == strtolower('Rejected')? true:false;
    }
    
    /**
     * Check whether staff is academic
     * @return bool
     */
    public function isAcademic()
    {
        return $this->isCategory('Academic');
    }

   /**
     * Check whether staff is support
     * @return bool
     */
    public function isResearch()
    {
        return $this->isCategory('Research');
    }

    /**
     * Check whether staff is administrative
     * @return bool
     */
    public function isAdministrative()
    {
        return $this->isCategory('Administrative');
    }

    /**
     * Check whether staff is clerical
     * @return bool
     */
    public function isClerical()
    {
        return $this->isCategory('Clerical');
    }

    /**
     * Check whether staff is technical
     * @return bool
     */
    public function isTechnical()
    {
        return $this->isCategory('Technical');
    }

    /**
     * Check whether staff is support
     * @return bool
     */
    public function isSupport()
    {
        return $this->isCategory('Support');
    }

    /**
     * Check whether staff is support
     * @return bool
     */
    public function isCTS()
    {
        return $this->isClerical() ||
                $this->isTechnical() || 
                $this->isSupport();
                
    }

	/**
     * @return string
     */
    public function getPosition()
    {
        return isset($this->position->name)? $this->position->name: null;
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return isset($this->department->name)? $this->department->name: null;
    }

    /**
     * @return string
     */
    public function getSection()
    {
        return isset($this->section->name)? $this->section->name: null;
    }

    /**
     * @return string
     */
    public function getCampus()
    {
        return isset($this->campus->name)? $this->campus->name: null;
    }

    /**
     * @return string
     */
    public function getCategory()
    {
        return isset($this->category->name)? $this->category->name: null;
    }

    public function getApplyDate()
    {
        return (isset($this->created_at)) ? $this->created_at->format('d-M-Y'):null;
    }

   
    public function statusBadge()
    {
        return $this->isProcessing()?
            "<span class='badge badge-danger'>{$this->status}</span>":
            "<span class='badge badge-primary'>{$this->status}</span>";
    }}
