<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\BaseModel
 *
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModel query()
 * @mixin \Eloquent
 */
	class IdeHelperBaseModel {}
}

namespace App\Models{
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperContact {}
}

namespace App\Models{
/**
 * App\Models\Continent
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\VolunteerCollection<int, \App\Models\Volunteer> $volunteers
 * @property-read int|null $volunteers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Continent newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Continent newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Continent query()
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Continent whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperContinent {}
}

namespace App\Models{
/**
 * App\Models\Country
 *
 * @property int $id
 * @property int|null $continent_id
 * @property string $alpha-2_code
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|Country newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Country query()
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereAlpha2Code($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereContinentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Country whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperCountry {}
}

namespace App\Models{
/**
 * App\Models\Discipline
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\VolunteerCollection<int, \App\Models\Volunteer> $volunteers
 * @property-read int|null $volunteers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Discipline newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discipline newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discipline query()
 * @method static \Illuminate\Database\Eloquent\Builder|Discipline whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discipline whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discipline whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discipline whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDiscipline {}
}

namespace App\Models{
/**
 * App\Models\Duty
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|Duty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Duty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Duty query()
 * @method static \Illuminate\Database\Eloquent\Builder|Duty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duty whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duty whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDuty {}
}

namespace App\Models{
/**
 * App\Models\DutyModel
 *
 * @property int $id
 * @property int $duty_id
 * @property int $duty_type_id
 * @property int $duty_model_id
 * @property string $duty_model_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Duty $duty
 * @property-read \App\Models\DutyType $dutyType
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel whereDutyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel whereDutyModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel whereDutyModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel whereDutyTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDutyModel {}
}

namespace App\Models{
/**
 * App\Models\DutyType
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|DutyType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DutyType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DutyType query()
 * @method static \Illuminate\Database\Eloquent\Builder|DutyType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DutyType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperDutyType {}
}

namespace App\Models{
/**
 * App\Models\Experience
 *
 * @property int $id
 * @property string $value
 * @property int $local
 * @property int $national
 * @property int $international
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @method static \App\Models\ExperienceCollection<int, static> all($columns = ['*'])
 * @method static \App\Models\ExperienceCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience query()
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereInternational($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereNational($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Experience whereValue($value)
 * @mixin \Eloquent
 */
	class IdeHelperExperience {}
}

namespace App\Models{
/**
 * App\Models\Gender
 *
 * @property int $id
 * @property string $name
 * @property string $salutation
 * @property string $short_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereSalutation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereShortName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gender whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperGender {}
}

namespace App\Models{
/**
 * App\Models\Guest
 *
 * @property int $id
 * @property int|null $gender_id
 * @property int|null $country_id
 * @property string $name
 * @property string|null $birthdate
 * @property string $email
 * @property string $phone
 * @property string|null $contact_other
 * @property int $driving_licence
 * @property int $ol_duration
 * @property string|null $club
 * @property int|null $local_experience
 * @property int|null $national_experience
 * @property int|null $international_experience
 * @property string|null $o_expectations
 * @property string|null $motivation
 * @property string|null $health_restrictions
 * @property string|null $offer
 * @property string|null $other_input
 * @property string|null $other_languages
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Discipline> $disciplines
 * @property-read int|null $disciplines_count
 * @property-read \App\Models\Gender|null $gender
 * @property-read int $age
 * @property-read mixed $driving_licence_model
 * @property-read string $snake_case_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LanguageModel> $languageGuests
 * @property-read int|null $language_guests_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Language> $languages
 * @property-read int|null $languages_count
 * @property-read \App\Models\User|null $user
 * @method static \App\Models\GuestCollection<int, static> all($columns = ['*'])
 * @method static \App\Models\GuestCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest query()
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereClub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereContactOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereDrivingLicence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereHealthRestrictions($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereInternationalExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereLocalExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereMotivation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereNationalExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereOExpectations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereOffer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereOlDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereOtherInput($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereOtherLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Guest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperGuest {}
}

namespace App\Models{
/**
 * App\Models\Host
 *
 * @property int $id
 * @property int $country_id
 * @property string $zip
 * @property string $city
 * @property int $max_duration
 * @property string $host_desc
 * @property string|null $guest_expectations
 * @property string $name
 * @property string $contact_phone
 * @property string $contact_email
 * @property string|null $contact_other
 * @property string|null $other_languages
 * @property string|null $offer_text
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Country $country
 * @property-read string $snake_case_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\HostProjectOffer> $hostProjectOffers
 * @property-read int|null $host_project_offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LanguageModel> $languageHosts
 * @property-read int|null $language_hosts_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Language> $languages
 * @property-read int|null $languages_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProjectOffer> $projectOffers
 * @property-read int|null $project_offers_count
 * @property-read \App\Models\User|null $user
 * @method static \App\Models\HostCollection<int, static> all($columns = ['*'])
 * @method static \App\Models\HostCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Host newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Host newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Host query()
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereContactOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereGuestExpectations($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereHostDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereMaxDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereOfferText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereOtherLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Host whereZip($value)
 * @mixin \Eloquent
 */
	class IdeHelperHost {}
}

