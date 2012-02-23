<?php
namespace LWV\ToolkitBundle\Service;

use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;

class ToolkitEncoder implements PasswordEncoderInterface
{

    public function encodePassword($raw, $salt)
    {
        $mix = $raw . "{" . $salt . "}";
        return hash('sha256', $mix);
    }

    public function isPasswordValid($encoded, $raw, $salt)
    {
        return $encoded === $this->encodePassword($raw, $salt);
    }
}
