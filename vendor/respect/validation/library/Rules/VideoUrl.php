<?php

/**
 *
 * PHP version 5 and 7
 *
 * @author Qordoba Team <support@qordoba.com>
 * @copyright 2018 Qordoba Team
 *
 */

namespace Respect\Validation\Rules;

use Respect\Validation\Exceptions\ComponentException;

class VideoUrl extends AbstractRule
{
    /**
     * @var string
     */
    public $service;

    /**
     * @var string
     */
    private $serviceKey;

    /**
     * @var array
     */
    private $services = [
        'youtube' => '@^https?://(www\.)?(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^\"&?/]{11})@i',
        'vimeo' => '@^https?://(www\.)?(player\.)?(vimeo\.com/)((channels/[A-z]+/)|(groups/[A-z]+/videos/)|(video/))?([0-9]+)@i',
    ];

    /**
     * Create a new instance VideoUrl.
     *
     * @param string $service
     */
    public function __construct($service = null)
    {
        $serviceKey = strtolower($service);
        if (null !== $service && !isset($this->services[$serviceKey])) {
            throw new ComponentException(sprintf('"%s" is not a recognized video service.', $service));
        }

        $this->service = $service;
        $this->serviceKey = strtolower($service);
    }

    /**
     * {@inheritdoc}
     */
    public function validate($input)
    {
        if (isset($this->services[$this->serviceKey])) {
            return (preg_match($this->services[$this->serviceKey], $input) > 0);
        }

        foreach ($this->services as $pattern) {
            if (0 === preg_match($pattern, $input)) {
                continue;
            }

            return true;
        }

        return false;
    }
}
