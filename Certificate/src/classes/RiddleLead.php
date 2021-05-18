<?php

class RiddleLead
{
    private $leadData;

    public function __construct(array $lead)
    {
        $this->leadData = $lead;
    }

    /**
     * Get a lead value by its name.
     */
    public function get(string $name)
    {
        if (!array_key_exists($name, $this->leadData)) {
            return false;
        }
            
        return $this->leadData[$name]['value'];
    }
}
