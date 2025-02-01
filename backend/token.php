<?php
    // function to generate unique token
    // it will take outlet id , user id, and gas type as parameter 
    function generateToken($outlet_id, $user_id, $gas_type) {

        /* token will be of the format
            GAS-<OUTLET_ID>-<USER_ID>-<GAS_TYPE>-<TIMESTAMP>
            instance:
                GAS-1-2-12.5-20230801-15:30 
        */
        
        // Ensure gas type has no special characters
        $gas_type = str_replace(".", "_", $gas_type); 

        // generate unique id
        $unique_id = uniqid();

        // Generate token
        $token = "GAS-{$outlet_id}-{$user_id}-{$gas_type}-{$unique_id}";

        return $token;
    }

    
?>
