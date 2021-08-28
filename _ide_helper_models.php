<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;
/**
 * App\Models\BaseModel
 *
 * @property-read array|string $snake_case_name
 * @method static Builder|BaseModel newModelQuery()
 * @method static Builder|BaseModel newQuery()
 * @method static Builder|BaseModel query()
 * @mixin Eloquent
 */
	class IdeHelperBaseModel extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Contact
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @method static Builder|Contact newModelQuery()
 * @method static Builder|Contact newQuery()
 * @method static Builder|Contact query()
 * @method static Builder|Contact whereCreatedAt($value)
 * @method static Builder|Contact whereId($value)
 * @method static Builder|Contact whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperContact extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Continent
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read VolunteerCollection|Volunteer[] $volunteers
 * @property-read int|null $volunteers_count
 * @method static Builder|Continent newModelQuery()
 * @method static Builder|Continent newQuery()
 * @method static Builder|Continent query()
 * @method static Builder|Continent whereCreatedAt($value)
 * @method static Builder|Continent whereId($value)
 * @method static Builder|Continent whereName($value)
 * @method static Builder|Continent whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperContinent extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Country
 *
 * @property int $id
 * @property int|null $continent_id
 * @property string $alpha-2_code
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @method static Builder|Country newModelQuery()
 * @method static Builder|Country newQuery()
 * @method static Builder|Country query()
 * @method static Builder|Country whereAlpha2Code($value)
 * @method static Builder|Country whereContinentId($value)
 * @method static Builder|Country whereCreatedAt($value)
 * @method static Builder|Country whereId($value)
 * @method static Builder|Country whereName($value)
 * @method static Builder|Country whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperCountry extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Discipline
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read VolunteerCollection|Volunteer[] $volunteers
 * @property-read int|null $volunteers_count
 * @method static Builder|Discipline newModelQuery()
 * @method static Builder|Discipline newQuery()
 * @method static Builder|Discipline query()
 * @method static Builder|Discipline whereCreatedAt($value)
 * @method static Builder|Discipline whereId($value)
 * @method static Builder|Discipline whereName($value)
 * @method static Builder|Discipline whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperDiscipline extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Duty
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @method static Builder|Duty newModelQuery()
 * @method static Builder|Duty newQuery()
 * @method static Builder|Duty query()
 * @method static Builder|Duty whereCreatedAt($value)
 * @method static Builder|Duty whereId($value)
 * @method static Builder|Duty whereName($value)
 * @method static Builder|Duty whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperDuty extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\DutyModel
 *
 * @property int $id
 * @property int $duty_id
 * @property int $duty_type_id
 * @property int $duty_model_id
 * @property string $duty_model_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Duty $duty
 * @property-read DutyType $dutyType
 * @property-read array|string $snake_case_name
 * @method static Builder|DutyModel newModelQuery()
 * @method static Builder|DutyModel newQuery()
 * @method static Builder|DutyModel query()
 * @method static Builder|DutyModel whereCreatedAt($value)
 * @method static Builder|DutyModel whereDutyId($value)
 * @method static Builder|DutyModel whereDutyModelId($value)
 * @method static Builder|DutyModel whereDutyModelType($value)
 * @method static Builder|DutyModel whereDutyTypeId($value)
 * @method static Builder|DutyModel whereId($value)
 * @method static Builder|DutyModel whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperDutyModel extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\DutyType
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @method static Builder|DutyType newModelQuery()
 * @method static Builder|DutyType newQuery()
 * @method static Builder|DutyType query()
 * @method static Builder|DutyType whereCreatedAt($value)
 * @method static Builder|DutyType whereId($value)
 * @method static Builder|DutyType whereName($value)
 * @method static Builder|DutyType whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperDutyType extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Experience
 *
 * @property int $id
 * @property string $value
 * @property int $local
 * @property int $national
 * @property int $international
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @method static ExperienceCollection|static[] all($columns = ['*'])
 * @method static ExperienceCollection|static[] get($columns = ['*'])
 * @method static Builder|Experience newModelQuery()
 * @method static Builder|Experience newQuery()
 * @method static Builder|Experience query()
 * @method static Builder|Experience whereCreatedAt($value)
 * @method static Builder|Experience whereId($value)
 * @method static Builder|Experience whereInternational($value)
 * @method static Builder|Experience whereLocal($value)
 * @method static Builder|Experience whereNational($value)
 * @method static Builder|Experience whereUpdatedAt($value)
 * @method static Builder|Experience whereValue($value)
 * @mixin Eloquent
 */
	class IdeHelperExperience extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Gender
 *
 * @property int $id
 * @property string $name
 * @property string $salutation
 * @property string $short_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @method static Builder|Gender newModelQuery()
 * @method static Builder|Gender newQuery()
 * @method static Builder|Gender query()
 * @method static Builder|Gender whereCreatedAt($value)
 * @method static Builder|Gender whereId($value)
 * @method static Builder|Gender whereName($value)
 * @method static Builder|Gender whereSalutation($value)
 * @method static Builder|Gender whereShortName($value)
 * @method static Builder|Gender whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperGender extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Guest
 *
 * @property int $id
 * @property int|null $gender_id
 * @property int|null $user_id
 * @property int|null $country_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read User|null $user
 * @method static Builder|Guest newModelQuery()
 * @method static Builder|Guest newQuery()
 * @method static Builder|Guest query()
 * @method static Builder|Guest whereCountryId($value)
 * @method static Builder|Guest whereCreatedAt($value)
 * @method static Builder|Guest whereGenderId($value)
 * @method static Builder|Guest whereId($value)
 * @method static Builder|Guest whereUpdatedAt($value)
 * @method static Builder|Guest whereUserId($value)
 * @mixin Eloquent
 */
	class IdeHelperGuest extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Host
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $country_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read User|null $user
 * @method static Builder|Host newModelQuery()
 * @method static Builder|Host newQuery()
 * @method static Builder|Host query()
 * @method static Builder|Host whereCountryId($value)
 * @method static Builder|Host whereCreatedAt($value)
 * @method static Builder|Host whereId($value)
 * @method static Builder|Host whereUpdatedAt($value)
 * @method static Builder|Host whereUserId($value)
 * @mixin Eloquent
 */
	class IdeHelperHost extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Language
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read VolunteerCollection|Volunteer[] $volunteers
 * @property-read int|null $volunteers_count
 * @method static Builder|Language newModelQuery()
 * @method static Builder|Language newQuery()
 * @method static Builder|Language query()
 * @method static Builder|Language whereCreatedAt($value)
 * @method static Builder|Language whereId($value)
 * @method static Builder|Language whereName($value)
 * @method static Builder|Language whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperLanguage extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\LanguageModel
 *
 * @property int $id
 * @property int $language_id
 * @property int|null $language_proficiency_id
 * @property int $language_model_id
 * @property string $language_model_type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $language_name
 * @property-read mixed $language_proficiency_name
 * @property-read array|string $snake_case_name
 * @property-read Language $language
 * @property-read LanguageProficiency|null $languageProficiency
 * @method static Builder|LanguageModel newModelQuery()
 * @method static Builder|LanguageModel newQuery()
 * @method static Builder|LanguageModel query()
 * @method static Builder|LanguageModel whereCreatedAt($value)
 * @method static Builder|LanguageModel whereId($value)
 * @method static Builder|LanguageModel whereLanguageId($value)
 * @method static Builder|LanguageModel whereLanguageModelId($value)
 * @method static Builder|LanguageModel whereLanguageModelType($value)
 * @method static Builder|LanguageModel whereLanguageProficiencyId($value)
 * @method static Builder|LanguageModel whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperLanguageModel extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\LanguageProficiency
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @method static Builder|LanguageProficiency newModelQuery()
 * @method static Builder|LanguageProficiency newQuery()
 * @method static Builder|LanguageProficiency query()
 * @method static Builder|LanguageProficiency whereCreatedAt($value)
 * @method static Builder|LanguageProficiency whereId($value)
 * @method static Builder|LanguageProficiency whereName($value)
 * @method static Builder|LanguageProficiency whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperLanguageProficiency extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Support\Carbon;
