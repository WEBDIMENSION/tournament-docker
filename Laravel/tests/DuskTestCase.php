<?php

namespace Tests;

use Laravel\Dusk\TestCase as BaseTestCase;
use Facebook\WebDriver\Chrome\ChromeOptions;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use Facebook\WebDriver\Remote\DesiredCapabilities;

abstract class DuskTestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Prepare for Dusk test execution.
     *
     * @beforeClass
     * @return void
     */
    public static function prepare()
    {
//        static::startChromeDriver();
    }

    protected function baseUrl()
    {
        if (env('APP_ENV') == 'local') {
            return 'http://nginx:80';
        } elseif (env('APP_ENV') == 'testing') {
            return 'http://localhost:8000';
        }
    }

    /**
     * Create the RemoteWebDriver instance.
     *
     * @return \Facebook\WebDriver\Remote\RemoteWebDriver
     */
    protected function driver()
    {
        if (env('APP_ENV') == 'local') {
            $options = (new ChromeOptions)->addArguments([
                '--disable-gpu',
                '--headless',
            ]);
            return RemoteWebDriver::create(
                'http://selenium-hub:4444/wd/hub', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
            );
        } elseif (env('APP_ENV') == 'testing') {
            $options = (new ChromeOptions)->addArguments([
                '--disable-gpu',
                '--headless',
                '--window-size=1920,1080',
           ]);
            return RemoteWebDriver::create(
//                'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
                'http://localhost:4444/wd/hub', DesiredCapabilities::chrome()->setCapability(
                ChromeOptions::CAPABILITY, $options
            )
            );
        }
    }
}
