<?php

namespace Smaft\OktaSdk\Model;

/**
 * @author Adrien Brault <adrien.brault@gmail.com>
 */
class Profile extends BaseModel
{
    /**
     * Unique
     * Length: 5 - 100
     *
     * @var string unique identifier for the user (username)
     */
    protected $login;

    /**
     * Unique
     * Length: 5 - 100
     *
     * @var string primary email address of user
     */
    protected $email;

    /**
     * Unique
     * Length: 5 - 100
     *
     * @var string|null secondary email address of user typically used for account recovery
     */
    protected $secondEmail;

    /**
     * Length: 1 - 50
     *
     * @var string given name of the user (givenName)
     */
    protected $firstName;

    /**
     * Length: 1 - 50
     *
     * @var string family name of the user (familyName)
     */
    protected $lastName;

    /**
     * @var string|null middle name(s) of the user
     */
    protected $middleName;

    /**
     * @var string|null honorific prefix(es) of the user, or title in most Western languages
     */
    protected $honorificPrefix;

    /**
     * @var string|null honorific suffix(es) of the user
     */
    protected $honorificSuffix;

    /**
     * @var string|null user’s title, such as “Vice President”
     */
    protected $title;

    /**
     * @var string|null name of the user, suitable for display to end-users
     */
    protected $displayName;

    /**
     * @var string|null casual way to address the user in real life
     */
    protected $nickName;

    /**
     * @var string|null url of user’s online profile (e.g. a web page)
     */
    protected $profileUrl;

    /**
     * Length: 0 - 100
     *
     * @var string|null primary phone number of user such as home number
     */
    protected $primaryPhone;

    /**
     * Length: 0 - 100
     *
     * @var string|null mobile phone number of user
     */
    protected $mobilePhone;

    /**
     * @var string|null full street address component of user’s address
     */
    protected $streetAddress;

    /**
     * @var string|null city or locality component of user’s address (locality)
     */
    protected $city;

    /**
     * @var string|null state or region component of user’s address (region)
     */
    protected $state;

    /**
     * @var string|null zipcode or postal code component of user’s address (postalCode)
     */
    protected $zipCode;

    /**
     * @var string|null country name component of user’s address (country)
     */
    protected $countryCode;

    /**
     * @var string|null mailing address component of user’s address
     */
    protected $postalAddress;

    /**
     * @var string|null user’s preferred written or spoken languages
     */
    protected $preferredLanguage;

    /**
     * @var string|null user’s default location for purposes of localizing items such as currency, date time format, numerical representations, etc.
     */
    protected $locale;

    /**
     * @var string|null user’s time zone
     */
    protected $timezone;

    /**
     * @var string|null used to identify the organization to user relationship such as “Employee” or “Contractor”
     */
    protected $userType;

    /**
     * @var string|null organization or company assigned unique identifier for the user
     */
    protected $employeeNumber;

    /**
     * @var string|null name of a cost center assigned to user
     */
    protected $costCenter;

    /**
     * @var string|null name of user’s organization
     */
    protected $organization;

    /**
     * @var string|null name of user’s division
     */
    protected $division;

    /**
     * @var string|null name of user’s department
     */
    protected $department;

    /**
     * @var string|null id of a user’s manager
     */
    protected $managerId;

    /**
     * @var string|null displayName of the user’s manager
     */
    protected $manager;

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return null|string
     */
    public function getSecondEmail()
    {
        return $this->secondEmail;
    }