/**
 * App\Models\Project
 *
 * @property int $id
 * @property int|null $gender_id
 * @property int|null $user_id
 * @property int|null $country_id
 * @property int|null $project_status_id
 * @property int|null $organisation_language_id
 * @property string $organisation_name
 * @property string|null $organisation_webpage
 * @property string $organisation_contact
 * @property string $organisation_contact_position
 * @property string $organisation_email
 * @property string $organisation_phone
 * @property string|null $start_date
 * @property string $contact
 * @property string $place
 * @property string|null $offer_text
 * @property string $exprience_details
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Discipline[] $disciplines
 * @property-read int|null $disciplines_count
 * @property-read Collection|Duty[] $duties
 * @property-read int|null $duties_count
 * @property-read array|string $snake_case_name
 * @property-read Collection|ProjectOffer[] $projectOffer
 * @property-read int|null $project_offer_count
 * @property-read ProjectStatus|null $projectStatus
 * @property-read Collection|Skill[] $skills
 * @property-read int|null $skills_count
 * @property-read User|null $user
 * @method static Builder|Project newModelQuery()
 * @method static Builder|Project newQuery()
 * @method static Builder|Project query()
 * @method static Builder|Project whereContact($value)
 * @method static Builder|Project whereCountryId($value)
 * @method static Builder|Project whereCreatedAt($value)
 * @method static Builder|Project whereExprienceDetails($value)
 * @method static Builder|Project whereGenderId($value)
 * @method static Builder|Project whereId($value)
 * @method static Builder|Project whereOfferText($value)
 * @method static Builder|Project whereOrganisationContact($value)
 * @method static Builder|Project whereOrganisationContactPosition($value)
 * @method static Builder|Project whereOrganisationEmail($value)
 * @method static Builder|Project whereOrganisationLanguageId($value)
 * @method static Builder|Project whereOrganisationName($value)
 * @method static Builder|Project whereOrganisationPhone($value)
 * @method static Builder|Project whereOrganisationWebpage($value)
 * @method static Builder|Project wherePlace($value)
 * @method static Builder|Project whereProjectStatusId($value)
 * @method static Builder|Project whereStartDate($value)
 * @method static Builder|Project whereUpdatedAt($value)
 * @method static Builder|Project whereUserId($value)
 * @mixin Eloquent
 */
	class IdeHelperProject extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Support\Carbon;
