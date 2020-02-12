<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\ListResource;
use Twilio\Options;
use Twilio\Rest\Api\V2010\Account\Conference\ParticipantList;
use Twilio\Rest\Api\V2010\Account\Conference\RecordingList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property ParticipantList $participants
 * @property RecordingList $recordings
 * @method \Twilio\Rest\Api\V2010\Account\Conference\ParticipantContext participants(string $callSid)
 * @method \Twilio\Rest\Api\V2010\Account\Conference\RecordingContext recordings(string $sid)
 */
class ConferenceContext extends InstanceContext {
    protected $_participants;
    protected $_recordings;

    /**
     * Initialize the ConferenceContext
     *
     * @param Version $version Version that contains the resource
     * @param string $accountSid The SID of the Account that created the
     *                           resource(s) to fetch
     * @param string $sid The unique string that identifies this resource
     */
    public function __construct(Version $version, $accountSid, $sid) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['accountSid' => $accountSid, 'sid' => $sid, ];

        $this->uri = '/Accounts/' . \rawurlencode($accountSid) . '/Conferences/' . \rawurlencode($sid) . '.json';
    }

    /**
     * Fetch a ConferenceInstance
     *
     * @return ConferenceInstance Fetched ConferenceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ConferenceInstance {
        $params = Values::of([]);

        $payload = $this->version->fetch(
            'GET',
            $this->uri,
            $params
        );

        return new ConferenceInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Update the ConferenceInstance
     *
     * @param array|Options $options Optional Arguments
     * @return ConferenceInstance Updated ConferenceInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = []): ConferenceInstance {
        $options = new Values($options);

        $data = Values::of([
            'Status' => $options['status'],
            'AnnounceUrl' => $options['announceUrl'],
            'AnnounceMethod' => $options['announceMethod'],
        ]);

        $payload = $this->version->update(
            'POST',
            $this->uri,
            [],
            $data
        );

        return new ConferenceInstance(
            $this->version,
            $payload,
            $this->solution['accountSid'],
            $this->solution['sid']
        );
    }

    /**
     * Access the participants
     */
    protected function getParticipants(): ParticipantList {
        if (!$this->_participants) {
            $this->_participants = new ParticipantList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->_participants;
    }

    /**
     * Access the recordings
     */
    protected function getRecordings(): RecordingList {
        if (!$this->_recordings) {
            $this->_recordings = new RecordingList(
                $this->version,
                $this->solution['accountSid'],
                $this->solution['sid']
            );
        }

        return $this->_recordings;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get($name): ListResource {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call($name, $arguments): InstanceContext {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Api.V2010.ConferenceContext ' . \implode(' ', $context) . ']';
    }
}