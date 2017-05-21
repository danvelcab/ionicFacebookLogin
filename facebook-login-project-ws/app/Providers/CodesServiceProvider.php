<?php

namespace App\Providers;


class CodesServiceProvider
{
    const OK_CODE = 200;
    const INVALID_TOKEN = 401;
    const EXPIRED_TOKEN = 402;
    const SERVER_ERROR_CODE = 500;
    const FAILED_VALIDATOR_CODE = 501;
    const COULD_NOT_CREATE_TOKEN = 550;
    const BLACKLISTED_TOKEN = 551;

}
