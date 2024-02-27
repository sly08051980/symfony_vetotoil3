<?php

namespace App\Entity;

use App\Repository\EmployerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: EmployerRepository::class)]
class Employer implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    /**
     * @var list<string> The user roles
     */
    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $nom_employer = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom_employer = null;

    #[ORM\Column(length: 255)]
    private ?string $adresse_employer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $complement_adresse_employer = null;

    #[ORM\Column(length: 5)]
    private ?string $code_postal_employer = null;

    #[ORM\Column(length: 50)]
    private ?string $ville_employer = null;

    #[ORM\Column(length: 10)]
    private ?string $telephone_employer = null;

    #[ORM\Column(length: 20)]
    private ?string $profession_employer = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $images_employer = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $date_creation_employer = null;

    #[ORM\Column(length: 10)]
    private ?string $droit_utilisateur_employer = null;

    #[ORM\OneToMany(targetEntity: Rdv::class, mappedBy: 'employer')]
    private Collection $employer;

    #[ORM\OneToMany(targetEntity: Soigner::class, mappedBy: 'employer')]
    private Collection $employerid;

    #[ORM\OneToMany(targetEntity: Ajouter::class, mappedBy: 'employer')]
    private Collection $employer_id;

    public function __construct()
    {
        $this->employer = new ArrayCollection();
        $this->employerid = new ArrayCollection();
        $this->employer_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     *
     * @return list<string>
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    /**
     * @param list<string> $roles
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials(): void
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getNomEmployer(): ?string
    {
        return $this->nom_employer;
    }

    public function setNomEmployer(string $nom_employer): static
    {
        $this->nom_employer = $nom_employer;

        return $this;
    }

    public function getPrenomEmployer(): ?string
    {
        return $this->prenom_employer;
    }

    public function setPrenomEmployer(string $prenom_employer): static
    {
        $this->prenom_employer = $prenom_employer;

        return $this;
    }

    public function getAdresseEmployer(): ?string
    {
        return $this->adresse_employer;
    }

    public function setAdresseEmployer(string $adresse_employer): static
    {
        $this->adresse_employer = $adresse_employer;

        return $this;
    }

    public function getComplementAdresseEmployer(): ?string
    {
        return $this->complement_adresse_employer;
    }

    public function setComplementAdresseEmployer(?string $complement_adresse_employer): static
    {
        $this->complement_adresse_employer = $complement_adresse_employer;

        return $this;
    }

    public function getCodePostalEmployer(): ?string
    {
        return $this->code_postal_employer;
    }

    public function setCodePostalEmployer(string $code_postal_employer): static
    {
        $this->code_postal_employer = $code_postal_employer;

        return $this;
    }

    public function getVilleEmployer(): ?string
    {
        return $this->ville_employer;
    }

    public function setVilleEmployer(string $ville_employer): static
    {
        $this->ville_employer = $ville_employer;

        return $this;
    }

    public function getTelephoneEmployer(): ?string
    {
        return $this->telephone_employer;
    }

    public function setTelephoneEmployer(string $telephone_employer): static
    {
        $this->telephone_employer = $telephone_employer;

        return $this;
    }

    public function getProfessionEmployer(): ?string
    {
        return $this->profession_employer;
    }

    public function setProfessionEmployer(string $profession_employer): static
    {
        $this->profession_employer = $profession_employer;

        return $this;
    }

    public function getImagesEmployer(): ?string
    {
        return $this->images_employer;
    }

    public function setImagesEmployer(?string $images_employer): static
    {
        $this->images_employer = $images_employer;

        return $this;
    }

    public function getDateCreationEmployer(): ?\DateTimeInterface
    {
        return $this->date_creation_employer;
    }

    public function setDateCreationEmployer(\DateTimeInterface $date_creation_employer): static
    {
        $this->date_creation_employer = $date_creation_employer;

        return $this;
    }

    public function getDroitUtilisateurEmployer(): ?string
    {
        return $this->droit_utilisateur_employer;
    }

    public function setDroitUtilisateurEmployer(string $droit_utilisateur_employer): static
    {
        $this->droit_utilisateur_employer = $droit_utilisateur_employer;

        return $this;
    }

    /**
     * @return Collection<int, Rdv>
     */
    public function getEmployer(): Collection
    {
        return $this->employer;
    }

    public function addEmployer(Rdv $employer): static
    {
        if (!$this->employer->contains($employer)) {
            $this->employer->add($employer);
            $employer->setEmployer($this);
        }

        return $this;
    }

    public function removeEmployer(Rdv $employer): static
    {
        if ($this->employer->removeElement($employer)) {
            // set the owning side to null (unless already changed)
            if ($employer->getEmployer() === $this) {
                $employer->setEmployer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Soigner>
     */
    public function getEmployerid(): Collection
    {
        return $this->employerid;
    }

    public function addEmployerid(Soigner $employerid): static
    {
        if (!$this->employerid->contains($employerid)) {
            $this->employerid->add($employerid);
            $employerid->setEmployer($this);
        }

        return $this;
    }

    public function removeEmployerid(Soigner $employerid): static
    {
        if ($this->employerid->removeElement($employerid)) {
            // set the owning side to null (unless already changed)
            if ($employerid->getEmployer() === $this) {
                $employerid->setEmployer(null);
            }
        }

        return $this;
    }
}