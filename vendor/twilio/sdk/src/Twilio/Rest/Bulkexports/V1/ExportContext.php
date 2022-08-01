<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Bulkexports\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\InstanceContext;
use Twilio\ListResource;
use Twilio\Rest\Bulkexports\V1\Export\DayList;
use Twilio\Rest\Bulkexports\V1\Export\ExportCustomJobList;
use Twilio\Values;
use Twilio\Version;

/**
 * @property DayList $days
 * @property ExportCustomJobList $exportCustomJobs
 * @method \Twilio\Rest\Bulkexports\V1\Export\DayContext days(string $day)
 */
class ExportContext extends InstanceContext {
    protected $_days;
    protected $_exportCustomJobs;

    /**
     * Initialize the ExportContext
     *
     * @param Version $version Version that contains the resource
     * @param string $resourceType The type of communication – Messages, Calls,
     *                             Conferences, and Participants
     */
    public function __construct(Version $version, $resourceType) {
        parent::__construct($version);

        // Path Solution
        $this->solution = ['resourceType' => $resourceType, ];

        $this->uri = '/Exports/' . \rawurlencode($resourceType) . '';
    }

    /**
     * Fetch the ExportInstance
     *
     * @return ExportInstance Fetched ExportInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ExportInstance {
        $payload = $this->version->fetch('GET', $this->uri);

        return new ExportInstance($this->version, $payload, $this->solution['resourceType']);
    }

    /**
     * Access the days
     */
    protected function getDays(): DayList {
        if (!$this->_days) {
            $this->_days = new DayList($this->version, $this->solution['resourceType']);
        }

        return $this->_days;
    }

    /**
     * Access the exportCustomJobs
     */
    protected function getExportCustomJobs(): ExportCustomJobList {
        if (!$this->_exportCustomJobs) {
            $this->_exportCustomJobs = new ExportCustomJobList($this->version, $this->solution['resourceType']);
        }

        return $this->_exportCustomJobs;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name): ListResource {
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
    public function __call(string $name, array $arguments): InstanceContext {
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
        return '[Twilio.Bulkexports.V1.ExportContext ' . \implode(' ', $context) . ']';
    }
}