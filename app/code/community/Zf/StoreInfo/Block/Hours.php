<?php
/**
 * @author Zeke Farwell
 */

class Zf_StoreInfo_Block_Hours extends Mage_Core_Block_Template
{
    protected function _construct()
    {
        parent::_construct();
        $this->addData(array('cache_lifetime' => 3600));
    }

    /**
     * Get a weekday's business hours from system configuration
     * @param $weekday      (monday|tuesday|wednesday|etc)
     * @return string
     */
    public function getWeekdayHours($weekday)
    {
        return Mage::getStoreConfig('zfstore/business_hours/' . $weekday);
    }

    /**
     * Get a string describing today's open/closed status
     * and business hours if open
     * @return string
     */
    public function getTodaysHours()
    {
        $exception = $this->_checkForException();
        if ($exception) {
            $hours = $exception['hours'];
            $closed = (strcasecmp($hours, 'closed') == 0) ? true : false;
            $note = $exception['note'];
        } else {
            $dayOfWeek = date("l", Mage::getModel('core/date')->timestamp(time()));
            $hours = $this->getWeekdayHours( strtolower($dayOfWeek));
            $closed = false;
            $note = "";
        }
        if ($closed) {
            $hours_string = "Closed Today";
            if (!empty($note)) $hours_string .= " - $note";
        } else {
            $hours_string = "Open Today: $hours";
        }
        return $hours_string;
    }

    /**
     * Returns a business hours exception matching today's date, or false if none found
     * @return array|bool
     */
    protected function _checkForException()
    {
        $today = Mage::getModel('core/date')->date('Y-m-d');
        $exceptions = $this->_getExceptions();
        if (is_array($exceptions)) {
            foreach ($exceptions as $exception) {
                if ($exception['date'] == '' ) continue;  // skip if date is blank
                if ($exception['date'] == $today) {
                    return $exception;
                }
            }
        }
        return false; // no exception found for today
    }

    /**
     * Get all business hours exceptions from system configuration
     * @return mixed
     */
    protected function _getExceptions()
    {
        $exceptions = Mage::getStoreConfig('zfstore/business_hours/exceptions');
        return unserialize($exceptions);
    }

    /**
     * Get all business hours exceptions that are within range of today's date.
     * Within range means yesterday or up to 10 days from today.
     * @return array|bool    returns false if no current exceptions
     */
    public function getCurrentExceptions()
    {
        $exceptions = $this->_getExceptions();
        $today = new DateTime();
        $current_exceptions = array();
        if ($exceptions) {
            foreach ($exceptions as $exception) {
                if ($exception['date'] == '' ) continue;  // skip if date is blank
                $exceptionDate = new DateTime($exception['date']);
                if ($today < $exceptionDate->modify('+2 days') && $today > $exceptionDate->modify('-12 days')) {
                    $current_exceptions[] = $exception;
                }
            }
        }

        if (empty($current_exceptions)) {
            return false;
        } else {
            usort($current_exceptions, function($a, $b) { return strcmp($a['date'], $b['date']); } );   // Sort by date
            return $current_exceptions;
        }
    }

    /**
     * @param $dateString    input formats: http://php.net/manual/en/datetime.formats.date.php
     * @param $format        format accepted by date() http://php.net/manual/en/function.date.php
     * @return string        formatted as specified $format
     */
    public function formatDateString($dateString, $format)
    {
        $date = new DateTime($dateString);
        return $date->format($format);
    }

    public function getTimeStamp()
    {
        $timestamp = date("l H:i:s", Mage::getModel('core/date')->timestamp(time()));
        return $timestamp;
    }

    public function getGoogleMapsUrl()
    {
        return Mage::getStoreConfig('zfstore/location/google_maps_url');
    }

    public function getStoreName()
    {
        return Mage::getStoreConfig('zfstore/location/store_name');
    }

    public function getPhoneNumber()
    {
        return Mage::getStoreConfig('zfstore/location/phone');
    }

    public function getAddress()
    {
        return Mage::getStoreConfig('zfstore/location/address');
    }

}
