<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Entity
 * @ORM\Table(name="contact")
 */
class Contact {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @Assert\NotBlank()
     * @Assert\Choice(choices = {"Herr", "Frau"})
     */
    protected $salutation;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="3", minMessage="this value was too short")
     */
    protected $preName;

    /**
     * @ORM\Column(type="string")
     * @Assert\Length(min="3", minMessage="this value was too short")
     */
    protected $lastName;

    /**
     * @ORM\Column(type="string")
     * @Assert\Email()
     */
    protected $emailAddress;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @Assert\Length(max="20", maxMessage="this value was too long")
     */
    protected $subject;

    /**
     * @ORM\Column(type="text")
     */
    protected $textField;

    /**
     * @return string salutation
     */
    public function getSalutation() {
        return $this->salutation;
    }

    /**
     * @param string $salutation
     */
    public function setSalutation($salutation) {
        $this->salutation = $salutation;
    }

    /**
     * @return string preName
     */
    public function getPreName() {
        return $this->preName;
    }

    /**
     * @param string $preName
     */
    public function setPreName($preName) {
        $this->preName = $preName;
    }

    /**
     * @return string laseName
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    /**
     * @return string emailAddress
     */
    public function getEmailAddress() {
        return $this->emailAddress;
    }

    /**
     * @param string $emailAddress
     */
    public function setEmailAddress($emailAddress) {
        $this->emailAddress = $emailAddress;
    }

    /**
     * @return string subject
     */
    public function getSubject() {
        return $this->subject;
    }

    /**
     * @param string $subject
     */
    public function setSubject($subject) {
        $this->subject = $subject;
    }

    /**
     * @return string textField
     */
    public function getTextField() {
        return $this->textField;
    }

    /**
     * @param string $textField
     */
    public function setTextField($textField) {
        $this->textField = $textField;
    }

}