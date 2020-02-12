<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Tests\Integration\Wireless\V1\Sim;

use Twilio\Exceptions\DeserializeException;
use Twilio\Exceptions\TwilioException;
use Twilio\Http\Response;
use Twilio\Tests\HolodeckTestCase;
use Twilio\Tests\Request;

class DataSessionTest extends HolodeckTestCase {
    public function testReadRequest(): void {
        $this->holodeck->mock(new Response(500, ''));

        try {
            $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                       ->dataSessions->read();
        } catch (DeserializeException $e) {}
          catch (TwilioException $e) {}

        $this->assertRequest(new Request(
            'get',
            'https://wireless.twilio.com/v1/Sims/DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX/DataSessions'
        ));
    }

    public function testFetchResponse(): void {
        $this->holodeck->mock(new Response(
            200,
            '
            {
                "data_sessions": [
                    {
                        "sid": "WNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "sim_sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "radio_link": "LTE",
                        "operator_mcc": "",
                        "operator_mnc": "",
                        "operator_country": "",
                        "operator_name": "",
                        "cell_id": "",
                        "cell_location_estimate": {},
                        "packets_uploaded": 0,
                        "packets_downloaded": 0,
                        "last_updated": "2015-07-30T20:00:00Z",
                        "start": "2015-07-30T20:00:00Z",
                        "end": null,
                        "imei": null
                    },
                    {
                        "sid": "WNaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "sim_sid": "DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "account_sid": "ACaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa",
                        "radio_link": "3G",
                        "operator_mcc": "",
                        "operator_mnc": "",
                        "operator_country": "",
                        "operator_name": "",
                        "cell_id": "",
                        "cell_location_estimate": {},
                        "packets_uploaded": 0,
                        "packets_downloaded": 0,
                        "last_updated": "2015-07-30T20:00:00Z",
                        "start": "2015-07-30T20:00:00Z",
                        "end": "2015-07-30T20:00:00Z",
                        "imei": "014931000129700"
                    }
                ],
                "meta": {
                    "first_page_url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DataSessions?Start=2015-07-30T20%3A00%3A00Z&End=2015-07-30T20%3A00%3A00Z&PageSize=50&Page=0",
                    "key": "data_sessions",
                    "next_page_url": null,
                    "page": 0,
                    "page_size": 50,
                    "previous_page_url": null,
                    "url": "https://wireless.twilio.com/v1/Sims/DEaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa/DataSessions?Start=2015-07-30T20%3A00%3A00Z&End=2015-07-30T20%3A00%3A00Z&PageSize=50&Page=0"
                }
            }
            '
        ));

        $actual = $this->twilio->wireless->v1->sims("DEXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX")
                                             ->dataSessions->read();

        $this->assertNotNull($actual);
    }
}