/**
 * App\Models\ProjectOffer
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read Collection|Project[] $projects
 * @property-read int|null $projects_count
 * @method static Builder|ProjectOffer newModelQuery()
 * @method static Builder|ProjectOffer newQuery()
 * @method static Builder|ProjectOffer query()
 * @method static Builder|ProjectOffer whereCreatedAt($value)
 * @method static Builder|ProjectOffer whereId($value)
 * @method static Builder|ProjectOffer whereName($value)
 * @method static Builder|ProjectOffer whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperProjectOffer extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\ProjectProjectOffer
 *
 * @property int $id
 * @property int $project_id
 * @property int $project_offer_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read Project $project
 * @property-read ProjectOffer $projectOffer
 * @method static Builder|ProjectProjectOffer newModelQuery()
 * @method static Builder|ProjectProjectOffer newQuery()
 * @method static Builder|ProjectProjectOffer query()
 * @method static Builder|ProjectProjectOffer whereCreatedAt($value)
 * @method static Builder|ProjectProjectOffer whereId($value)
 * @method static Builder|ProjectProjectOffer whereProjectId($value)
 * @method static Builder|ProjectProjectOffer whereProjectOfferId($value)
 * @method static Builder|ProjectProjectOffer whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperProjectProjectOffer extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Support\Carbon;
/**
 * App\Models\ProjectStatus
 *
 * @property int $id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read Collection|Project[] $projects
 * @property-read int|null $projects_count
 * @method static Builder|ProjectStatus newModelQuery()
 * @method static Builder|ProjectStatus newQuery()
 * @method static Builder|ProjectStatus query()
 * @method static Builder|ProjectStatus whereCreatedAt($value)
 * @method static Builder|ProjectStatus whereId($value)
 * @method static Builder|ProjectStatus whereName($value)
 * @method static Builder|ProjectStatus whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperProjectStatus extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Support\Carbon;
/**
 * App\Models\Skill
 *
 * @property int $id
 * @property string $name
 * @property int $skill_type_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read SkillType $skillType
 * @method static Builder|Skill newModelQuery()
 * @method static Builder|Skill newQuery()
 * @method static Builder|Skill query()
 * @method static Builder|Skill whereCreatedAt($value)
 * @method static Builder|Skill whereId($value)
 * @method static Builder|Skill whereName($value)
 * @method static Builder|Skill whereSkillTypeId($value)
 * @method static Builder|Skill whereUpdatedAt($value)
 * @mixin Eloquent
 */
	class IdeHelperSkill extends Eloquent {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Support\Carbon;
/**
 * App\Models\SkillType
 *
 * @property int $id
 * @property string $name
 * @property string|null $warn
 * @property string|null $text
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read array|string $snake_case_name
 * @property-read Collection|Skill[] $skills
 * @property-read int|null $skills_count
 * @method static Builder|SkillType newModelQuery()
 * @method static Builder|SkillType newQuery()
 * @method static Builder|SkillType query()
 * @method static Builder|SkillType whereCreatedAt($value)
 * @method static Builder|SkillType whereId($value)
 * @method static Builder|SkillType whereName($value)
 * @method static Builder|SkillType whereText($value)
 * @method static Builder|SkillType whereUpdatedAt($value)
 * @method static Builder|SkillType whereWarn($value)
 * @mixin Eloquent
 */
	class IdeHelperSkillType extends Eloquent {}
}

