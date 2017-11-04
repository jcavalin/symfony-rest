<?php

namespace AppBundle\Security;


class ApiProblem
{
    private $data;

    /**
     * ApiProblem constructor.
     * @param int $code
     */
    public function __construct($code)
    {
        $this->data['code'] = $code;
        $this->set('type', '');
    }

    public function set($key, $message)
    {
        $this->data[$key] = $message;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function getStatusCode()
    {
        return $this->data['code'];
    }
}