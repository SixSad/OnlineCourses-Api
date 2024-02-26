<?php

declare(strict_types=1);

use GuzzleHttp\Client as HttpClient;

$host = env('KEYCLOAK_HOST') ?? throw new Exception('KEYCLOAK_HOST');

$port = (int)env('KEYCLOAK_PORT', 8080);

$protocol = env('KEYCLOAK_PROTOCOL', 'http');

$realm = env('KEYCLOAK_REALM', 'master');

$realPublicKey = (function () use ($protocol, $host, $port, $realm) {
    $client = new HttpClient();
    $res = $client->get("$protocol://$host:$port/realms/$realm");
    $code = $res->getStatusCode();
    if ($code !== 200) throw new Exception("Keycloak respond $code status code!");
    return json_decode((string)$res->getBody())->public_key;
})();

return [
    'host' => $host,

    'protocol' => $protocol,

    'realm' => $realm,

    'realm_public_key' => $realPublicKey,

    'load_user_from_database' => env('KEYCLOAK_LOAD_USER_FROM_DATABASE', false),

    'user_provider_custom_retrieve_method' => null,

    'user_provider_credential' => env('KEYCLOAK_USER_PROVIDER_CREDENTIAL', 'username'),

    'token_principal_attribute' => env('KEYCLOAK_TOKEN_PRINCIPAL_ATTRIBUTE', 'preferred_username'),

    'append_decoded_token' => env('KEYCLOAK_APPEND_DECODED_TOKEN', false),

    'allowed_resources' => env('KEYCLOAK_ALLOWED_RESOURCES', null),

    'ignore_resources_validation' => env('KEYCLOAK_IGNORE_RESOURCES_VALIDATION', false),

    'leeway' => env('KEYCLOAK_LEEWAY', 0),

    'input_key' => env('KEYCLOAK_TOKEN_INPUT_KEY', null),
];
