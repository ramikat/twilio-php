<?php


namespace Twilio\Tests\Unit\Rest;

use Twilio\Exceptions\ConfigurationException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\CurlClient;
use Twilio\Http\Response;
use Twilio\Rest\Client;
use Twilio\Tests\Holodeck;
use Twilio\Tests\Request;
use Twilio\Tests\Unit\UnitTest;

class ClientTest extends UnitTest {

    public function testThrowsWhenUsernameAndPasswordMissing(): void {
        $this->expectException(ConfigurationException::class);
        new Client(null, null, null, null, null, []);
    }

    public function testThrowsWhenUsernameMissing(): void {
        $this->expectException(ConfigurationException::class);
        new Client(null, 'password', null, null, null, []);
    }

    public function testThrowsWhenPasswordMissing(): void {
        $this->expectException(ConfigurationException::class);
        new Client('username', null, null, null, null, []);
    }

    public function testUsernamePulledFromEnvironment(): void {
        $client = new Client(null, 'password', null, null, null, [
            Client::ENV_ACCOUNT_SID => 'username',
        ]);

        $this->assertEquals('username', $client->getUsername());
    }

    public function testPasswordPulledFromEnvironment(): void {
        $client = new Client('username', null, null, null, null, [
            Client::ENV_AUTH_TOKEN => 'password',
        ]);

        $this->assertEquals('password', $client->getPassword());
    }

    public function testUsernameAndPasswordPulledFromEnvironment(): void {
        $client = new Client(null, null, null, null, null, [
            Client::ENV_ACCOUNT_SID => 'username',
            Client::ENV_AUTH_TOKEN => 'password',
        ]);

        $this->assertEquals('username', $client->getUsername());
        $this->assertEquals('password', $client->getPassword());
    }

    public function testUsernameParameterPreferredOverEnvironment(): void {
        $client = new Client('username', 'password', null, null, null, [
            Client::ENV_ACCOUNT_SID => 'environmentUsername',
        ]);

        $this->assertEquals('username', $client->getUsername());
    }

    public function testPasswordParameterPreferredOverEnvironment(): void {
        $client = new Client('username', 'password', null, null, null, [
            Client::ENV_AUTH_TOKEN => 'environmentPassword',
        ]);

        $this->assertEquals('password', $client->getPassword());
    }

    public function testUsernameAndPasswordParametersPreferredOverEnvironment(): void {
        $client = new Client('username', 'password', null, null, null, [
            Client::ENV_ACCOUNT_SID => 'environmentUsername',
            Client::ENV_AUTH_TOKEN => 'environmentPassword',
        ]);

        $this->assertEquals('username', $client->getUsername());
        $this->assertEquals('password', $client->getPassword());
    }

    public function testAccountSidDefaultsToUsername(): void {
        $client = new Client('username', 'password');
        $this->assertEquals('username', $client->getAccountSid());
    }

    public function testAccountSidPreferredOverUsername(): void {
        $client = new Client('username', 'password', 'accountSid');
        $this->assertEquals('accountSid', $client->getAccountSid());
    }

    public function testRegionDefaultsToEmpty(): void {
        $network = new Holodeck();
        $client = new Client('username', 'password', null, null, $network);
        $client->request('POST', 'https://test.twilio.com/v1/Resources');
        $expected = new Request('POST', 'https://test.twilio.com/v1/Resources');
        $this->assertTrue($network->hasRequest($expected));
    }

    public function testRegionInjectedWhenSet(): void {
        $network = new Holodeck();
        $client = new Client('username', 'password', null, 'ie1', $network);
        $client->request('POST', 'https://test.twilio.com/v1/Resources');
        $expected = new Request('POST', 'https://test.ie1.twilio.com/v1/Resources');
        $this->assertTrue($network->hasRequest($expected));
    }

    public function testValidationSslCertificateSuccess(): void {
        $client = new Client('username', 'password');
        $curlClient = $this->createMock(CurlClient::class);
        $curlClient
            ->expects($this->once())
            ->method('request')
            ->willReturn(new Response(200, ''));

        $client->validateSslCertificate($curlClient);
    }

    public function testValidationSslCertificateError(): void {
        $this->expectException(TwilioException::class);
        $client = new Client('username', 'password');
        $curlClient = $this->createMock(CurlClient::class);
        $curlClient
            ->expects($this->once())
            ->method('request')
            ->willReturn(new Response(504, ''));

        $client->validateSslCertificate($curlClient);
    }

}
