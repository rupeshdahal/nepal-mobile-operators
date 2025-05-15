<?php

namespace RupeshDai\NepalMobileOperators;

class NepalMobileOperators
{
    /**
     * The mobile number to check
     *
     * @var string
     */
    protected $mobileNumber;

    /**
     * Get the operator for a given mobile number
     *
     * @param string $mobileNumber
     * @return string
     */
    public function getOperator(string $mobileNumber): string
    {
        $this->mobileNumber = $this->normalizeNumber($mobileNumber);

        if (!$this->isValidNepalNumber()) {
            return MobileOperator::UNKNOWN;
        }

        return $this->identifyOperator();
    }

    /**
     * Get the operator details for a given mobile number
     *
     * @param string $mobileNumber
     * @return array
     */
    public function getOperatorDetails(string $mobileNumber): array
    {
        $operator = $this->getOperator($mobileNumber);

        if ($operator === MobileOperator::UNKNOWN) {
            return [
                'operator' => MobileOperator::UNKNOWN,
                'prefixes' => [],
                'technology' => 'Unknown'
            ];
        }

        $details = MobileOperator::getOperatorDetails()[$operator];

        return [
            'operator' => $operator,
            'prefixes' => $details['prefixes'],
            'technology' => $details['technology']
        ];
    }

    /**
     * Check if a mobile number is valid for Nepal
     *
     * @param string $mobileNumber
     * @return bool
     */
    public function isValid(string $mobileNumber): bool
    {
        $this->mobileNumber = $this->normalizeNumber($mobileNumber);
        return $this->isValidNepalNumber();
    }

    /**
     * Validate mobile number format for Nepal
     *
     * @return bool
     */
    protected function isValidNepalNumber(): bool
    {
        // Check if the number is a valid Nepali mobile number (10 digits starting with 9)
        if (preg_match('/^9\d{9}$/', $this->mobileNumber)) {
            return true;
        }

        return false;
    }

    /**
     * Identify the operator based on number prefix
     *
     * @return string
     */
    protected function identifyOperator(): string
    {
        $prefix = substr($this->mobileNumber, 0, 3);

        foreach (MobileOperator::getOperatorDetails() as $operator => $details) {
            if (in_array($prefix, $details['prefixes'])) {
                return $operator;
            }
        }

        return MobileOperator::UNKNOWN;
    }

    /**
     * Normalize the phone number to a standard format
     *
     * @param string $mobileNumber
     * @return string
     */
    protected function normalizeNumber(string $mobileNumber): string
    {
        // Remove any spaces, dashes, or other formatting
        $number = preg_replace('/[^0-9]/', '', $mobileNumber);

        // Handle numbers with country code (Nepal is +977)
        if (strpos($number, '977') === 0) {
            $number = substr($number, 3);
        }

        // If there's a leading 0, remove it
        if (strpos($number, '0') === 0) {
            $number = substr($number, 1);
        }

        return $number;
    }
}