namespace App\Models{
/**
 * App\Models\HostProjectOffer
 *
 * @property int $id
 * @property int $host_id
 * @property int $project_offer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\Host $host
 * @property-read \App\Models\ProjectOffer $projectOffer
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer whereHostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer whereProjectOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|HostProjectOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperHostProjectOffer {}
}

namespace App\Models{
/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\VolunteerCollection<int, \App\Models\Volunteer> $volunteers
 * @property-read int|null $volunteers_count
 * @method static \Illuminate\Database\Eloquent\Builder|Language newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Language query()
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Language whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperLanguage {}
}

namespace App\Models{
/**
 * App\Models\LanguageModel
 *
 * @property int $id
 * @property int $language_id
 * @property int|null $language_proficiency_id
 * @property int $language_model_id
 * @property string $language_model_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $language_name
 * @property-read string $language_proficiency_name
 * @property-read string $snake_case_name
 * @property-read \App\Models\Language $language
 * @property-read \App\Models\LanguageProficiency|null $languageProficiency
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel whereLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel whereLanguageModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel whereLanguageModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel whereLanguageProficiencyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperLanguageModel {}
}

namespace App\Models{
/**
 * App\Models\LanguageProficiency
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageProficiency newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageProficiency newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageProficiency query()
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageProficiency whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageProficiency whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageProficiency whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LanguageProficiency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperLanguageProficiency {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property int|null $gender_id
 * @property int|null $user_id
 * @property int|null $country_id
 * @property int|null $continent_id
 * @property int|null $project_status_id
 * @property int|null $organisation_language_id
 * @property string $name
 * @property string $organisation_name
 * @property string|null $organisation_webpage
 * @property string|null $organisation_contact
 * @property string|null $organisation_contact_position
 * @property string $organisation_email
 * @property string $organisation_phone
 * @property string|null $start_date
 * @property string|null $other_duties
 * @property string $contact
 * @property string $place
 * @property string|null $offer_text
 * @property string $exprience_details
 * @property int|null $o_work_experience_local
 * @property int|null $o_work_experience_international
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Continent|null $continent
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Discipline> $disciplines
 * @property-read int|null $disciplines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Duty> $duties
 * @property-read int|null $duties_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DutyModel> $dutyProject
 * @property-read int|null $duty_project_count
 * @property-read mixed $skill_types
 * @property-read string $snake_case_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProjectOffer> $projectOffers
 * @property-read int|null $project_offers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ProjectProjectOffer> $projectProjectOffers
 * @property-read int|null $project_project_offers_count
 * @property-read \App\Models\ProjectStatus|null $projectStatus
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @property-read \App\Models\User|null $user
 * @property-read \App\Models\VolunteerCollection<int, \App\Models\Volunteer> $volunteers
 * @property-read int|null $volunteers_count
 * @method static \App\Models\ProjectCollection<int, static> all($columns = ['*'])
 * @method static \App\Models\ProjectCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereContinentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereExprienceDetails($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOWorkExperienceInternational($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOWorkExperienceLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOfferText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrganisationContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrganisationContactPosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrganisationEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrganisationLanguageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrganisationName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrganisationPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOrganisationWebpage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereOtherDuties($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePlace($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereProjectStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUserId($value)
 * @mixin \Eloquent
 */
	class IdeHelperProject {}
}

