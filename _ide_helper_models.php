<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property string $nom
 * @property string $site
 * @property string $division
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Utilisateur> $utilisateurs
 * @property-read int|null $utilisateurs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereDivision($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereSite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Agence whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Agence extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categorie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categorie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categorie query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categorie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categorie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categorie whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categorie whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Categorie extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $comment
 * @property string|null $kilometrage
 * @property int $active
 * @property int $vhl_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property int|null $statut_id
 * @property int|null $parent_id
 * @property-read Commentaire|null $parent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Commentaire> $replies
 * @property-read int|null $replies_count
 * @property-read Statut|null $statut
 * @property-read User|null $user
 * @property-read Vhl $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereKilometrage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Commentaire whereVhlId($value)
 * @mixin \Eloquent
 */
	class Commentaire extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $dateControle
 * @property int $frein
 * @property int $pneus
 * @property int $eclairage
 * @property int $extincteur
 * @property int $batterie
 * @property int $fuite
 * @property int $avertisseur
 * @property int $ceinture
 * @property int $retroviseur
 * @property string|null $observation
 * @property string|null $kilometrage
 * @property int|null $vhl_id
 * @property int|null $user_id
 * @property int|null $utilisateur_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read User|null $user
 * @property-read Utilisateur|null $utilisateur
 * @property-read Vhl|null $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereAvertisseur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereBatterie($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereCeinture($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereDateControle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereEclairage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereExtincteur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereFrein($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereFuite($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereKilometrage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck wherePneus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereRetroviseur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereUtilisateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck whereVhlId($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|DailyCheck withoutTrashed()
 */
	class DailyCheck extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $vhl_id
 * @property int|null $ancien_statut_id
 * @property int $nouveau_statut_id
 * @property int $user_id
 * @property string|null $commentaire
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Statut|null $ancienStatut
 * @property-read Statut $nouveauStatut
 * @property-read User $user
 * @property-read Vhl $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereAncienStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereCommentaire($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereNouveauStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|HistStatut whereVhlId($value)
 * @mixin \Eloquent
 */
	class HistStatut extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string|null $imagevhl
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $vhl_id
 * @property-read mixed $imagevhl_url
 * @property-read mixed $remote_url
 * @property-read Vhl $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereImagevhl($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Imagesvhl whereVhlId($value)
 * @mixin \Eloquent
 */
	class Imagesvhl extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nom
 * @property int $location
 * @property string $ville
 * @property string $adresse
 * @property string $tel
 * @property string $mail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $acronym
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereAcronym($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Intitule whereVille($value)
 * @mixin \Eloquent
 */
	class Intitule extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $kilometrage
 * @property string $date
 * @property string $observation
 * @property int|null $vhl_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read Vhl|null $vhl
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereKilometrage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Kilometrage whereVhlId($value)
 * @mixin \Eloquent
 */
	class Kilometrage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nom
 * @property string $code_fournisseur
 * @property string $ville
 * @property string $adresse
 * @property string $tel
 * @property string $mail
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereAdresse($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereCodeFournisseur($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Prestataire whereVille($value)
 * @mixin \Eloquent
 */
	class Prestataire extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Utilisateur> $utilisateurs
 * @property-read int|null $utilisateurs_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Service whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Service extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Commentaire> $commentaires
 * @property-read int|null $commentaires_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Statut whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Statut extends \Eloquent {}
}

namespace App\Models{
/**
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StatutVhl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StatutVhl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|StatutVhl query()
 * @mixin \Eloquent
 */
	class StatutVhl extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $priority
 * @property string $status
 * @property string $urgence
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read string $formatted_created_at
 * @property-read string $formatted_updated_at
 * @property-read string $priority_color
 * @property-read string $status_color
 * @property-read string $urgence_color
 * @method static \Database\Factories\TaskFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task priority($priority)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task recent($days = 7)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task search($search)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task status($status)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task urgence($urgence)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUrgence($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Task withoutTrashed()
 * @mixin \Eloquent
 */
	class Task extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $image
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Commentaire> $commentaires
 * @property-read int|null $commentaires_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nom
 * @property string|null $poste
 * @property string $tel
 * @property string $mail
 * @property int|null $service_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $agence_id
 * @property-read Agence|null $agence
 * @property-read Service|null $service
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Vhl> $vhls
 * @property-read int|null $vhls_count
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereAgenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereMail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur wherePoste($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Utilisateur whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Utilisateur extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $matricule
 * @property string|null $marque
 * @property string|null $type
 * @property string|null $ww
 * @property string|null $chassis
 * @property string|null $puissance
 * @property string|null $date_mc
 * @property string|null $equipement
 * @property string|null $observation
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $agence_id
 * @property int|null $categorie_id
 * @property int|null $intitule_id
 * @property int|null $service_id
 * @property int|null $utilisateur_id
 * @property int|null $statut_id
 * @property-read Agence $agence
 * @property-read Categorie|null $categorie
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Commentaire> $comments
 * @property-read int|null $comments_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, DailyCheck> $dailychecks
 * @property-read int|null $dailychecks_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Imagesvhl> $images
 * @property-read int|null $images_count
 * @property-read Intitule|null $intitule
 * @property-read \Illuminate\Database\Eloquent\Collection<int, Kilometrage> $kilometrages
 * @property-read int|null $kilometrages_count
 * @property-read Service|null $service
 * @property-read Statut|null $statut
 * @property-read \Illuminate\Database\Eloquent\Collection<int, HistStatut> $statutHistoriques
 * @property-read int|null $statut_historiques_count
 * @property-read Utilisateur|null $utilisateur
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereAgenceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereCategorieId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereChassis($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereDateMc($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereEquipement($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereIntituleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereMarque($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereMatricule($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereObservation($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl wherePuissance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereServiceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereStatutId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereUtilisateurId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl whereWw($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl withTrashed(bool $withTrashed = true)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Vhl withoutTrashed()
 * @mixin \Eloquent
 */
	class Vhl extends \Eloquent {}
}

