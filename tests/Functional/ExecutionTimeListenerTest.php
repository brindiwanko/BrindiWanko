<?php

namespace App\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ExecutionTimeListenerTest extends WebTestCase
{
    public function testExecutionTimeListenerResult(): void
    {
        $client = self::createClient();

        $client->request('GET', '/');
        $request = $client->getRequest();

        // Get the request object from the client
        $attributes = $request->attributes;
        $executionTime = $attributes->get('execution_time');
        // Assert that the response is successful
        self::assertResponseIsSuccessful();
        self::assertNotNull($executionTime);
        self::assertGreaterThanOrEqual(0.0, (float)$executionTime);
    }
}
