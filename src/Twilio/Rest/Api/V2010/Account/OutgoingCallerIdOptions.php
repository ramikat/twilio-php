<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Api\V2010\Account;

use Twilio\Options;
use Twilio\Values;

abstract class OutgoingCallerIdOptions {
    /**
     * @param string $friendlyName A string to describe the resource
     * @return UpdateOutgoingCallerIdOptions Options builder
     */
    public static function update($friendlyName = Values::NONE): UpdateOutgoingCallerIdOptions {
        return new UpdateOutgoingCallerIdOptions($friendlyName);
    }

    /**
     * @param string $phoneNumber The phone number of the OutgoingCallerId
     *                            resources to read
     * @param string $friendlyName The string that identifies the OutgoingCallerId
     *                             resources to read
     * @return ReadOutgoingCallerIdOptions Options builder
     */
    public static function read($phoneNumber = Values::NONE, $friendlyName = Values::NONE): ReadOutgoingCallerIdOptions {
        return new ReadOutgoingCallerIdOptions($phoneNumber, $friendlyName);
    }
}

class UpdateOutgoingCallerIdOptions extends Options {
    /**
     * @param string $friendlyName A string to describe the resource
     */
    public function __construct($friendlyName = Values::NONE) {
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * A descriptive string that you create to describe the resource. It can be up to 64 characters long.
     *
     * @param string $friendlyName A string to describe the resource
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = [];
        foreach ($this->options as $key => $value) {
            if ($value !== Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.UpdateOutgoingCallerIdOptions ' . \implode(' ', $options) . ']';
    }
}

class ReadOutgoingCallerIdOptions extends Options {
    /**
     * @param string $phoneNumber The phone number of the OutgoingCallerId
     *                            resources to read
     * @param string $friendlyName The string that identifies the OutgoingCallerId
     *                             resources to read
     */
    public function __construct($phoneNumber = Values::NONE, $friendlyName = Values::NONE) {
        $this->options['phoneNumber'] = $phoneNumber;
        $this->options['friendlyName'] = $friendlyName;
    }

    /**
     * The phone number of the OutgoingCallerId resources to read.
     *
     * @param string $phoneNumber The phone number of the OutgoingCallerId
     *                            resources to read
     * @return $this Fluent Builder
     */
    public function setPhoneNumber($phoneNumber): self {
        $this->options['phoneNumber'] = $phoneNumber;
        return $this;
    }

    /**
     * The string that identifies the OutgoingCallerId resources to read.
     *
     * @param string $friendlyName The string that identifies the OutgoingCallerId
     *                             resources to read
     * @return $this Fluent Builder
     */
    public function setFriendlyName($friendlyName): self {
        $this->options['friendlyName'] = $friendlyName;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = [];
        foreach ($this->options as $key => $value) {
            if ($value !== Values::NONE) {
                $options[] = "$key=$value";
            }
        }
        return '[Twilio.Api.V2010.ReadOutgoingCallerIdOptions ' . \implode(' ', $options) . ']';
    }
}