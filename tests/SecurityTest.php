<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    public function testSomething(): void
    {
        $client = static::createClient();
        $client->request('GET', '/login');
        $this->assertSelectorTextContains('h1', 'Connectez-vous');    
        $client->request('GET', '/pin');
        $this->assertSelectorTextContains('h5', 'Insérer le code pin');
        // $client->request('GET', '/admin');
        // $this->assertSelectorTextContains('h2', 'Bonjour admin');
    }

}
