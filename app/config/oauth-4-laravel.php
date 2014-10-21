
<?php
return array( 

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session', 

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id'     => '1495505887402749',
            'client_secret' => 'c95e71dccecab6ad783c4d0602647b9f',
            'scope'         => array('email','read_friendlists','user_online_presence'),
        ),      

    )

);