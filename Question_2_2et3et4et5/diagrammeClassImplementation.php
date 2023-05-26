<?php

class SocieteFinancement
{
	private int $id;
	private string $nom;
	private string $code;
	private array $expertises = [];

	public function __construct($nom, $code)
	{
		$this->nom = $nom;
		$this->code = $code;
	}

	/**
	 * Get the value of id
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * Get the value of nom
	 */
	public function getNom()
	{
		return $this->nom;
	}

	/**
	 * Set the value of nom
	 *
	 * @return  self
	 */
	public function setNom($nom)
	{
		$this->nom = $nom;

		return $this;
	}
	/**
	 * Get the value of code
	 */
	public function getCode()
	{
		return $this->code;
	}

	/**
	 * Set the value of code
	 *
	 * @return  self
	 */
	public function setCode($code)
	{
		$this->code = $code;

		return $this;
	}

	/**
	 * Get the value of expertises
	 */
	public function getExpertises()
	{
		return $this->expertises;
	}

	/**
	 * Set the value of expertises
	 *
	 * @return  self
	 */
	public function addExpertises($expertise)
	{
		$this->expertises[] = $expertise;

		return $this;
	}

	public function removeExpertise($codeDossier)
	{
		foreach ($this->expertises as $expertise) {
			if ($expertise->getCodeDossier() == $codeDossier) {
				unset($expertise);
			}
		}
	}

	public function SocieteFinancement()
	{
	}

	public function AjouterExpertisePool()
	{
	}

	public function AjouterExpertiseClient()
	{
	}

	public function LesExpertisesIndispos()
	{
		foreach ($this->expertises as $expertise) {
			$indispoExpertises = [];
			if ($expertise->getIndisponibilite()) {
				array_push($indispoExpertises, $expertise);
			}
		}
		return $indispoExpertises;
	}

	public function NbIndisponibilites(string $motif)
	{
		$nombreIndispos = 0;
		$expertisesIndispos = $this->LesExpertisesIndispos();
		foreach ($expertisesIndispos as $expertise) {
			if ($expertise->getIndisponibilite()->getMotif() == $motif) {
				$nombreIndispos++;
			}
		}
		return $nombreIndispos;
	}
	public function NbIndisponibilitesParMotif()
	{
	}
}

abstract class Expertise
{
	private int $codeDossier;
	private string $dateHeureRDV;
	private string $lieuRDV;
	private string $adresse;
	private string $immatriculation;
	private string $marque;
	private string $modele;
	private Indisponibilite $indispobibilite;


	public function __construct($codeDossier, $dateHeureRDV, $lieuRDV, $adresse, $immatriculation, $marque, $modele)
	{
		$this->codeDossier = $codeDossier;
		$this->dateHeureRDV = $dateHeureRDV;
		$this->lieuRDV = $lieuRDV;
		$this->adresse = $adresse;
		$this->immatriculation = $immatriculation;
		$this->marque = $marque;
		$this->modele = $modele;
	}
	/**
	 * Get the value of codeDossier
	 */
	public function getCodeDossier()
	{
		return $this->codeDossier;
	}

	/**
	 * Set the value of codeDossier
	 *
	 * @return  self
	 */
	public function setCodeDossier($codeDossier)
	{
		$this->codeDossier = $codeDossier;

		return $this;
	}

	/**
	 * Get the value of dateHeureRDV
	 */
	public function getDateHeureRDV()
	{
		return $this->dateHeureRDV;
	}

	/**
	 * Set the value of dateHeureRDV
	 *
	 * @return  self
	 */
	public function setDateHeureRDV($dateHeureRDV)
	{
		$this->dateHeureRDV = $dateHeureRDV;

		return $this;
	}

	/**
	 * Get the value of lieuRDV
	 */
	public function getLieuRDV()
	{
		return $this->lieuRDV;
	}

	/**
	 * Set the value of lieuRDV
	 *
	 * @return  self
	 */
	public function setLieuRDV($lieuRDV)
	{
		$this->lieuRDV = $lieuRDV;

		return $this;
	}

	/**
	 * Get the value of adresse
	 */
	public function getAdresse()
	{
		return $this->adresse;
	}

	/**
	 * Set the value of adresse
	 *
	 * @return  self
	 */
	public function setAdresse($adresse)
	{
		$this->adresse = $adresse;

		return $this;
	}

