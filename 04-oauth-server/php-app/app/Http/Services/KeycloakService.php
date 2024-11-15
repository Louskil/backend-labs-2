<?php

namespace App\Services;

use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;

class KeycloakService
{
    protected $provider;

    public function __construct()
    {
        $this->provider = new GenericProvider([
            'clientId'                => 'laravel-app',
            'clientSecret'            => 'your-client-secret',
            'redirectUri'             => 'http://localhost:8000/callback',
            'urlAuthorize'            => 'http://localhost:8080/realms/Demo-Realm/protocol/openid-connect/auth',
            'urlAccessToken'          => 'http://localhost:8080/realms/Demo-Realm/protocol/openid-connect/token',
            'urlResourceOwnerDetails' => 'http://localhost:8080/realms/Demo-Realm/protocol/openid-connect/userinfo',
        ]);
    }

    public function authenticate($username, $password)
    {
        try {
            $accessToken = $this->provider->getAccessToken('password', [
                'username' => $username,
                'password' => $password,
            ]);

            $resourceOwner = $this->provider->getResourceOwner($accessToken);
            return $resourceOwner->toArray();
        } catch (IdentityProviderException $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }
}