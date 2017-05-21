<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    \App\Providers\CodesServiceProvider::OK_CODE             => 'Successful operation',
    \App\Providers\CodesServiceProvider::FAILED_VALIDATOR_CODE => '',
    \App\Providers\CodesServiceProvider::SERVER_ERROR_CODE => 'Server error',
    \App\Providers\CodesServiceProvider::BLACKLISTED_TOKEN => 'This token is no longer in use',
    \App\Providers\CodesServiceProvider::COULD_NOT_CREATE_TOKEN => 'Could not create token',
    \App\Providers\CodesServiceProvider::EXPIRED_TOKEN => 'Este token ha expirado',
    \App\Providers\CodesServiceProvider::INVALID_TOKEN => 'Invalid credentials'

];