	/**
	 * Get the value of immatriculation
	 */
	public function getImmatriculation()
	{
		return $this->immatriculation;
	}

	/**
	 * Set the value of immatriculation
	 *
	 * @return  self
	 */
	public function setImmatriculation($immatriculation)
	{
		$this->immatriculation = $immatriculation;

		return $this;
	}

	/**
	 * Get the value of marque
	 */
	public function getMarque()
	{
		return $this->marque;
	}

	/**
	 * Set the value of marque
	 *
	 * @return  self
	 */
	public function setMarque($marque)
	{
		$this->marque = $marque;

		return $this;
	}

	/**
	 * Get the value of modele
	 */
	public function getModele()
	{
		return $this->modele;
	}

	/**
	 * Set the value of modele
	 *
	 * @return  self
	 */
	public function setModele($modele)
	{
		$this->modele = $modele;

		return $this;
	}

	/**
	 * Get the value of indispobibilite
	 */
	public function getIndispobibilite(): Indisponibilite
	{
		return $this->indispobibilite;
	}

	/**
	 * Set the value of indispobibilite
	 *
	 * @return  self
	 */
	public function CreerIndisponibilite(Indisponibilite $indispobibilite)
	{
		$this->indispobibilite = $indispobibilite;

		return $this;
	}

	abstract public function Expertise();

	abstract public function EtatExpertise();
}

class Pool_Garage extends Expertise
{

	public function __construct($codeDossier, $dateHeureRDV, $lieuRDV, $adresse, $immatriculation, $marque, $modele)
	{
		parent::__construct(
			$codeDossier,
			$dateHeureRDV,
			$lieuRDV,
			$adresse,
			$immatriculation,
			$marque,
			$modele
		);
	}
	public function PoolGarage()
	{
	}
	public function Expertise()
	{
	}
	public function EtatExpertise()
	{
	}
}

class RDV_Client extends Expertise
{
	private string $nomContact;
	private string $tel;
	private string $mail;

	public function __construct(
		$codeDossier,
		$dateHeureRDV,
		$lieuRDV,
		$adresse,
		$immatriculation,
		$marque,
		$modele,
		$nomContact,
		$tel,
		$mail
	) {
		parent::__construct(
			$codeDossier,
			$dateHeureRDV,
			$lieuRDV,
			$adresse,
			$immatriculation,
			$marque,
			$modele
		);
		$this->nomContact = $nomContact;
		$this->tel = $tel;
		$this->mail = $mail;
	}

	/**
	 * Get the value of nomContact
	 */
	public function getNomContact()
	{
		return $this->nomContact;
	}

	/**
	 * Set the value of nomContact
	 *
	 * @return  self
	 */
	public function setNomContact($nomContact)
	{
		$this->nomContact = $nomContact;

		return $this;
	}

	/**
	 * Get the value of tel
	 */
	public function getTel()
	{
		return $this->tel;
	}

	/**
	 * Set the value of tel
	 *
	 * @return  self
	 */
	public function setTel($tel)
	{
		$this->tel = $tel;

		return $this;
	}

	/**
	 * Get the value of mail
	 */
	public function getMail()
	{
		return $this->mail;
	}

	/**
	 * Set the value of mail
	 *
	 * @return  self
	 */
	public function setMail($mail)
	{
		$this->mail = $mail;

		return $this;
	}

	public function RDV_Client()
	{
	}
	public function Expertise()
	{
	}
	public function EtatExpertise()
	{
	}
}

class Indisponibilite
{
	private string $clientResponsable;
	private string $motif;

	public function __construct($clientResponsable, $motif)
	{
		$this->clientResponsable = $clientResponsable;
		$this->motif = $motif;
	}

	/**
	 * Get the value of clientResponsable
	 */
	public function getClientResponsable()
	{
		return $this->clientResponsable;
	}

	/**
	 * Set the value of clientResponsable
	 *
	 * @return  self
	 */
	public function setClientResponsable($clientResponsable)
	{
		$this->clientResponsable = $clientResponsable;

		return $this;
	}

	/**
	 * Get the value of motif
	 */
	public function getMotif()
	{
		return $this->motif;
	}

	/**
	 * Set the value of motif
	 *
	 * @return  self
	 */
	public function setMotif($motif)
	{
		$this->motif = $motif;

		return $this;
	}

	public function clientEstResponsable()
	{
	}
	public function Indisponibilite()
	{
	}
}