    /**
     * @param null|string $secondEmail
     */
    public function setSecondEmail($secondEmail)
    {
        $this->secondEmail = $secondEmail;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return null|string
     */
    public function getMiddleName()
    {
        return $this->middleName;
    }

    /**
     * @param null|string $middleName
     */
    public function setMiddleName($middleName)
    {
        $this->middleName = $middleName;
    }

    /**
     * @return null|string
     */
    public function getHonorificPrefix()
    {
        return $this->honorificPrefix;
    }

    /**
     * @param null|string $honorificPrefix
     */
    public function setHonorificPrefix($honorificPrefix)
    {
        $this->honorificPrefix = $honorificPrefix;
    }

    /**
     * @return null|string
     */
    public function getHonorificSuffix()
    {
        return $this->honorificSuffix;
    }

    /**
     * @param null|string $honorificSuffix
     */
    public function setHonorificSuffix($honorificSuffix)
    {
        $this->honorificSuffix = $honorificSuffix;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param null|string $displayName
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }

    /**
     * @return null|string
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * @param null|string $nickName
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;
    }

    /**
     * @return null|string
     */
    public function getProfileUrl()
    {
        return $this->profileUrl;
    }

    /**
     * @param null|string $profileUrl
     */
    public function setProfileUrl($profileUrl)
    {
        $this->profileUrl = $profileUrl;
    }

    /**
     * @return null|string
     */
    public function getPrimaryPhone()
    {
        return $this->primaryPhone;
    }

    /**
     * @param null|string $primaryPhone
     */
    public function setPrimaryPhone($primaryPhone)
    {
        $this->primaryPhone = $primaryPhone;
    }

    /**
     * @return null|string
     */
    public function getMobilePhone()
    {
        return $this->mobilePhone;
    }

    /**
     * @param null|string $mobilePhone
     */
    public function setMobilePhone($mobilePhone)
    {
        $this->mobilePhone = $mobilePhone;
    }

    /**
     * @return null|string
     */
    public function getStreetAddress()
    {
        return $this->streetAddress;
    }

    /**
     * @param null|string $streetAddress
     */
    public function setStreetAddress($streetAddress)
    {
        $this->streetAddress = $streetAddress;
    }

    /**
     * @return null|string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param null|string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return null|string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param null|string $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return null|string
     */
    public function getZipCode()
    {
        return $this->zipCode;
    }

    /**
     * @param null|string $zipCode
     */
    public function setZipCode($zipCode)
    {
        $this->zipCode = $zipCode;
    }

    /**
     * @return null|string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param null|string $countryCode
     */
    public function setCountryCode($countryCode)
    {
        $this->countryCode = $countryCode;
    }

    /**
     * @return null|string
     */
    public function getPostalAddress()
    {
        return $this->postalAddress;
    }

    /**
     * @param null|string $postalAddress
     */
    public function setPostalAddress($postalAddress)
    {
        $this->postalAddress = $postalAddress;
    }

    /**
     * @return null|string
     */
    public function getPreferredLanguage()
    {
        return $this->preferredLanguage;
    }

    /**
     * @param null|string $preferredLanguage
     */
    public function setPreferredLanguage($preferredLanguage)
    {
        $this->preferredLanguage = $preferredLanguage;
    }

    /**
     * @return null|string
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param null|string $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * @return null|string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param null|string $timezone
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;
    }

    /**
     * @return null|string
     */
    public function getUserType()
    {
        return $this->userType;
    }

    /**
     * @param null|string $userType
     */
    public function setUserType($userType)
    {
        $this->userType = $userType;
    }

    /**
     * @return null|string
     */
    public function getEmployeeNumber()
    {
        return $this->employeeNumber;
    }

    /**
     * @param null|string $employeeNumber
     */
    public function setEmployeeNumber($employeeNumber)
    {
        $this->employeeNumber = $employeeNumber;
    }

    /**
     * @return null|string
     */
    public function getCostCenter()
    {
        return $this->costCenter;
    }

    /**
     * @param null|string $costCenter
     */
    public function setCostCenter($costCenter)
    {
        $this->costCenter = $costCenter;
    }

    /**
     * @return null|string
     */
    public function getOrganization()
    {
        return $this->organization;
    }

    /**
     * @param null|string $organization
     */
    public function setOrganization($organization)
    {
        $this->organization = $organization;
    }

    /**
     * @return null|string
     */
    public function getDivision()
    {
        return $this->division;
    }

    /**
     * @param null|string $division
     */
    public function setDivision($division)
    {
        $this->division = $division;
    }

    /**
     * @return null|string
     */
    public function getDepartment()
    {
        return $this->department;
    }

    /**
     * @param null|string $department
     */
    public function setDepartment($department)
    {
        $this->department = $department;
    }

    /**
     * @return null|string
     */
    public function getManagerId()
    {
        return $this->managerId;
    }

    /**
     * @param null|string $managerId
     */
    public function setManagerId($managerId)
    {
        $this->managerId = $managerId;
    }

    /**
     * @return null|string
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param null|string $manager
     */
    public function setManager($manager)
    {
        $this->manager = $manager;
    }
}
