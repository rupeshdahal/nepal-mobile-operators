<?php

namespace RupeshDai\nepalimobileoperator\tests;

use YourVendor\NepalMobileOperators\Facades\NepalMobileOperators;
use YourVendor\NepalMobileOperators\MobileOperator;

class NepalMobileOperatorsTest extends TestCase
{
    /** @test */
    public function it_identifies_ntc_namaste_number()
    {
        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('9841234567')
        );

        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('9851234567')
        );

        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('9861234567')
        );

        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('9761234567')
        );
    }

    /** @test */
    public function it_identifies_ntc_cdma_gsm_number()
    {
        $this->assertEquals(
            MobileOperator::NTC_CDMA_GSM,
            NepalMobileOperators::getOperator('9741234567')
        );

        $this->assertEquals(
            MobileOperator::NTC_CDMA_GSM,
            NepalMobileOperators::getOperator('9751234567')
        );
    }

    /** @test */
    public function it_identifies_ncell_number()
    {
        $this->assertEquals(
            MobileOperator::NCELL,
            NepalMobileOperators::getOperator('9801234567')
        );

        $this->assertEquals(
            MobileOperator::NCELL,
            NepalMobileOperators::getOperator('9811234567')
        );

        $this->assertEquals(
            MobileOperator::NCELL,
            NepalMobileOperators::getOperator('9821234567')
        );

        $this->assertEquals(
            MobileOperator::NCELL,
            NepalMobileOperators::getOperator('9701234567')
        );
    }

    /** @test */
    public function it_identifies_smart_cell_number()
    {
        $this->assertEquals(
            MobileOperator::SMART_CELL,
            NepalMobileOperators::getOperator('9611234567')
        );

        $this->assertEquals(
            MobileOperator::SMART_CELL,
            NepalMobileOperators::getOperator('9621234567')
        );

        $this->assertEquals(
            MobileOperator::SMART_CELL,
            NepalMobileOperators::getOperator('9881234567')
        );
    }

    /** @test */
    public function it_identifies_utl_number()
    {
        $this->assertEquals(
            MobileOperator::UTL,
            NepalMobileOperators::getOperator('9721234567')
        );
    }

    /** @test */
    public function it_identifies_hello_mobile_number()
    {
        $this->assertEquals(
            MobileOperator::HELLO_MOBILE,
            NepalMobileOperators::getOperator('9631234567')
        );
    }

    /** @test */
    public function it_returns_unknown_for_invalid_prefix()
    {
        $this->assertEquals(
            MobileOperator::UNKNOWN,
            NepalMobileOperators::getOperator('9001234567')
        );
    }

    /** @test */
    public function it_returns_unknown_for_invalid_number_format()
    {
        $this->assertEquals(
            MobileOperator::UNKNOWN,
            NepalMobileOperators::getOperator('12345')
        );
    }

    /** @test */
    public function it_handles_numbers_with_country_code()
    {
        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('+9779841234567')
        );

        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('9779841234567')
        );
    }

    /** @test */
    public function it_handles_numbers_with_leading_zero()
    {
        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('09841234567')
        );
    }

    /** @test */
    public function it_handles_formatted_numbers()
    {
        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('984-123-4567')
        );

        $this->assertEquals(
            MobileOperator::NTC_NAMASTE,
            NepalMobileOperators::getOperator('984 123 4567')
        );
    }

    /** @test */
    public function it_validates_nepal_mobile_numbers()
    {
        $this->assertTrue(NepalMobileOperators::isValid('9841234567'));
        $this->assertFalse(NepalMobileOperators::isValid('1234567890'));
        $this->assertFalse(NepalMobileOperators::isValid('98412345')); // Too short
    }

    /** @test */
    public function it_returns_operator_details()
    {
        $details = NepalMobileOperators::getOperatorDetails('9841234567');

        $this->assertEquals(MobileOperator::NTC_NAMASTE, $details['operator']);
        $this->assertEquals(['984', '985', '986', '976'], $details['prefixes']);
        $this->assertEquals('GSM', $details['technology']);
    }
}
