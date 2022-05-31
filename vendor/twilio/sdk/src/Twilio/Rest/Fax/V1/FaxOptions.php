<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest\Fax\V1;

use Twilio\Options;
use Twilio\Values;

/**
 * PLEASE NOTE that this class contains beta products that are subject to change. Use them with caution.
 */
abstract class FaxOptions {
    /**
     * @param string $from Retrieve only those faxes sent from this phone number
     * @param string $to Retrieve only those faxes sent to this phone number
     * @param \DateTime $dateCreatedOnOrBefore Retrieve only faxes created on or
     *                                         before this date
     * @param \DateTime $dateCreatedAfter Retrieve only faxes created after this
     *                                    date
     * @return ReadFaxOptions Options builder
     */
    public static function read(string $from = Values::NONE, string $to = Values::NONE, \DateTime $dateCreatedOnOrBefore = Values::NONE, \DateTime $dateCreatedAfter = Values::NONE): ReadFaxOptions {
        return new ReadFaxOptions($from, $to, $dateCreatedOnOrBefore, $dateCreatedAfter);
    }
}

class ReadFaxOptions extends Options {
    /**
     * @param string $from Retrieve only those faxes sent from this phone number
     * @param string $to Retrieve only those faxes sent to this phone number
     * @param \DateTime $dateCreatedOnOrBefore Retrieve only faxes created on or
     *                                         before this date
     * @param \DateTime $dateCreatedAfter Retrieve only faxes created after this
     *                                    date
     */
    public function __construct(string $from = Values::NONE, string $to = Values::NONE, \DateTime $dateCreatedOnOrBefore = Values::NONE, \DateTime $dateCreatedAfter = Values::NONE) {
        $this->options['from'] = $from;
        $this->options['to'] = $to;
        $this->options['dateCreatedOnOrBefore'] = $dateCreatedOnOrBefore;
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
    }

    /**
     * Retrieve only those faxes sent from this phone number, specified in [E.164](https://www.twilio.com/docs/glossary/what-e164) format.
     *
     * @param string $from Retrieve only those faxes sent from this phone number
     * @return $this Fluent Builder
     */
    public function setFrom(string $from): self {
        $this->options['from'] = $from;
        return $this;
    }

    /**
     * Retrieve only those faxes sent to this phone number, specified in [E.164](https://www.twilio.com/docs/glossary/what-e164) format.
     *
     * @param string $to Retrieve only those faxes sent to this phone number
     * @return $this Fluent Builder
     */
    public function setTo(string $to): self {
        $this->options['to'] = $to;
        return $this;
    }

    /**
     * Retrieve only those faxes with a `date_created` that is before or equal to this value, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $dateCreatedOnOrBefore Retrieve only faxes created on or
     *                                         before this date
     * @return $this Fluent Builder
     */
    public function setDateCreatedOnOrBefore(\DateTime $dateCreatedOnOrBefore): self {
        $this->options['dateCreatedOnOrBefore'] = $dateCreatedOnOrBefore;
        return $this;
    }

    /**
     * Retrieve only those faxes with a `date_created` that is later than this value, specified in [ISO 8601](https://en.wikipedia.org/wiki/ISO_8601) format.
     *
     * @param \DateTime $dateCreatedAfter Retrieve only faxes created after this
     *                                    date
     * @return $this Fluent Builder
     */
    public function setDateCreatedAfter(\DateTime $dateCreatedAfter): self {
        $this->options['dateCreatedAfter'] = $dateCreatedAfter;
        return $this;
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        $options = \http_build_query(Values::of($this->options), '', ' ');
        return '[Twilio.Fax.V1.ReadFaxOptions ' . $options . ']';
    }
}