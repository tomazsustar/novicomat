<?php
class ZParams{
	
	var $data=array();
	
	/**
	 * 
	 * Vpiši string, dobiš ven objekt
	 * @param $strStyle
	 */
	public function __construct($strParams){
		$arr = explode("\n", $strParams);
		
		foreach ($arr as $e) {
			$arr2 = explode('=', $e,2);
			if(count($arr2)==2)
				$this->data[$arr2[0]]=$arr2[1];
		}
		
	}
	
 	public function __set($name, $value)
    {
        //echo "Setting '$name' to '$value'\n";
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        //echo "Getting '$name'\n";
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }

        /*$trace = debug_backtrace();
        trigger_error(
            'Undefined property via __get(): ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE);*/
        return null;
    }

    /**  As of PHP 5.1.0  */
    public function __isset($name)
    {
        //echo "Is '$name' set?\n";
        return isset($this->data[$name]);
    }

    /**  As of PHP 5.1.0  */
    public function __unset($name)
    {
        //echo "Unsetting '$name'\n";
        unset($this->data[$name]);
    }
    
    public function __toString(){
    	$return='';
    	foreach ($this->data as $key => $value) {
    		$return.=$key.'='.$value."\n";
    	}
    	return substr($return, 0, strlen($return));
    }
    
    /**
     * 
     * Enter description here ...
     * @param array $rulesToRemove
     */
    public function removeRules($rulesToRemove){
    	
    	foreach ($rulesToRemove as $value) {
    		foreach ($this->data as $dkey => $dvalue) {
    			if(strpos($dkey, $value)!==false){
    				unset($this->data[$dkey]);
    			}
    		}
    	}
    	//echo '<pre>';print_r($this->data);echo '</pre>';die;
    }
}