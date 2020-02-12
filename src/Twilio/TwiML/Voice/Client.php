<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Client extends TwiML {
    /**
     * Client constructor.
     *
     * @param string $identity Client identity
     * @param array $attributes Optional attributes
     */
    public function __construct($identity = null, $attributes = []) {
        parent::__construct('Client', $identity, $attributes);
    }

    /**
     * Add Identity child.
     *
     * @param string $clientIdentity Identity of the client to dial
     * @return Identity Child element.
     */
    public function identity($clientIdentity): Identity {
        return $this->nest(new Identity($clientIdentity));
    }

    /**
     * Add Parameter child.
     *
     * @param array $attributes Optional attributes
     * @return Parameter Child element.
     */
    public function parameter($attributes = []): Parameter {
        return $this->nest(new Parameter($attributes));
    }

    /**
     * Add Url attribute.
     *
     * @param string $url Client URL
     */
    public function setUrl($url): self {
        return $this->setAttribute('url', $url);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Client URL Method
     */
    public function setMethod($method): self {
        return $this->setAttribute('method', $method);
    }

    /**
     * Add StatusCallbackEvent attribute.
     *
     * @param string $statusCallbackEvent Events to trigger status callback
     */
    public function setStatusCallbackEvent($statusCallbackEvent): self {
        return $this->setAttribute('statusCallbackEvent', $statusCallbackEvent);
    }

    /**
     * Add StatusCallback attribute.
     *
     * @param string $statusCallback Status Callback URL
     */
    public function setStatusCallback($statusCallback): self {
        return $this->setAttribute('statusCallback', $statusCallback);
    }

    /**
     * Add StatusCallbackMethod attribute.
     *
     * @param string $statusCallbackMethod Status Callback URL Method
     */
    public function setStatusCallbackMethod($statusCallbackMethod): self {
        return $this->setAttribute('statusCallbackMethod', $statusCallbackMethod);
    }
}