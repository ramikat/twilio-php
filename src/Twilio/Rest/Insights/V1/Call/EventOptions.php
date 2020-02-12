<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Insights\V1\Call;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 */
abstract class EventOptions {
    /**
     * @param string $edge The edge
     * @return ReadEventOptions Options builder
     */
    public static function read($edge = Values::NONE): ReadEventOptions {
        return new ReadEventOptions($edge);
    }
}

class ReadEventOptions extends Options {
    /**
     * @param string $edge The edge
     */
    public function __construct($edge = Values::NONE) {
        $this->options['edge'] = $edge;
    }

    /**
     * The edge
     *
     * @param string $edge The edge
     * @return $this Fluent Builder
     */
    public function setEdge($edge): self {
        $this->options['edge'] = $edge;
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
        return '[Twilio.Insights.V1.ReadEventOptions ' . \implode(' ', $options) . ']';
    }
}