namespace App\Models{use Database\Factories\UserFactory;use Eloquent;use Illuminate\Contracts\Auth\MustVerifyEmail;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Notifications\DatabaseNotification;use Illuminate\Notifications\DatabaseNotificationCollection;use Illuminate\Support\Carbon;
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $firstname
 * @property string $lastname
 * @property int|null $volunteer_id
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Guest[] $guests
 * @property-read int|null $guests_count
 * @property-read Collection|Host[] $hosts
 * @property-read int|null $hosts_count
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read Collection|Project[] $projects
 * @property-read int|null $projects_count
 * @property-read Volunteer|null $volunteer
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstname($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereLastname($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereVolunteerId($value)
 * @mixin Eloquent
 */
	class IdeHelperUser extends Eloquent implements MustVerifyEmail {}
}

namespace App\Models{use Eloquent;use Illuminate\Database\Eloquent\Builder;use Illuminate\Database\Eloquent\Collection;use Illuminate\Support\Carbon;
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
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection|Continent[] $continents
 * @property-read int|null $continents_count
 * @property-read Country|null $country
 * @property-read Collection|Discipline[] $disciplines
 * @property-read int|null $disciplines_count
 * @property-read Collection|Duty[] $duties
 * @property-read int|null $duties_count
 * @property-read Collection|DutyModel[] $dutyVolunteer
 * @property-read int|null $duty_volunteer_count
 * @property-read Gender|null $gender
 * @property-read mixed $age
 * @property-read mixed $driving_licence_model
 * @property-read mixed $language_info
 * @property-read mixed $skill_types
 * @property-read array|string $snake_case_name
 * @property-read Collection|LanguageProficiency[] $languageProficiencies
 * @property-read int|null $language_proficiencies_count
 * @property-read Collection|LanguageModel[] $languageVolunteers
 * @property-read int|null $language_volunteers_count
 * @property-read Collection|Language[] $languages
 * @property-read int|null $languages_count
 * @property-read Collection|Skill[] $skills
 * @property-read int|null $skills_count
 * @property-read User|null $user
 * @method static VolunteerCollection|static[] all($columns = ['*'])
 * @method static VolunteerCollection|static[] get($columns = ['*'])
 * @method static Builder|Volunteer newModelQuery()
 * @method static Builder|Volunteer newQuery()
 * @method static Builder|Volunteer query()
 * @method static Builder|Volunteer whereActive($value)
 * @method static Builder|Volunteer whereBirthdate($value)
 * @method static Builder|Volunteer whereClub($value)
 * @method static Builder|Volunteer whereCountryId($value)
 * @method static Builder|Volunteer whereCreatedAt($value)
 * @method static Builder|Volunteer whereDrivingLicence($value)
 * @method static Builder|Volunteer whereEmail($value)
 * @method static Builder|Volunteer whereExpectation($value)
 * @method static Builder|Volunteer whereGenderId($value)
 * @method static Builder|Volunteer whereHelp($value)
 * @method static Builder|Volunteer whereId($value)
 * @method static Builder|Volunteer whereInternationalExperience($value)
 * @method static Builder|Volunteer whereLocalExperience($value)
 * @method static Builder|Volunteer whereName($value)
 * @method static Builder|Volunteer whereNationalExperience($value)
 * @method static Builder|Volunteer whereOWorkexperienceInternational($value)
 * @method static Builder|Volunteer whereOWorkexperienceLocal($value)
 * @method static Builder|Volunteer whereOlDuration($value)
 * @method static Builder|Volunteer whereSkillCoaching($value)
 * @method static Builder|Volunteer whereSkillEventOrganising($value)
 * @method static Builder|Volunteer whereSkillIt($value)
 * @method static Builder|Volunteer whereSkillMapping($value)
 * @method static Builder|Volunteer whereSkillOther($value)
 * @method static Builder|Volunteer whereSkillTeaching($value)
 * @method static Builder|Volunteer whereStartYear($value)
 * @method static Builder|Volunteer whereUpdatedAt($value)
 * @method static Builder|Volunteer whereWorkDuration($value)
 * @mixin Eloquent
 */
	class IdeHelperVolunteer extends Eloquent {}
}

