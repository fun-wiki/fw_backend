<?php

namespace Fw\Backend\Classes;

use Google_Client;
use Google_Service_Analytics;

class GoogleServices
{
    private static function initializeAnalytics()
    {
        $KEY_FILE_LOCATION = __DIR__ . '/service-account-credentials.json';
        $client = new Google_Client();
        $client->setApplicationName("Hello Analytics Reporting");
        $client->setAuthConfig($KEY_FILE_LOCATION);
        $client->setScopes(['https://www.googleapis.com/auth/analytics.readonly']);
        $analytics = new Google_Service_Analytics($client);
        return $analytics;
    }

    public static function getVisitors($page)
    {
        $analytics = self::initializeAnalytics();
        $data = $analytics->data_ga->get(
            'ga:183243648',
            '2009-01-01',
            date('Y-m-d'),
            'ga:pageviews',
            array(
                'dimensions' => 'ga:pagePath',
                'filters' => 'ga:pagePath==' . $page,
            )
        );
        $rows = $data->getRows();
        $visitors = $rows[0][1];
        return $visitors;
    }
}