namespace App\Models{
/**
 * App\Models\ProjectOffer
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\ProjectCollection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectOffer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperProjectOffer {}
}

namespace App\Models{
/**
 * App\Models\ProjectProjectOffer
 *
 * @property int $id
 * @property int $project_id
 * @property int $project_offer_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\Project $project
 * @property-read \App\Models\ProjectOffer $projectOffer
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer whereProjectOfferId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectProjectOffer whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperProjectProjectOffer {}
}

namespace App\Models{
/**
 * App\Models\ProjectStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\ProjectCollection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperProjectStatus {}
}

namespace App\Models{
/**
 * App\Models\ProjectVolunteer
 *
 * @property-read string $snake_case_name
 * @property-read \App\Models\Project $project
 * @property-read \App\Models\Volunteer|null $volunteer
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectVolunteer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectVolunteer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectVolunteer query()
 * @mixin \Eloquent
 */
	class IdeHelperProjectVolunteer {}
}

namespace App\Models{
/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $name
 * @property int $skill_type_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \App\Models\SkillType $skillType
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereSkillTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class IdeHelperSkill {}
}

namespace App\Models{
/**
 * App\Models\SkillType
 *
 * @property int $id
 * @property string $name
 * @property string|null $warn
 * @property string|null $text
 * @property string|null $vol_col_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $snake_case_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType whereVolColName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SkillType whereWarn($value)
 * @mixin \Eloquent
 */
	class IdeHelperSkillType {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property int|null $volunteer_id
 * @property int|null $host_id
 * @property int|null $guest_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Guest|null $guest
 * @property-read \App\Models\Host|null $host
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\ProjectCollection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \App\Models\Volunteer|null $volunteer
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGuestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereVolunteerId($value)
 * @mixin \Eloquent
 */
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * App\Models\Volunteer
 *
 * @property int $id
 * @property int|null $gender_id
 * @property int|null $country_id
 * @property int $active
 * @property string|null $name
 * @property string|null $birthdate
 * @property string|null $email
 * @property int|null $driving_licence
 * @property int|null $start_year
 * @property int|null $ol_duration
 * @property int|null $work_duration
 * @property string|null $club
 * @property int|null $local_experience
 * @property int|null $national_experience
 * @property int|null $international_experience
 * @property string|null $other_languages
 * @property int|null $o_work_experience_local
 * @property int|null $o_work_experience_international
 * @property string|null $skill_mapping
 * @property string|null $skill_coaching
 * @property string|null $skill_it
 * @property string|null $skill_event_organising
 * @property string|null $skill_teaching
 * @property string|null $skill_other
 * @property string|null $help
 * @property string|null $expectation
 * @property int $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Continent> $continents
 * @property-read int|null $continents_count
 * @property-read \App\Models\Country|null $country
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Discipline> $disciplines
 * @property-read int|null $disciplines_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Duty> $duties
 * @property-read int|null $duties_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\DutyModel> $dutyVolunteer
 * @property-read int|null $duty_volunteer_count
 * @property-read \App\Models\Gender|null $gender
 * @property-read int $age
 * @property-read mixed $driving_licence_model
 * @property-read mixed $skill_types
 * @property-read string $snake_case_name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LanguageProficiency> $languageProficiencies
 * @property-read int|null $language_proficiencies_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LanguageModel> $languageVolunteers
 * @property-read int|null $language_volunteers_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Language> $languages
 * @property-read int|null $languages_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\ProjectCollection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Skill> $skills
 * @property-read int|null $skills_count
 * @property-read \App\Models\User|null $user
 * @method static \App\Models\VolunteerCollection<int, static> all($columns = ['*'])
 * @method static \Database\Factories\VolunteerFactory factory($count = null, $state = [])
 * @method static \App\Models\VolunteerCollection<int, static> get($columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer query()
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereBirthdate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereClub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereDrivingLicence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereExpectation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereHelp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereInternationalExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereLocalExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereNationalExperience($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereOWorkExperienceInternational($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereOWorkExperienceLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereOlDuration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereOtherLanguages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereSkillCoaching($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereSkillEventOrganising($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereSkillIt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereSkillMapping($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereSkillOther($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereSkillTeaching($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereStartYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Volunteer whereWorkDuration($value)
 * @mixin \Eloquent
 */
	class IdeHelperVolunteer {}
}

