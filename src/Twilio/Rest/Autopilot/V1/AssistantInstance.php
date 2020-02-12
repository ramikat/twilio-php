<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Autopilot\V1;

use Twilio\Deserialize;
use Twilio\Exceptions\TwilioException;
use Twilio\InstanceResource;
use Twilio\Options;
use Twilio\Rest\Autopilot\V1\Assistant\DefaultsList;
use Twilio\Rest\Autopilot\V1\Assistant\DialogueList;
use Twilio\Rest\Autopilot\V1\Assistant\ExportAssistantList;
use Twilio\Rest\Autopilot\V1\Assistant\FieldTypeList;
use Twilio\Rest\Autopilot\V1\Assistant\ModelBuildList;
use Twilio\Rest\Autopilot\V1\Assistant\QueryList;
use Twilio\Rest\Autopilot\V1\Assistant\StyleSheetList;
use Twilio\Rest\Autopilot\V1\Assistant\TaskList;
use Twilio\Rest\Autopilot\V1\Assistant\WebhookList;
use Twilio\Values;
use Twilio\Version;

/**
 * PLEASE NOTE that this class contains preview products that are subject to change. Use them with caution. If you currently do not have developer preview access, please contact help@twilio.com.
 *
 * @property string $accountSid
 * @property \DateTime $dateCreated
 * @property \DateTime $dateUpdated
 * @property string $friendlyName
 * @property string $latestModelBuildSid
 * @property array $links
 * @property bool $logQueries
 * @property string $developmentStage
 * @property bool $needsModelBuild
 * @property string $sid
 * @property string $uniqueName
 * @property string $url
 * @property string $callbackUrl
 * @property string $callbackEvents
 */
class AssistantInstance extends InstanceResource {
    protected $_fieldTypes;
    protected $_tasks;
    protected $_modelBuilds;
    protected $_queries;
    protected $_styleSheet;
    protected $_defaults;
    protected $_dialogues;
    protected $_webhooks;
    protected $_exportAssistant;

    /**
     * Initialize the AssistantInstance
     *
     * @param Version $version Version that contains the resource
     * @param mixed[] $payload The response payload
     * @param string $sid The unique string that identifies the resource
     */
    public function __construct(Version $version, array $payload, $sid = null) {
        parent::__construct($version);

        // Marshaled Properties
        $this->properties = [
            'accountSid' => Values::array_get($payload, 'account_sid'),
            'dateCreated' => Deserialize::dateTime(Values::array_get($payload, 'date_created')),
            'dateUpdated' => Deserialize::dateTime(Values::array_get($payload, 'date_updated')),
            'friendlyName' => Values::array_get($payload, 'friendly_name'),
            'latestModelBuildSid' => Values::array_get($payload, 'latest_model_build_sid'),
            'links' => Values::array_get($payload, 'links'),
            'logQueries' => Values::array_get($payload, 'log_queries'),
            'developmentStage' => Values::array_get($payload, 'development_stage'),
            'needsModelBuild' => Values::array_get($payload, 'needs_model_build'),
            'sid' => Values::array_get($payload, 'sid'),
            'uniqueName' => Values::array_get($payload, 'unique_name'),
            'url' => Values::array_get($payload, 'url'),
            'callbackUrl' => Values::array_get($payload, 'callback_url'),
            'callbackEvents' => Values::array_get($payload, 'callback_events'),
        ];

        $this->solution = ['sid' => $sid ?: $this->properties['sid'], ];
    }

    /**
     * Generate an instance context for the instance, the context is capable of
     * performing various actions.  All instance actions are proxied to the context
     *
     * @return AssistantContext Context for this AssistantInstance
     */
    protected function proxy(): AssistantContext {
        if (!$this->context) {
            $this->context = new AssistantContext($this->version, $this->solution['sid']);
        }

        return $this->context;
    }

    /**
     * Fetch a AssistantInstance
     *
     * @return AssistantInstance Fetched AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): AssistantInstance {
        return $this->proxy()->fetch();
    }

    /**
     * Update the AssistantInstance
     *
     * @param array|Options $options Optional Arguments
     * @return AssistantInstance Updated AssistantInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update($options = []): AssistantInstance {
        return $this->proxy()->update($options);
    }

    /**
     * Deletes the AssistantInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool {
        return $this->proxy()->delete();
    }

    /**
     * Access the fieldTypes
     */
    protected function getFieldTypes(): FieldTypeList {
        return $this->proxy()->fieldTypes;
    }

    /**
     * Access the tasks
     */
    protected function getTasks(): TaskList {
        return $this->proxy()->tasks;
    }

    /**
     * Access the modelBuilds
     */
    protected function getModelBuilds(): ModelBuildList {
        return $this->proxy()->modelBuilds;
    }

    /**
     * Access the queries
     */
    protected function getQueries(): QueryList {
        return $this->proxy()->queries;
    }

    /**
     * Access the styleSheet
     */
    protected function getStyleSheet(): StyleSheetList {
        return $this->proxy()->styleSheet;
    }

    /**
     * Access the defaults
     */
    protected function getDefaults(): DefaultsList {
        return $this->proxy()->defaults;
    }

    /**
     * Access the dialogues
     */
    protected function getDialogues(): DialogueList {
        return $this->proxy()->dialogues;
    }

    /**
     * Access the webhooks
     */
    protected function getWebhooks(): WebhookList {
        return $this->proxy()->webhooks;
    }

    /**
     * Access the exportAssistant
     */
    protected function getExportAssistant(): ExportAssistantList {
        return $this->proxy()->exportAssistant;
    }

    /**
     * Magic getter to access properties
     *
     * @param string $name Property to access
     * @return mixed The requested property
     * @throws TwilioException For unknown properties
     */
    public function __get($name) {
        if (\array_key_exists($name, $this->properties)) {
            return $this->properties[$name];
        }

        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown property: ' . $name);
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
        return '[Twilio.Autopilot.V1.AssistantInstance ' . \implode(' ', $context) . ']';
    }
}