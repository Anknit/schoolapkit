<?php
    class requestProcessor {
        private $calledMethod;
        public function __construct($requestName) {
            $this->calledMethod =   $requestName;
        }
        public function __destruct() {
            $this->calledMethod =   '';
        }
        public function callAppMethod ($requestVars){
            $methodResponse  =   call_user_func($this->calledMethod,$requestVars);
            return $methodResponse;
        }
    }
    
    function processDataRequest($requestName,$requestVars){
        $processObject  =   new requestProcessor($requestName);
        $processOutput  =   $processObject->callAppMethod($requestVars);
        return $processOutput;
    }

    function get_state_list($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table' => 'statelist',
                'Fields'=> 'stateId,stateName',
            )
        ,'ASSOC','');
        return $db_response;
    }

    function search_state_city($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table' => 'cityList',
                'Fields'=> 'cityId,cityName',
                'clause'=> 'stateId = '.$requestVars['stateId']
            ),'ASSOC',''
        );
        return $db_response;
    }

    function search_city_location($requestVars){
        $db_response    =   array();
        $db_response    =   DB_Read(
            array(
                'Table' => 'locationList',
                'Fields'=> 'locationId,locationName',
                'clause'=> 'cityId = '.$requestVars['cityId']
            ),'ASSOC',''
        );
        return $db_response;
    }
?>